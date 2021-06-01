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
        <?php 
            $conn = mysqli_connect("localhost", "root", "","test");
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $fname=$_GET["fname"]; 
            $lname=$_GET["lname"];
            $sql = "SELECT * from contacts where fname='$fname' and lname='$lname";
            $result = mysqli_query($conn, $sql);
     
         //if (mysqli_num_rows($result) > 0) {
            echo "<br><table>";

            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td>First Name :*</td>
                    <td><input type="text" name="fname" required></td>
                </tr>
                <tr>
                    <td>Last Name :*</td>
                    <td><input type="text" name="lname" required></td>
                </tr>
                <tr>
                    <td>E-mail Address :*</td>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <td>Home Phone :*</td>
                    <td><input type="text" name="homePhone" required></td>
                </tr>
                <tr>
                    <td>Cell Phone :*</td>
                    <td><input type="text" name="cellPhone" required></td>
                </tr>
                <tr><td>Office Phone :*</td>
                    <td><input type="text" name="officePhone" required></td>
                </tr>
                <tr><td>Address :*</td>
                    <td><input type="text" name="address" required></td>
                </tr>
        <?php   }
            /*}
            else{
                echo "No result found";
            } */
        ?>
        </table>
    </div>
</body>
</html>

