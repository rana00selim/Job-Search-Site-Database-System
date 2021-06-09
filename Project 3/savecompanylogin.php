<html>
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
  height: 100%; /* Full height */
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

<h2>Company Page</h2>

<!-- 11111111111111 -->
<div id="b1">
    <button>Display the first name and last name of the HRRs that posted a job listing for the company</button>
</div>

<!-- The Modal -->
<div id="m1" class="modal">
    
  <!-- Modal content -->
<div id="cls1"><span class="close1">&times;</span></div>
    <p>
        <?php
include ("dbconnect.php");

$cid=$_POST["cid"]; 
$phone=$_POST["phone"]; 
$address=$_POST["address"];
$name=$_POST["name"];


if($cid==""){
    echo "<br>Please enter inputs"; 
    exit(); 
}
//111111111111111111
$sql= "select distinct h.fname, h.lname from hrr h, job_posting j, company c where h.username = j.hrr_username and c.cid = j.comp_cid and c.cid='$cid'";

if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table style ='width:100%'>";
            echo "<tr>";
                echo "<th>fname</th>";
                echo "<th>lname</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
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
    <button>Display company’s job postings, along with the number of applicants</button>
</div>

<!-- The Modal -->
<div id="m2" class="modal">
  <!-- Modal content -->
  <div id="cls2"><span class="close2">&times;</span></div>
    <p>
        <?php
        //2222222222222
      $sql="SELECT j.*,COUNT(j.jid) as 'Quantity of Applications' from job_posting j LEFT OUTER JOIN application a ON a.jid = j.jid where j.comp_cid ='$cid'";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table style ='width:100%'>";
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
                echo "<th>Quantity of Applications</th>";
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
                echo "<td>" . $row['Quantity of Applications'] . "</td>";
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
<!-- 22222222222222 -->
<br><br>
<!-- 33333333333333 -->
<div id="b3">
    <button>Display applications to each posting if any</button>
</div>

<!-- The Modal -->
<div id="m3" class="modal">
    
  <!-- Modal content -->
<div id="cls3"><span class="close3">&times;</span></div>
    <p>
        <?php
//333333333333333333333333333
    $sql="select * from job_posting j LEFT OUTER JOIN application a ON a.jid = j.jid where j.comp_cid ='$cid'";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table style ='width:100%'>";
            echo "<tr>";
                echo "<th>jid</th>";
                echo "<th>username</th>";
                echo "<th>applyDate</th>";
                echo "<th>resumee</th>";
                echo "<th>univ</th>";
                echo "<th>program</th>";
                echo "<th>gpa</th>";
                echo "<th>standing</th>";
                echo "<th>numDays</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['jid'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['applyDate'] . "</td>";
                echo "<td>" . $row['resumee'] . "</td>";
                echo "<td>" . $row['univ'] . "</td>";
                echo "<td>" . $row['program'] . "</td>";
                echo "<td>" . $row['gpa'] . "</td>";
                echo "<td>" . $row['standing'] . "</td>";
                echo "<td>" . $row['numDays'] . "</td>";
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
<!-- 33333333333333 -->
<br><br>
<!-- 44444444444444 -->
<div id="b4">
    <button>For either end-user applied to postings, display unemployed end-users</button>
</div>

<!-- The Modal -->
<div id="m4" class="modal">
  <!-- Modal content -->
  <div id="cls4"><span class="close4">&times;</span></div>
    <p>
        <?php
      //44444444444444444
    $sql="select E.username, E.fname, E.lname, j.jid from end_user E 
LEFT OUTER JOIN (application a natural join job_posting j) ON E.username = a.username 
where E.username not in (select distinct username from eu_employer) and j.comp_cid ='$cid'";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<table style ='width:100%'>";
            echo "<tr>";
            echo "<th>jid</th>";
                echo "<th>username</th>";
                echo "<th>fname</th>";
                echo "<th>lname</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['jid'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
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
<!-- 44444444444444 -->
<br><br>
<!-- 55555555555555 -->
<div id="b5">
    <button>For either end-user applied to postings, display the one that has been working at the same company for the longest period</button>
</div>

<!-- The Modal -->
<div id="m5" class="modal">
    
  <!-- Modal content -->
