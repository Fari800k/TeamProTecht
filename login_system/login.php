<!DOCTYPE html>
<html>

<head>
    <title>Employee Login</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>

<body>
    <div class="navbar">
        <ul>
            <div class="logo-container1">
                <img src="cs2tp_logo-removebg-preview (1).png" alt="Logo 1">
            </div>
        </ul>
    </div>

    <div class="main-content">
        <h1>Employee Login</h1>
        <form action="../userside/SQL/session.php" method="post">
            <p>Use your organisation email and password to login.</p>
            <label for="employeeEmail">Email Address</label>
            <input id="emailAddress" type="email" name="email" required />
            <br><br>
            <label for="employeePassword">Password</label>
            <input id="inPassword" type="password" name="employeePassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
            <br><br>
            <button class="loginbtn" name="loginbtn">Login</button>
            <p>If you haven't created an account, click on the underlined link below.<br><a href="registration.php">Create an employee account</a></p>
            <p>Go back to the customer homepage.<br><a href="../userside/homepage.php">Homepage</a></p>
        </form>
    </div>
</body>

</html>
