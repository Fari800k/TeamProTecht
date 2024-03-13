<?php
include('connectdb.php');
session_start();
include "navbar.php";

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
                echo $error;
            } else {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                $check_query = "SELECT COUNT(*) FROM `users` WHERE Username = :username";
                $check_stmt = $pdo->prepare($check_query);
                $check_stmt->bindParam(':username', $new_username);
                $check_stmt->execute();
                $existing_user = $check_stmt->fetchColumn();

                if($existing_user == 0) {
                    $create_query = "INSERT INTO `users` (Fore_name, Second_Name, Last_Name, Address_User, Username, Password) VALUES (:forename, :secondname, :lastname, :address, :username, :password)";
                    $create_stmt = $pdo->prepare($create_query);
                    $create_stmt->bindParam(':forename', $forename);
                    $create_stmt->bindParam(':secondname', $secondname);
                    $create_stmt->bindParam(':lastname', $lastname);
                    $create_stmt->bindParam(':address', $address);
                    $create_stmt->bindParam(':username', $new_username);
                    $create_stmt->bindParam(':password', $hashed_password);

                    if($create_stmt->execute()) {
                        echo "<script>alert('Registered successfully')</script>";
                        header("Location: login.php");
                        exit();
                    } else {
                        echo "Error creating user. Please try again.";
                    }
                } else {
                    echo "Username already exists. Please choose a different username.";
                }
            }
        }
        ?>