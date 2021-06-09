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

<h2>End User Page</h2>

<!-- 11111111111111 -->
<div id="b11">
    <button>List all job postings, internship postings separately</button>
</div>

<!-- The Modal -->
<div id="m11" class="modal">
    
  <!-- Modal content -->
<div id="cls11"><span class="close11">&times;</span></div>
    <p>
        <?php
include ("dbconnect.php");

$username=$_POST["username"];
$password=$_POST["passwrd"];
$fname=$_POST["fname"]; 
$lname=$_POST["lname"]; 
$military_service_stat=$_POST["military_service_stat"];
$duration;


if($password=="" && $username==""){
    echo "<br>Please enter inputs"; 
    exit(); 
}
//111111111111111111
$sql="SELECT * from job_posting";
    
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
                echo "<th>comp_cid</th>";
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
                echo "<td>" . $row['comp_cid'] . "</td>";
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
echo "<br><br>";

 $sql="select * from (job_posting J natural join internshipJobPosting J1)";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<table>";
            echo "<tr>";
                echo "<th>jid</th>";
                echo "<th>description</th>";
                echo "<th>salary</th>";
                echo "<th>phone</th>";
                echo "<th>numOpenings</th>";
                echo "<th>hrr_username</th>";
                echo "<th>openingdate</th>";
                echo "<th>duration</th>";
                echo "<th>comp_cid</th>";
                echo "<th>is_manOrIntern</th>";
                echo "<th>contract_type</th>";
                echo "<th>minnumDays</th>";
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
                echo "<td>" . $row['comp_cid'] . "</td>";
                echo "<td>" . $row['is_manOrIntern'] . "</td>";
                echo "<td>" . $row['contract_type'] . "</td>";
                echo "<td>" . $row['minnumDays'] . "</td>";
                
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
<div id="b22">
    <button>List open job postings, open internship postings separately</button>
</div>

<!-- The Modal -->
<div id="m22" class="modal">
  <!-- Modal content -->
  <div id="cls22"><span class="close22">&times;</span></div>
    <p>
        <?php
        //2222222222222
      $sql="SELECT * from job_posting where CURDATE() < date_add(openingdate, INTERVAL duration DAY)";
    
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
                echo "<th>comp_cid</th>";
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
                echo "<td>" . $row['comp_cid'] . "</td>";
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
echo "<br><br>";
 $sql="select * from (job_posting J natural join internshipJobPosting J1) where CURDATE() < date_add(openingdate, INTERVAL duration DAY)";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<table>";
            echo "<tr>";
                echo "<th>jid</th>";
                echo "<th>description</th>";
                echo "<th>salary</th>";
                echo "<th>phone</th>";
                echo "<th>numOpenings</th>";
                echo "<th>hrr_username</th>";
                echo "<th>openingdate</th>";
                echo "<th>duration</th>";
                echo "<th>comp_cid</th>";
                echo "<th>is_manOrIntern</th>";
                echo "<th>contract_type</th>";
                echo "<th>minnumDays</th>";
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
                echo "<td>" . $row['comp_cid'] . "</td>";
                echo "<td>" . $row['is_manOrIntern'] . "</td>";
                echo "<td>" . $row['contract_type'] . "</td>";
                echo "<td>" . $row['minnumDays'] . "</td>";
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
<div id="b33">
    <button>Display the company with highest paying job’s posting</button>
</div>

<!-- The Modal -->
<div id="m33" class="modal">
    
  <!-- Modal content -->
<div id="cls33"><span class="close33">&times;</span></div>
    <p>
        <?php
//333333333333333333333333333
    $sql="select c.* from job_posting as j LEFT OUTER JOIN company c ON c.cid = j.comp_cid where j.salary = (select max(salary) from job_posting)";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>cid</th>";
                echo "<th>name</th>";
                echo "<th>address</th>";
                echo "<th>phone</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['cid'] . "</td>";
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
<!-- 33333333333333 -->
<br><br>
<!-- 44444444444444 -->
<div id="b44">
    <button>Find the jobs those are suitable for who is looking for a part-time job to work during the summer in Bodrum</button>
</div>

<!-- The Modal -->
<div id="m44" class="modal">
  <!-- Modal content -->
  <div id="cls44"><span class="close44">&times;</span></div>
    <p>
        <?php
      //44444444444444444
    
  $sql="select J.description, J.salary,C.name from job_posting J, company C where J.contract_type='PT' and J.comp_cid = C.cid and C.address like '%bodrum%'";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>description</th>";
                echo "<th>salary</th>";
                echo "<th>name</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
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
<div id="b55">
    <button>Find the highest paying manager job with department size<50 for an end user E</button>
