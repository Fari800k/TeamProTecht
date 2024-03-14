<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/aboutus.css">
</head>
<body>

    <nav>
        <ul> 
            <li><img src="CSS HP/images/logo.png" width="90px" height="65px"></li>
            <li><a href="Teamprotecht - HomePage.html">Home</a></li>
            <li><a href="browse.php">Browse</a></li>
            <li><a href="">About Us</a></li>
            <li style="float:right"><a href="Product_Basket.php"><i class="fa fa-shopping-basket"></i></a></li>
            <li style="float:right"><a href="#"><i class="fa fa-user"></i></a></li>
        </ul>
    </nav>

    <h1>Contact Us</h1>

    <div class="container">
        <div class="column">
            <div class="text">
                <?php
                // Check if form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Connect to the database (Replace these parameters with your actual database credentials)
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs2tp";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Prepare SQL statement to insert data into the ContactUs table
                    $sql = "INSERT INTO ContactUs (Name, Email, Message) VALUES (?, ?, ?)";
                    
                    // Prepare and bind parameters
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sss", $name, $email, $message);

                    // Set parameters and execute statement
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $message = $_POST["message"];
                    $stmt->execute();

                    // Close statement and connection
                    $stmt->close();
                    $conn->close();

                    echo "<p>Your message has been successfully submitted!</p>";
                }
                ?>
                <!-- Contact form can be added here -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name"><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email"><br>
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message"></textarea><br>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>


</body>
</html>
