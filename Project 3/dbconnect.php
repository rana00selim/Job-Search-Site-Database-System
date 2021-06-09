<?php

$dbname= "test";
$conn= mysqli_connect("localhost", "root", "", $dbname);

if ($conn -> connect_errno) {
  echo "Failed to connect: " . $conn -> connect_error;
  exit();
}  
else{
}
?>

