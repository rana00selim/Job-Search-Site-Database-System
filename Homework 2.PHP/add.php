<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <h2>Add contact information</h2>
        <form action="savecontact.php" method="post">
            <table>
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
                <tr></tr>
                    <td>
                        <button>Add</button>
                    </td>
                </tr>
            </table>        
        </form>
    </div>
</body>
</html>


