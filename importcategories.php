<?php
include_once('connection.php');

$content = file_get_contents('./products.json');

$initial_products =json_decode($content);


foreach($initial_products as $product){
$i=0;
$num=count((array)($product->category));

while($i<$num){

$id=$product->category[$i]->id;
$name=$product->category[$i]->name;


$select = $boutiqueconnect->prepare('SELECT id FROM categories WHERE id = ?');
$select->execute([$id]);

if ($select->rowCount() <= 0){

$sql="INSERT INTO categories VALUES (:id,:name)";

$stmt=$boutiqueconnect->prepare($sql);

$stmt->execute([
'id'=>$id,
'name'=>$name,
]);
}
$i++;
}
// avoid the Maximum execution time of 120 seconds by giving 10 second for each iteration 
set_time_limit(10);
}
?>