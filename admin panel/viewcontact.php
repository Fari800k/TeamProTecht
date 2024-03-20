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
    <title>Contact Messages</title>
    <link rel="stylesheet" href="employee.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        /* Added CSS for the navbar */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #3f3f3f;
            padding-top: 20px;
        }

        .brand {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }

        .brand img {
            width: 80%;
            height: auto;
        }

        .side-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .side-menu li {
            margin-bottom: 10px;
        }

        .side-menu a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .side-menu a:hover {
            background-color: #555;
        }

        .icon {
            margin-right: 10px;
        }

        .text {
            vertical-align: middle;
        }

       .container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-left: 270px; /* Adjusted margin-left to accommodate sidebar width */
}

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 10px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
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
                    <i class='bx bxl-dropbox'></i>
                    <span class="text">Stock View</span>
                </a>
            </li>
            <li>
                <a href="confirm_orders.php">
                    <i class='bx bx-mail-send'></i>
                    <span class="text">Confirm Orders</span>
                </a>
            </li>
            <li>
                <a href="pending_orders.PHP">
                    <i class='bx bxs-hourglass'></i>
                    <span class="text">Pending Orders</span>
                </a>
            </li>
            <li>
                <a href="fulfilled_orders.php">
                    <i class='bx bxs-package'></i>
                    <span class="text">Fulfilled Orders</span>
                </a>
            </li>
<li>
    <a href="viewcontact.php">
        <i class='bx bx-envelope'></i>
        <span class="text">Contact Form</span>
    </a>
</li>
            <li>
                <a href="#">
                    <i class='bx bx-log-out'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>    <div class="container">
        <h1>Contact Messages</h1>

        <?php
        include('connectdb.php');

        if(isset($_POST['reply_submit'])) {
    // Check if 'contact_id' key exists in $_POST array
    if(isset($_POST['contact_id'])) {
        $contact_id = $_POST['contact_id'];
        $reply_message = $_POST['reply_message'];
        // Send email (implement your email sending logic here)
        // Once email sent, delete the message from database
        $delete_sql = "DELETE FROM ContactUs WHERE ContactUs_ID='$contact_id'";
        if ($pdo->query($delete_sql)) {
            echo "<p class='success'>Message replied and deleted successfully.</p>";
        } else {
            echo "<p class='error'>Error replying and deleting message: " . $pdo->errorInfo()[2] . "</p>";
        }
    } else {
        // Handle the case where 'contact_id' is not set
        echo "<p class='error'>Error: 'contact_id' not found in the form submission.</p>";
    }
}


        // Fetch all contact messages
        $sql = "SELECT * FROM ContactUs";
        $result = $pdo->query($sql);

        if ($result->rowCount() > 0) {
            // Output data of each row
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='message'>";
                echo "<p><strong>Name:</strong> " . $row["Name"] . "</p>";
                echo "<p><strong>Email:</strong> " . $row["Email"] . "</p>";
                echo "<p><strong>Message:</strong> " . $row["Message"] . "</p>";

                // Form for replying by email
                echo "<form method='post'>";
                echo "<input type='hidden' name='contact_id' value='" . $row["ContactUs_ID"] . "'>";
                echo "<textarea name='reply_message' placeholder='Type your reply here'></textarea><br>";
                echo "<input type='submit' name='reply_submit' value='Reply'>";
                echo "</form>";

                echo "</div>";
            }
        } else {
            echo "<p>No contact messages found.</p>";
        }
        ?>

    </div>
</body>
</html>
