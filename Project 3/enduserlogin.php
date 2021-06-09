<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <div class="divOne">
        <h2>Company Database System</h2>
        <ul>
            <li><a href="companylogin.php">Login as Company</a> </li>
            <li><a href="hrrlogin.php">Login as HRR</a></li>
            <li><a href="enduserlogin.php">Login as End-User</a></li>
        </ul>
    </div>
    <div class="divTwo">
        <h2>Fill End-User Information</h2>
        <form action="saveenduserlogin.php" method="post">
            <table>
                <tr>
                    <td>First Name :*</td>
                    <td><input type="text" name="fname" ></td>
                </tr>
                <tr>
                    <td>Last Name :*</td>
                    <td><input type="text" name="lname" ></td>
                </tr>
                <tr>
                    <td>Username :*</td>
                    <td><input type="text" name="username" required ></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="passwrd" ></td>
                </tr>
                <tr>
                    <td>Military Service Status :</td>
                    <td><input type="text" name="military_service_stat" ></td>
                </tr>
                
                <tr></tr>
                    <td>
                        <button>Login</button>
                    </td>
                </tr>
            </table>        
        </form>
    </div>
</body>
</html>
