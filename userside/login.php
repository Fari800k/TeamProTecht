<?php 
include('connectdb.php');
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['User_ID'])){
    header("Location: accountpage.php");
} else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <link rel="icon" type="image/x-icon" href="CSS/images/favicon.ico">
    <script defer src="JavaScript/script.js"></script>
</head>
<body>
    <?php include "navbar.php"; ?>

    <div id="middle">
        <h1>Login</h1>
    <?php 
    if(isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    } 
    if(isset($success_message)){
        echo "<p style='color:green;'>$success_message</p>";
    }?>
        <form class="login" method="post" action="login.php">
            <input type="text" placeholder="Username" name="username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit" name="loginbtn">Login</button>
        </form>
    <?php
    if(isset($_POST['loginbtn'])) {
        $usernameSubmit = $_POST['username'];
        $passwordSubmit = $_POST['password'];
    
        $login_query = "SELECT * FROM `users` WHERE Username = :username";
        $stmt = $pdo->prepare($login_query);
        $stmt->bindParam(':username', $usernameSubmit);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if($user) {
            if(password_verify($passwordSubmit, $user['Password'])) {
                $_SESSION['username'] = $user['Username'];
                $_SESSION['User_ID'] = $user['User_ID'];
                if(isset($_SESSION['prev_page'])){
                    $prevpage = $_SESSION['prev_page'];
                    header("Location: $prevpage");
                } else{
                    header("Location: accountpage.php");
                }
            } else {
                if($passwordSubmit === $user['Password']) {
                    $_SESSION['username'] = $user['Username'];
                    $_SESSION['User_ID'] = $user['User_ID'];
                    if(isset($_SESSION['prev_page'])){
                        $prevpage = $_SESSION['prev_page'];
                        header("Location: $prevpage");
                    } else{
                        header("Location: accountpage.php");
                    }
                } else {
                    $error = "Incorrect password. Please try again.";
                }
            }
        } else {
            $error = "User not found. Please check your username.";
        }
    }
    ?>
        <button id="signupbtn" onclick="registerButton()">Sign up</button>
    </div>

    <div id="createUserPopup" class="popup">
        <form method="post" action="registeruser.php">
            <h2>Create User</h2>
            <input type="text" placeholder="Username" name="new_username" required><br<><br>
            <input type="password" placeholder="Password" name="new_password" required><br<><br>
            <input type="text" placeholder="First Name" name="forename" required><br<><br>
            <input type="text" placeholder="Second Name" name="secondname" required><br<><br>
            <input type="text" placeholder="Last Name" name="lastname" required><br<><br>
            <input type="text" placeholder="Address" name="address" required>
            <button type="submit" name="registerbtn">Create</button>
            <button type="button" onclick="cancelRegisterPopup()">Cancel</button>
        </form>
    </div>
</body>
<?php 
include "footer.php";
} 
?>
</html>