<div id="cls5"><span class="close5">&times;</span></div>
    <p>
        <?php
//55555555555555555555
    $sql="select username,comp_cid from eu_employer as e where e.beginDate = (select min(beginDate) from eu_employer) and comp_cid ='$cid'";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<table style ='width:100%'>";
            echo "<tr>";
                echo "<th>username</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
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
<!-- 55555555555555 -->
<br><br>
<!-- 66666666666666 -->
<div id="b6">
    <button>For either end-user applied to postings, display the number of applications of each</button>
</div>

<!-- The Modal -->
<div id="m6" class="modal">
  <!-- Modal content -->
  <div id="cls6"><span class="close6">&times;</span></div>
    <p>
        <?php
      //666666666666666666666
    $sql="select username, count(*) from application a LEFT OUTER JOIN job_posting j ON a.jid = j.jid where j.comp_cid ='$cid' group by username";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<table style ='width:100%'>";
            echo "<tr>";
                echo "<th>username</th>";
                echo "<th>count(*)</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['count(*)'] . "</td>";
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
<!-- 66666666666666 -->
<br><br>
<!-- 77777777777777 -->
<div id="b7">
    <button>For either end-user applied to postings, Display the one with maximum experience</button>
</div>

<!-- The Modal -->
<div id="m7" class="modal">
    
  <!-- Modal content -->
<div id="cls7"><span class="close7">&times;</span></div>
    <p>
        <?php
//77777777777777
    $sql="select username,exp
from (select sum(endDate - beginDate) as exp, username
        from employment_history where cid ='$cid' 
        group by username) as e
where e.exp >= all (select sum(endDate - beginDate) 
                    from employment_history 
                    group by username)";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<table style ='width:100%'>";
            echo "<tr>";
                echo "<th>username</th>";
                echo "<th>exp</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['exp'] . "</td>";
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
<!-- 77777777777777 -->
<br><br>
<!-- 88888888888888 -->
<div id="b8">
    <button>Display internship postings, if any</button>
</div>

