<?php
include_once('connection.php');

$content = file_get_contents('./products.json');

$initial_products =json_decode($content);

foreach($initial_products as $product){
  
$id=$product->sku;
$name=$product->name;
$description=$product->description;
$price=$product->price;
$image=$product->image;
$shipping=$product->shipping;

$sql="INSERT INTO products VALUES (:id,:name, :description, :price, :image,:shipping)";

$stmt=$boutiqueconnect->prepare($sql);

$stmt->execute([
'id'=>$id,
'name'=>$name,
'description'=>$description,
'price'=>$price,
'image'=>$image,
'shipping'=>$shipping,
]);
//favoid the Maximum execution time of 120 seconds by giving 10 second for each iteration 
set_time_limit(10);
}

?>
