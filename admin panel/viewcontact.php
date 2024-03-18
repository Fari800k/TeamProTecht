<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .message {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
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
    <div class="container">
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