<!-- The Modal -->
<div id="m8" class="modal">
  <!-- Modal content -->
  <div id="cls8"><span class="close8">&times;</span></div>
    <p>
        <?php
      //888888888888888888888888
    $sql="select * from (job_posting J natural join internshipJobPosting J1) join company C on J.comp_cid = C.cid where c.cid ='$cid'";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<table style ='width:100%'>";
            echo "<tr>";
                echo "<th>jid</th>";
                echo "<th>description</th>";
                echo "<th>salary</th>";
                echo "<th>phone</th>";
                echo "<th>numOpenings</th>";
                echo "<th>hrr_username</th>";
                echo "<th>openingdate</th>";
                echo "<th>duration</th>";
                echo "<th>is_manOrIntern</th>";
                echo "<th>contract_type</th>";
                echo "<th>minnumDays</th>";
                echo "<th>name</th>";
                echo "<th>address</th>";
                echo "<th>phone</th>";
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
                echo "<td>" . $row['minnumDays'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
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
<!-- 88888888888888 -->
<br><br>
<!-- 99999999999999 -->
<div id="b9">
    <button>For each internship posting, display the applications, and their detail</button>
</div>

<!-- The Modal -->
<div id="m9" class="modal">
  <!-- Modal content -->
  <div id="cls9"><span class="close9">&times;</span></div>
    <p>
        <?php
//9999999999999999
    $sql="select a.* from application a LEFT OUTER JOIN (job_posting J natural join internshipJobPosting J1) ON a.jid = j.jid where j.comp_cid ='$cid'";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<table style ='width:100%'>";
            echo "<tr>";
                echo "<th>jid</th>";
                echo "<th>username</th>";
                echo "<th>applyDate</th>";
                echo "<th>resumee</th>";
                echo "<th>univ</th>";
                echo "<th>program</th>";
                echo "<th>gpa</th>";
                echo "<th>standing</th>";
                echo "<th>numDays</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['jid'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['applyDate'] . "</td>";
                echo "<td>" . $row['resumee'] . "</td>";
                echo "<td>" . $row['univ'] . "</td>";
                echo "<td>" . $row['program'] . "</td>";
                echo "<td>" . $row['gpa'] . "</td>";
                echo "<td>" . $row['standing'] . "</td>";
                echo "<td>" . $row['numDays'] . "</td>";
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
<!-- 99999999999999 -->

<script>
                var modal1 = document.getElementById("m1");
                var modal2 = document.getElementById("m2");
                var modal3 = document.getElementById("m3");
                var modal4 = document.getElementById("m4");
                var modal5 = document.getElementById("m5");
                var modal6 = document.getElementById("m6");
                var modal7 = document.getElementById("m7");
                var modal8 = document.getElementById("m8");
                var modal9 = document.getElementById("m9");
                
		var btn1 = document.getElementById("b1");
                var btn2 = document.getElementById("b2");
                var btn3 = document.getElementById("b3");
                var btn4 = document.getElementById("b4");
                var btn5 = document.getElementById("b5");
                var btn6 = document.getElementById("b6");
                var btn7 = document.getElementById("b7");
                var btn8 = document.getElementById("b8");
                var btn9 = document.getElementById("b9");
                
                
                var cls1 = document.getElementsByClassName("close1")[0];
                var cls2 = document.getElementsByClassName("close2")[0];
                var cls3 = document.getElementsByClassName("close3")[0];
                var cls4 = document.getElementsByClassName("close4")[0];
                var cls5 = document.getElementsByClassName("close5")[0];
                var cls6 = document.getElementsByClassName("close6")[0];
                var cls7 = document.getElementsByClassName("close7")[0];
                var cls8 = document.getElementsByClassName("close8")[0];
                var cls9 = document.getElementsByClassName("close9")[0];
                
		btn1.onclick = function() {
			modal1.style.display = "block";
			btn1.style.display = "none";
		}
                btn2.onclick = function() {
			modal2.style.display = "block";
			btn2.style.display = "none";
		}
                btn3.onclick = function() {
			modal3.style.display = "block";
			btn3.style.display = "none";
		}
                btn4.onclick = function() {
			modal4.style.display = "block";
			btn4.style.display = "none";
		}
                btn5.onclick = function() {
			modal5.style.display = "block";
			btn5.style.display = "none";
		}
                btn6.onclick = function() {
			modal6.style.display = "block";
			btn6.style.display = "none";
		}
                btn7.onclick = function() {
			modal7.style.display = "block";
			btn7.style.display = "none";
		}
                btn8.onclick = function() {
			modal8.style.display = "block";
			btn8.style.display = "none";
		}
                btn9.onclick = function() {
			modal9.style.display = "block";
			btn9.style.display = "none";
		}
                
		cls1.onclick = function() {
			modal1.style.display = "none";
			btn1.style.display = "block";
		}
		cls2.onclick = function() {
                        modal2.style.display = "none";
			btn2.style.display = "block";
		}
                cls3.onclick = function() {
                        modal3.style.display = "none";
			btn3.style.display = "block";
		}
                cls4.onclick = function() {
                        modal4.style.display = "none";
			btn4.style.display = "block";
		}
                cls5.onclick = function() {
                        modal5.style.display = "none";
			btn5.style.display = "block";
		}
                cls6.onclick = function() {
                        modal6.style.display = "none";
			btn6.style.display = "block";
		}
                cls7.onclick = function() {
                        modal7.style.display = "none";
			btn7.style.display = "block";
		}
                cls8.onclick = function() {
                        modal8.style.display = "none";
			btn8.style.display = "block";
		}
                cls9.onclick = function() {
                        modal9.style.display = "none";
			btn9.style.display = "block";
		}
                
		window.onclick = function(event) {
			if(event.target == modal1 || event.target == modal2 || event.target == modal3 || event.target == modal4 || event.target == modal5 || event.target == modal6 || event.target == modal7 || event.target == modal8 || event.target == modal9) {
				modal1.style.remove = "none";
                                modal2.style.remove = "none";
                                modal3.style.remove = "none";
                                modal4.style.remove = "none";
                                modal5.style.remove = "none";
                                modal6.style.remove = "none";
                                modal7.style.remove = "none";
                                modal8.style.remove = "none";
                                modal9.style.remove = "none";
			}
		}
</script>
</body>
</html>
<?php
mysqli_close($conn);
