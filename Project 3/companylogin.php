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
        <h2>Fill Company Information</h2>
        <form action="savecompanylogin.php" method="post">
            <table>
                <tr>
                    <td>Company ID :*</td>
                    <td><input type="text" name="cid" required></td>
                </tr>
                <tr>
                    <td>Company Name :*</td>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <td>Phone Number :</td>
                    <td><input type="text" name="phone" ></td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td><input type="text" name="address" ></td>
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


