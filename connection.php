<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $boutiqueconnect = new PDO("mysql:host=$servername;dbname=boutique", $username, $password);
  // set the PDO error mode to exception
  $boutiqueconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>