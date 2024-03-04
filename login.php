<?php 
include('connectdb.php');
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['User_ID'])){
    header("Location: account.php");
    exit();
}

if(isset($_POST['loginbtn'])) {
    $usernameSubmit = $_POST['username'];
    $passwordSubmit = $_POST['password'];

    $login_query = "SELECT * FROM `users` WHERE Username = :username";
    $stmt = $pdo->prepare($login_query);
    $stmt->bindParam(':username', $usernameSubmit);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user) {
        // First, check if the submitted password matches the hashed password
        if(password_verify($passwordSubmit, $user['Password'])) {
            // Password is correct, set session variables and redirect
            $_SESSION['username'] = $user['Username'];
            $_SESSION['User_ID'] = $user['User_ID']; // Assuming this is the column name for user ID
            header("Location: account.php");
            exit();
        } else {
            // If password_verify fails, check if the submitted password matches the plaintext password
            if($passwordSubmit === $user['Password']) { // Assuming the column name is 'Password'
                // Password is correct, set session variables and redirect
                $_SESSION['username'] = $user['Username'];
                $_SESSION['User_ID'] = $user['User_ID']; // Assuming this is the column name for user ID
                header("Location: account.php");
                exit();
            } else {
                // Incorrect password
                $error = "Incorrect password. Please try again.";
            }
        }
    } else {
        // Username not found
        $error = "User not found. Please check your username.";
    }
}

if(isset($_POST['createbtn'])) {
    $forename = $_POST['forename'];
    $secondname = $_POST['secondname'];
    $address = $_POST['address'];
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];
    $lastname = $_POST['lastname'];

    // Hash the password before storing it in the database
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Check if the username already exists
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
            // User creation successful
            $success_message = "User created successfully!";
        } else {
            // Error in user creation
            $error = "Error creating user. Please try again.";
        }
    } else {
        // Username already exists
        $error = "Username already exists. Please choose a different username.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <style>
        /* Style for popup */
        .popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            z-index: 9999;
        }
    </style>
</head>
<body>
    <?php include "navbar.php"; ?>

    <h1>Login</h1>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if(isset($success_message)) echo "<p style='color:green;'>$success_message</p>"; ?>
    <form class="example" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" placeholder="Username" name="username" required>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit" name="loginbtn">Login</button>
    </form>
    
    <!-- Button to trigger the popup -->
    <button onclick="document.getElementById('createUserPopup').style.display='block'">Create User</button>
    
<!-- Popup for creating a new user -->
<div id="createUserPopup" class="popup">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Create User</h2>
        <input type="text" placeholder="First Name" name="forename" required>
        <input type="text" placeholder="Second Name" name="secondname" required>
        <input type="text" placeholder="Last Name" name="lastname" required>
        <input type="text" placeholder="Address" name="address" required>
        <input type="text" placeholder="Username" name="new_username" required>
        <input type="password" placeholder="Password" name="new_password" required>
        <button type="submit" name="createbtn">Create</button>
        <button type="button" onclick="document.getElementById('createUserPopup').style.display='none'">Cancel</button>
    </form>
</div>



    <script>
        // Close the popup when clicking outside of it
        window.onclick = function(event) {
            var popup = document.getElementById('createUserPopup');
            if (event.target == popup) {
                popup.style.display = "none";
            }
        }
    </script>
</body>
</html>
