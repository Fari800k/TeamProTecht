<?php include '../userside/SQL/connectdb.php';?>

<!DOCTYPE html>
<html>

<head>
    <title>Employee Registration</title>
    <!-- Add your CSS link here -->
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="icon" type="image/x-icon" href="../userside/CSS/images/favicon.ico">
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
                        <input type="checkbox" onclick="showPassword()"> Show Password
                        <br><br>
                        <button type="reset" class="cancelbtn">Cancel</button>
                        <button class="regbtn" onclick="validateForm()" name="user_register">Register</button>
</form>


        
    </div>

</html>

<!--php to post the user data to the db-->

<?php
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

