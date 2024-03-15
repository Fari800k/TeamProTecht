<?php include('connectdb.php');?>


<!DOCTYPE html>
<html>

<head>
    <title>Employee Login</title>
    <!-- Add your CSS link here -->
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>

<body>
    <div class="navbar">
        <!-- Menu Bar -->
        <ul>
            <div class="logo-container1">
                <img src="cs2tp_logo-removebg-preview (1).png" alt="Logo 1">
            </div>
        </ul>
    </div>

    <div class="main-content">
        <h1>Employee Login</h1>
        <form action="" method="post">
            <p>Use your organisation email and password to login.</p>
            <label for="employeeEmail">Email Address</label>
            <input id="emailAddress" type="email" name="email" required />
            <br><br>
            <label for="employeePassword">Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input id="inPassword" type="password" name="employeePassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
            <br><br>
            <button class="loginbtn" name="loginbtn">Login</button>
            <p>If you haven't created an account, click on the underlined link below.<br><a href="registration.php">Create an employee account</a></p>
        </form>
    </div>

    <?php
    if (isset($_POST['loginbtn'])) {
        $emailAddress = $_POST['email'];
        $employeePassword = $_POST['employeePassword'];

        $select_query = "SELECT * FROM `employees` WHERE employee_email = '$emailAddress'";
        $result = mysqli_query($con, $select_query);
        $row_count = mysqli_num_rows($result);
        $row_data = mysqli_fetch_assoc($result);
        
        if ($row_count > 0) {
            if (password_verify($employeePassword, $row_data['password'])) {
                echo "<script>alert('Login successful')</script>";
                header("Location: ../stockview.php");

           

            } else {
                echo "<script>alert('Invalid user')</script>";
                header("Location: ../stockview.php");
                exit;
            }
        } else {
            echo "<script>alert('Invalid user')</script>";
        }
    }
    ?>
</body>

</html>
