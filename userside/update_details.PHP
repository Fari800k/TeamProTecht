<?php
// Include database connection file
include('connectdb.php');

// Start session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $forename = $_POST['forename'];
    $second_name = $_POST['second_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    
    // Validate form data
    if (!empty($password)) {
        // Password field is not empty, perform password validation
        if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$%^&*()-_=+{};:,<.>]).{8,}$/', $password)) {
            // Password meets criteria, proceed with updating user details

            // Check if the new username is unique
            $check_username_sql = "SELECT COUNT(*) AS count FROM users WHERE Username = :username AND User_ID != :userID";
            $check_username_stmt = $pdo->prepare($check_username_sql);
            $check_username_stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $check_username_stmt->bindParam(':userID', $_SESSION['User_ID'], PDO::PARAM_INT);
            $check_username_stmt->execute();
            $result = $check_username_stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['count'] > 0) {
                // Username already exists, redirect back to account page with error message
                $_SESSION['update_error'] = "Username already exists. Please choose a different username.";
                header("Location: aaccountpage.php");
                exit();
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Update user details in the database
                $sql = "UPDATE users SET Username = :username, Password = :password, Fore_name = :forename, Second_Name = :second_name, Last_Name = :last_name, Address_User = :address WHERE User_ID = :userID";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR); // Use hashed password
                $stmt->bindParam(':forename', $forename, PDO::PARAM_STR);
                $stmt->bindParam(':second_name', $second_name, PDO::PARAM_STR);
                $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
                $stmt->bindParam(':address', $address, PDO::PARAM_STR);
                $stmt->bindParam(':userID', $_SESSION['User_ID'], PDO::PARAM_INT);

                // Execute the update query
                if ($stmt->execute()) {
                    // Redirect back to the user account page after successful update
                    $_SESSION['update_success'] = "User details updated successfully.";
                    header("Location: aaccountpage.php");
                    exit();
                } else {
                    // Handle error
                    $_SESSION['update_error'] = "Error updating user details.";
                    header("Location: aaccountpage.php");
                    exit();
                }
            }
        } else {
            // Password validation failed, redirect back to account page with error message
            $_SESSION['update_error'] = "Password must contain at least 8 characters, including at least one number, one special character, and one letter.";
            header("Location: aaccountpage.php");
            exit();
        }
    } else {
        // No password entered, proceed with updating user details without updating the password
        // Update user details in the database (excluding the password)
        $sql = "UPDATE users SET Username = :username, Fore_name = :forename, Second_Name = :second_name, Last_Name = :last_name, Address_User = :address WHERE User_ID = :userID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':forename', $forename, PDO::PARAM_STR);
        $stmt->bindParam(':second_name', $second_name, PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $stmt->bindParam(':address', $address, PDO::PARAM_STR);
        $stmt->bindParam(':userID', $_SESSION['User_ID'], PDO::PARAM_INT);

        // Execute the update query
        if ($stmt->execute()) {
            // Redirect back to the user account page after successful update
            $_SESSION['update_success'] = "User details updated successfully.";
            header("Location: aaccountpage.php");
            exit();
        } else {
            // Handle error
            $_SESSION['update_error'] = "Error updating user details.";
            header("Location: aaccountpage.php");
            exit();
        }
    }
}
?>
