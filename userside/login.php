<?php 
include('connectdb.php');
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['User_ID'])){
    header("Location: account.php");
} else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <script defer src="JavaScript/script.js"></script>
</head>
<body class="loginbody">
    <?php include "navbar.php"; ?>

    <h1>Login</h1>
    <?php 
    if(isset($error)) {
        echo "<p style='color:red;'>$error</p>";
    } 
    if(isset($success_message)){
        echo "<p style='color:green;'>$success_message</p>";
    }?>
    <form class="login" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                    header("Location: account.php");
                }
            } else {
                if($passwordSubmit === $user['Password']) {
                    $_SESSION['username'] = $user['Username'];
                    $_SESSION['User_ID'] = $user['User_ID'];
                    if(isset($_SESSION['prev_page'])){
                        $prevpage = $_SESSION['prev_page'];
                        header("Location: $prevpage");
                    } else{
                        header("Location: account.php");
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

    <div id="createUserPopup" class="popup">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2>Create User</h2>
            <input type="text" placeholder="First Name" name="forename" required><br<><br>
            <input type="text" placeholder="Second Name" name="secondname" required><br<><br>
            <input type="text" placeholder="Last Name" name="lastname" required><br<><br>
            <input type="text" placeholder="Address" name="address" required>
            <input type="text" placeholder="Username" name="new_username" required><br<><br>
            <input type="password" placeholder="Password" name="new_password" required><br<><br>
            <button type="submit" name="registerbtn">Create</button>
            <button type="button" onclick="cancelRegisterPopup()">Cancel</button>
        </form>

        <?php
        if(isset($_POST['registerbtn'])) {
            $forename = $_POST['forename'];
            $secondname = $_POST['secondname'];
            $address = $_POST['address'];
            $new_username = $_POST['new_username'];
            $new_password = $_POST['new_password'];
            $lastname = $_POST['lastname'];
            $new_password = $_POST['new_password'];
    
            if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $new_password)) {
                $error = "Password must be at least 8 characters long and contain at least one number and one special character.";
            } else {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                $check_query = "SELECT * FROM `users` WHERE Username = :username";
                $check_stmt = $pdo->prepare($check_query);
                $check_stmt->bindParam(':username', $new_username);
                $check_stmt->execute();
                $existing_user = $check_stmt->fetch(PDO::FETCH_ASSOC);

                if(!$existing_user) {
                    $create_query = "INSERT INTO `users` (Fore_name, Second_Name, Last_Name, Address_User, Username, Password) VALUES (:forename, :secondname, :lastname, :address, :username, :password)";
                    $create_stmt = $pdo->prepare($create_query);
                    $create_stmt->bindParam(':forename', $forename);
                    $create_stmt->bindParam(':secondname', $secondname);
                    $create_stmt->bindParam(':lastname', $lastname);
                    $create_stmt->bindParam(':address', $address);
                    $create_stmt->bindParam(':username', $new_username);
                    $create_stmt->bindParam(':password', $hashed_password);

                    if($create_stmt->execute()) {
                        $success_message = "User created successfully!";
                    } else {
                        $error = "Error creating user. Please try again.";
                    }
                } else {
                    $error = "Username already exists. Please choose a different username.";
                }
            }
        }
        ?>

    </div>
</body>
<?php 
include "footer.php";
} 
?>
</html>
