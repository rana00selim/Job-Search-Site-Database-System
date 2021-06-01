<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <div class="divOne">
        <h2>Address Book</h2>
        <ul>
            <li><a href="add.php">Add</a> </li>
            <li><a href="delete.php">Delete</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="list.php">List All</a></li>
        </ul>
    </div>
    <div class="divTwo">
        <h1>Welcome to address book app</h1>
        <form action="" method="post">
            <label for="">Enter first name</label><br>
            <input type="text" name="fname" required><br>
            <label for="">Enter last name</label><br>
            <input type="text" name="lname" required><br>
            <br>
            <button name="find">Find</button>
        </form>
        
        <?php 
        if(isset($_POST['find'])){
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $conn = mysqli_connect("localhost", "root", "","test");
            $fname=$_POST["fname"]; 
            $lname=$_POST["lname"]; 
            $result = mysqli_query($conn, "SELECT * from contacts where fname='$fname' and lname='$lname");
         if (mysqli_num_rows($result) > 0) {
         
         echo "<br><table border='1'><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Home Phone</th><th>Cell Phone</th><th>Office Phone</th><th>Address</th><th>Contact</th></tr>";
         while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['fname'];?></td>
            <td><?php echo $row['lname'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['homePhone'];?></td>
            <td><?php echo $row['cellPhone'];?></td>
            <td><?php echo $row['officePhone'];?></td>
            <td><?php echo $row['address'];?></td>
        </tr>
        <?php   }
            }
            else{
                echo "No result found";
            } 
        }
        ?>
        </table>
    </div>
</body>
</html>

