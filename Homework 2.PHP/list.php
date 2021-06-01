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
        <h1>Contact List</h1>
        
        <?php 
            $conn = mysqli_connect("localhost", "root", "","test");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $result = mysqli_query($conn,"SELECT * from contacts");
            if (!$result) {
                echo "Error: ", mysqli_error($conn);
            }
         
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
                <td><a href="viewDetail.php?name=<?php echo $row['fname'];?>">view details</a></td>
            </tr>
            <?php   }
            ?>
            </table>
     </div>
    </body>
    </html>


