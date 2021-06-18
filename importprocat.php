<?php
include_once('connection.php');

$content = file_get_contents('./products.json');

$initial_products =json_decode($content);


foreach($initial_products as $product){
$i=0;
$num=count((array)($product->category));
$product_id=$product->sku;

while($i<$num){
$category_id=$product->category[$i]->id;
$sql="INSERT INTO  productscategories VALUES (:product_id,:category_id )";

$stmt=$boutiqueconnect->prepare($sql);

$stmt->execute([
'product_id'=>$product_id,
'category_id'=>$category_id,
]);

//avoid the Maximum execution time of 120 seconds by giving 10 second for each iteration 
set_time_limit(10);
$i++;
}
}
?>