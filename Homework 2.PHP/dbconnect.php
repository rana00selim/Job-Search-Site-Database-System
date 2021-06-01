<?php

$dbname= "test";
$conn= mysqli_connect("localhost", "root", "", $dbname);

if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_errno;
  exit();
}  
else{
    echo 'CONNECTED <br>';
}
?>

