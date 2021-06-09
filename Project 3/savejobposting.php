<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="design.css">
</head>
    <?php
include ("dbconnect.php");

$jid=$_POST["jid"]; 
$description=$_POST["description"]; 
$salary=$_POST["salary"];
$phone=$_POST["phone"];
$numOpenings=$_POST["numOpenings"];
$hrr_username=$_POST["hrr_username"];
$openingdate=$_POST["openingdate"];
$duration=$_POST["duration"];
$comp_cid=$_POST["comp_cid"];
$is_manOrIntern=$_POST["is_manOrIntern"];
$contract_type=$_POST["contract_type"];

if($jid==""){
    echo "<br>Please enter inputs"; 
    exit(); 
}
$query= "select * from job_posting where jid='$jid'";
$result=mysqli_query($conn, $query);
if(mysqli_num_rows($result)!=0){
    echo "<font size='3'> <br>The job posting has already existed </font>"; 
    echo "<br><a href=insertjobposting.php> Back to insert page </a>";
}
else{
    $query= "insert into job_posting values 
            ('$jid','$description','$salary','$phone','$numOpenings'"
            . ",'$hrr_username','$openingdate','$duration','$comp_cid','$is_manOrIntern'"
            . ",'$contract_type')";
     
    $result=mysqli_query($conn, $query);
    if ($result) {
      echo "<br>New job posting created successfully<br><a href=savehrrlogin.php> Back to login page </a>";
    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>