</div>

<!-- The Modal -->
<div id="m55" class="modal">
    
  <!-- Modal content -->
<div id="cls55"><span class="close55">&times;</span></div>
    <p>
        <?php
$sql="select jid, description, salary, c.name from job_posting, company c where salary = (select max(j.salary)
	from job_posting j, manager_job_posting m where j.is_manOrIntern=1 and j.jid=m.jid and m.deptSize<50) and comp_cid=c.cid;";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
            echo "<th>jid</th>";
                echo "<th>description</th>";
                echo "<th>salary</th>";
                echo "<th>name</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['jid'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
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
<div id="b66">
    <button>List the open internships positions of a particular company Oracle which allows more than 20 days</button>
</div>

<!-- The Modal -->
<div id="m66" class="modal">
  <!-- Modal content -->
  <div id="cls66"><span class="close66">&times;</span></div>
    <p>
        <?php
      
//6666666666666
  $sql="select * from (job_posting J natural join internshipJobPosting J1) join company C on J.comp_cid = C.cid 
          where C.name = 'Oracle' and J1.minnumdays>20";
    
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>jid</th>";
                echo "<th>description</th>";
                echo "<th>salary</th>";
                echo "<th>phone</th>";
                echo "<th>numOpenings</th>";
                echo "<th>hrr_username</th>";
                echo "<th>openingdate</th>";
                echo "<th>duration</th>";
                echo "<th>comp_cid</th>";
                echo "<th>is_manOrIntern</th>";
                echo "<th>contract_type</th>";
                echo "<th>minnumDays</th>";
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
                echo "<td>" . $row['comp_cid'] . "</td>";
                echo "<td>" . $row['is_manOrIntern'] . "</td>";
                echo "<td>" . $row['contract_type'] . "</td>";
                echo "<td>" . $row['minnumDays'] . "</td>";
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

<script>
                var modal11 = document.getElementById("m11");
                var modal22 = document.getElementById("m22");
                var modal33 = document.getElementById("m33");
                var modal44 = document.getElementById("m44");
                var modal55 = document.getElementById("m55");
                var modal66 = document.getElementById("m66");
                
		var btn11 = document.getElementById("b11");
                var btn22 = document.getElementById("b22");
                var btn33 = document.getElementById("b33");
                var btn44 = document.getElementById("b44");
                var btn55 = document.getElementById("b55");
                var btn66 = document.getElementById("b66");
                
                
                var cls11 = document.getElementsByClassName("close11")[0];
                var cls22 = document.getElementsByClassName("close22")[0];
                var cls33 = document.getElementsByClassName("close33")[0];
                var cls44 = document.getElementsByClassName("close44")[0];
                var cls55 = document.getElementsByClassName("close55")[0];
                var cls66 = document.getElementsByClassName("close66")[0];
                
		btn11.onclick = function() {
			modal11.style.display = "block";
			btn11.style.display = "none";
		}
                btn22.onclick = function() {
			modal22.style.display = "block";
			btn22.style.display = "none";
		}
                btn33.onclick = function() {
			modal33.style.display = "block";
			btn33.style.display = "none";
		}
                btn44.onclick = function() {
			modal44.style.display = "block";
			btn44.style.display = "none";
		}
                btn55.onclick = function() {
			modal55.style.display = "block";
			btn55.style.display = "none";
		}
                btn66.onclick = function() {
			modal66.style.display = "block";
			btn66.style.display = "none";
		}
                
		cls11.onclick = function() {
			modal11.style.display = "none";
			btn11.style.display = "block";
		}
		cls22.onclick = function() {
                        modal22.style.display = "none";
			btn22.style.display = "block";
		}
                cls33.onclick = function() {
                        modal33.style.display = "none";
			btn33.style.display = "block";
		}
                cls44.onclick = function() {
                        modal44.style.display = "none";
			btn44.style.display = "block";
		}
                cls55.onclick = function() {
                        modal55.style.display = "none";
			btn55.style.display = "block";
		}
                cls66.onclick = function() {
                        modal66.style.display = "none";
			btn66.style.display = "block";
		}
                
		window.onclick = function(event) {
			if(event.target == modal11 || event.target == modal22 || event.target == modal33 || event.target == modal44 || event.target == modal55 || event.target == modal66) {
				modal11.style.remove = "none";
                                modal22.style.remove = "none";
                                modal33.style.remove = "none";
                                modal44.style.remove = "none";
                                modal55.style.remove = "none";
                                modal66.style.remove = "none";
			}
		}
</script>
</body>
</html>
    <?php
include ("dbconnect.php");
mysqli_close($conn);

