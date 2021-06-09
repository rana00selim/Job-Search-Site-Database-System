<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="design.css">
        
<style>
    
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 85%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: darkslategrey; /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}
table {
  width: 100%;    
  background-color: lightslategrey;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

</head>
<body>
    
<h2>HRR Page</h2>

<!-- 11111111111111 -->
<div id="b1">
    <button>Display postings</button>
</div>

<!-- The Modal -->
<div id="m1" class="modal">
    
  <!-- Modal content -->
<div id="cls1"><span class="close1">&times;</span></div>
    <p>
        <?php
include ("dbconnect.php");

$username=$_POST["username"]; 
$password=$_POST["passwrd"]; 
$email=$_POST["email"];
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$endUser_username=$_POST["endUser_username"];

if($username=="" && $password==""){
    echo "<br>Please enter inputs"; 
    exit(); 
}
//111111111111111111

$sql= "select * from job_posting where hrr_username='$username'";
//
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>jid</th>";
                echo "<th>Description</th>";
                echo "<th>Salary</th>";
                echo "<th>Phone</th>";
                echo "<th>numOpenings</th>";
                echo "<th>hrr_username</th>";
                echo "<th>openingdate</th>";
                echo "<th>duration</th>";
                echo "<th>is_manOrIntern</th>";
                echo "<th>contract_type</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['jid'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['numOpenings'] . "</td>";
                echo "<td>" . $row['hrr_username'] . "</td>";
                echo "<td>" . $row['openingdate'] . "</td>";
                echo "<td>" . $row['duration'] . "</td>";
                echo "<td>" . $row['is_manOrIntern'] . "</td>";
                echo "<td>" . $row['contract_type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
         mysqli_free_result($result);
    } else{
        echo "<br>" . "=> No records matching your query were found." . "<br>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
        
    </p>
  </div>

<!-- 11111111111111 -->
<br><br>
<!-- 22222222222222 -->
<div id="b2">
    <button>Create job postings</button>
</div>

<!-- The Modal -->
<div id="m2" class="modal">
  <!-- Modal content -->
  <div id="cls2"><span class="close2">&times;</span></div>
        <div class="divOne">
        <h2>Add job posting information</h2>
        <form action="savejobposting.php" method="post">
            <table>
                <tr>
                    <td>Job Posting ID :*</td>
                    <td><input type="text" name="jid" required></td>
                </tr>
                <tr>
                    <td>Job Description :*</td>
                    <td><input type="text" name="description" ></td>
                </tr>
                <tr>
                    <td>Salary :*</td>
                    <td><input type="text" name="salary" ></td>
                </tr>
                <tr>
                    <td>Phone :*</td>
                    <td><input type="text" name="phone" ></td>
                </tr>
                <tr>
                    <td>Number of Openings :*</td>
                    <td><input type="text" name="numOpenings" ></td>
                </tr>
                <tr><td>HRR Username :*</td>
                    <td><input type="text" name="hrr_username" ></td>
                </tr>
                <tr><td>Opening Date :*</td>
                    <td><input type="date" name="openingdate" ></td>
                </tr>
                <tr><td>Duration :*</td>
                    <td><input type="text" name="duration" ></td>
                </tr>
                <tr><td>Company ID :*</td>
                    <td><input type="text" name="comp_cid" ></td>
                </tr>
                <tr><td>Manager of Intern :*</td>
                    <td><input type="text" name="is_manOrIntern" ></td>
                </tr>
                <tr><td>Contract Type :*</td>
                    <td><input type="text" name="contract_type" ></td>
                </tr>
                <tr></tr>
                    <td>
                        <button>Insert</button>
                    </td>
                </tr>
            </table>        
        </form>
    </div>
  </div>
<!-- 22222222222222 -->

<script>
                var modal1 = document.getElementById("m1");
                var modal2 = document.getElementById("m2");
                
		var btn1 = document.getElementById("b1");
                var btn2 = document.getElementById("b2");
                
                var cls1 = document.getElementsByClassName("close1")[0];
                var cls2 = document.getElementsByClassName("close2")[0];
                
		btn1.onclick = function() {
			modal1.style.display = "block";
			btn1.style.display = "none";
		}
                btn2.onclick = function() {
			modal2.style.display = "block";
			btn2.style.display = "none";
		}
                
		cls1.onclick = function() {
			modal1.style.display = "none";
			btn1.style.display = "block";
		}
                cls2.onclick = function() {
                        modal2.style.display = "none";
			btn2.style.display = "block";
		}
		window.onclick = function(event) {
			if(event.target == modal1 || event.target == modal2) {
				modal1.style.remove = "none";
                                modal2.style.remove = "none";
			}
		}
</script>
</body>
</html>
    <?php
mysqli_close($conn);
?>