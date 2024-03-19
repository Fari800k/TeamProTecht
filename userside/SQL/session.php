<?php
session_start();
require 'connectdb.php';

// Check form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['employeePassword'])) {
    // trim input
    $emailAddress = trim($_POST['email']);
    $employeePassword = trim($_POST['employeePassword']);

    // check empty fields
    if (empty($emailAddress) || empty($employeePassword)) {
        // redirect and error
        header("Location: ../../../TeamProTect/login_system/login.php?error=emptyfields");
        exit();
    } else {
        // prepare select
        $sql = "SELECT employee_id, password FROM employees WHERE employee_email = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $emailAddress);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            // check user exists
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // verify password
                if (password_verify($employeePassword, $row['password'])) {
                    // correct password
                    $_SESSION['user_id'] = $row['employee_id']; 
                    $_SESSION['email'] = $emailAddress;

                    // redirect to home
                    header("Location: ../../../TeamProTecht/admin panel/pending_orders.php?loginsuccessful");
                    exit();
                } else {
                    // error for invalid password
                    header("Location: ../../../TeamProTecht/login_system/login.php?error=wrongpassword");
                    exit();
                }
            } else {
                // error for no user
                header("Location: ../../../TeamProTecht/login_system/login.php?error=nouser");
                exit();
            }
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
} else {
    // redirect if error
    header("Location: login.php");
    exit();
}
?>
