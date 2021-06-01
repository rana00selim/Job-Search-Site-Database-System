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
        <h1>Delete Contact</h1>
        
        <?php 
            $conn = mysqli_connect("localhost", "root", "","test");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * from contacts";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {//***************************hata veriyor?
            echo "<br><table><form action='deleteContact.php' method='post'>";
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><input type="checkbox" value="<?php echo $row['fname'];?>" name="fname"></td>
                <td><?php echo $row['lname'];?> <?php echo $row['fname'];?></td>
            </tr>
            <tr>
                <td><button>Delete</button></td>
            </tr>
            <?php   }
            }
        ?>
            </form>
            </table>
        </div>
    </body>
</html>

