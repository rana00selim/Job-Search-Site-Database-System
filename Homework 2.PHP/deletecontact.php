<?php
include ("dbconnect.php");

$fname=$_POST["fname"]; 
$lname=$_POST["lname"];
$sql ="DELETE FROM contacts WHERE fname='$fname' and lname='$lname";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
}else {
    echo "Error: " . $conn->error;
}
header("Location: list.php");
$conn->close();
?>


