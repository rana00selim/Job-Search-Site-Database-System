<?php
include ("dbconnect.php");

$fname=$_POST["fname"]; 
$lname=$_POST["lname"]; 
$email=$_POST["email"];
$homePhone=$_POST["homePhone"];
$cellPhone=$_POST["cellPhone"];
$officePhone=$_POST["officePhone"];
$address=$_POST["address"];

if($fname=="" or $lname==""){
    echo "<br>Please fill the inputs"; 
    exit(); 
}/*
$query= "select * from contacts where fname='$fname' and lname='$lname'";
$result=mysqli_query($conn, $query);
if(mysqli_num_rows($result)!=0){***********hata veriyor**************
    echo "<br>The user has already registered </font>"; 
    echo "<br><a href=adduserhtml.html> Back to Home page </a>";
}
else{*/
    $query= "insert into contacts (fname,lname,email,homePhone,cellPhone,officePhone,address) values "
            . "('$fname','$lname','$email','$homePhone','$cellPhone','$officePhone','$address')";
     
    $result=mysqli_query($conn, $query);
    if ($result) {
      echo "<br>New record created successfully<br><a href=menu.html> Back to Home page </a>";
    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
//}
mysqli_close($conn);
?>


