<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../login_system/login.php");
    exit();
}
session_abort();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="employee.css">
    <link rel="icon" type="image/x-icon" href="../userside/CSS/images/favicon.ico">
    <title>Employee Registration</title>
</head>
<body>
<section id="sidebar">
          <a href="" class="brand">
            <span class="icon">
                <img src="logo.png" alt="teamprotect logo">
            </span>
          </a>
          <ul class="side-menu top">
            <li>
                <a href="stockview.php">
                    <i class='bx bxl-dropbox' ></i>
                    <span class="text">Stock View</span>
                </a>
            </li>
            <li>
                <a href="confirm_orders.php">
                    <i class='bx bx-mail-send' ></i>
                    <span class="text">Confirm Orders</span>
                </a>
            </li>            <li>
                <a href="pending_orders.php">
                    <i class='bx bxs-hourglass' ></i>
                    <span class="text">Pending Orders</span>
                </a>
            </li>            <li>
                <a href="fulfilled_orders.php">
                    <i class='bx bxs-package' ></i>
                    <span class="text">Fulfilled Orders</span>
                </a>
            </li>
            <li>
                <a href="viewcontact.php">
                    <i class='bx bx-envelope'></i>
                    <span class="text">Contact Forms</span>
                </a>
            </li>
            <li>
                <a href="registration.php">
                    <i class='bx bx-edit'></i>
                    <span class="text">Register Employee</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

<section id="mainsection">
        <h1>Employee Registration</h1>
        <!-- Form for registration -->
         <p style="color:red">Required fields are marked with an asterisk(*)</p>
         <form action="" method="post"  enctype="multipart/form-data">
                        <label for="FirstName">Employee's First Name</label>
                        <input type="text" name="FirstName" placeholder="*" required />
                        <br><br>
                        <label for="LastName">Employee's Last Name</label>
                        <input type="text" name="LastName" placeholder="*" required />
                        <br><br>
                        <label for="employee_email">Employee Email Address</label>
                        <input type="email" name="employee_email" placeholder="*" required />
                        <br><br>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="userInput" placeholder="*"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters"
                            required />
                        <br><br>
                        <label for="confirm_pass">Confirm Password</label>
                        <input type="password" name="confirm_pass" id="confirmInput" placeholder="*"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
                        <input type="checkbox" onclick="showPassword()"> Show Password </input>
                        <br><br>
                        <button type="reset" class="cancelbtn">Cancel</button>
                        <button class="regbtn" onclick="validateForm()" name="user_register">Register</button>
</form>

<section>

</body>
<!--php to post the user data to the db-->

<?php
include '../userside/SQL/connectdb.php';
if (isset($_POST['user_register'])){
    //assign them to local variables
    $user_firstname = $_POST['FirstName'];
    $user_lastname = $_POST['LastName'];
    $user_email = $_POST['employee_email'];
    $user_pasword = $_POST['password'];
    $confirm_pass = $_POST['confirm_pass'];
    $hash_password=password_hash($user_pasword,PASSWORD_DEFAULT);

    //select query for user
    $check_user= "select * from `employees` where employee_email='$user_email'";
    $result=mysqli_query($con, $check_user);
    $dup_users_result=mysqli_num_rows($result);
    if ($dup_users_result>0){
        echo "<script>alert('this user already exists')</script>";
    }
    else if ($user_pasword!=$confirm_pass){
        echo "<script>alert('the passwords do not match, please try again')</script>";
    }
    else{
    //put into the db
    $insert_query = "INSERT INTO `employees` (LastName, FirstName, employee_email, password) VALUES
    ('$user_lastname', '$user_firstname', '$user_email', '$hash_password')";
    
    $sql_execute = mysqli_query($con, $insert_query);
    
    if ($sql_execute) {
        echo "<script>alert('Account created')</script>";
    } else {
        die(mysqli_error($con));
    }
}
}

?>
</html>
