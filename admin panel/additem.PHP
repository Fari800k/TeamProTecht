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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="employee.css">
    <title>Product Form</title>
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
                    <i class='bx bxl-dropbox' ></i>
                    <span class="text">Stock View</span>
                </a>
            </li>
            <li>
                <a href="confirm_orders.php">
                    <i class='bx bx-mail-send' ></i>
                    <span class="text">Confirm Orders</span>
                </a>
            </li>            <li>
                <a href="pending_orders.php">
                    <i class='bx bxs-hourglass' ></i>
                    <span class="text">Pending Orders</span>
                </a>
            </li>            <li>
                <a href="fulfilled_orders.php">
                    <i class='bx bxs-package' ></i>
                    <span class="text">Fulfilled Orders</span>
                </a>
            </li>
        </li>            <li>
            <a href="logout.php">
                <i class='bx bx-log-out'></i>
                <span class="text">Logout</span>
            </a>
        </li>
          </ul>
    </section>

<section id="mainsection">
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="brandname">Brand Name:</label><br>
        <input type="text" name="brandname" required><br><br>


        <label for="itemname">Item Name:</label><br>
        <input type="text" name="itemname" required><br><br>


        <label for="quantity">Quantity:</label><br>
        <input type="number" name="quantity" required><br><br>

                
        <label for="price">Price:</label><br>
        <input type="number" name="price" required><br><br>


        <label for="itemdescription">Item Description:</label><br>
        <textarea name="itemdescription" rows="4" required></textarea><br><br>


        <label for="image">Photo Name:</label><br>
        <input type="file" name="image" required required><br><br>

        
        <label for="operatingsystem">Operating System:</label><br>
        <input type="text" name="operatingsystem" required><br><br>

        
        <label for="screensize">Display Size:</label><br>
        <input type="text" name="screensize" required><br><br>

        <label for="disres">Display Resolution:</label><br>
        <input type="text" name="disres" required><br><br>

        
        <label for="batterylife">Battery Life:</label><br>
        <input type="number" name="batterylife" required><br><br>

        
        <label for="camera">Camera Resolution (MP):</label><br>
        <input type="text" name="camera" required><br><br>

        
        <label for="biometrics">Biometrics:</label><br>
        <input type="text" name="biometrics" required><br><br>

        <label for="color">Color:</label><br>
        <input type="text" name="color" required><br><br>

        <label for="storage">Storage:</label><br>
        <input type="text" name="storage" required><br><br>

        <label for="shelf">Shelf:</label><br>
        <input type="text" name="shelf" required><br><br>



        <label for="row">Row:</label><br>
        <input type="text" name="row" required><br><br>


        <input type="submit" value="Submit">
    </form>
<section>

</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder =  'img/'.$file_name;

    $brandname = $_POST["brandname"];
    $itemname = $_POST["itemname"];
    $quantity = $_POST["quantity"];
    $itemdescription = $_POST["itemdescription"];
    $price = $_POST["price"]; 
    $operatingsystem = $_POST["operatingsystem"];
    $disres = $_POST["disres"];
    $screensize = $_POST["screensize"];
    $batterylife = $_POST["batterylife"];
    $camera = $_POST["camera"];
    $biometrics =  $_POST["biometrics"];
    $shelf = $_POST["shelf"];
    $itemrow = $_POST["row"];
    $color = $_POST["color"]; // New field for color
    $storage = $_POST["storage"]; // New field for storage

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
        
        // Prepare the statements
        $stmt_location = $pdo->prepare("INSERT INTO location (Shelf, Row) VALUES (?, ?)");
        $stmt_brand = $pdo->prepare("INSERT INTO Brand (BrandName) VALUES (?)");
        $stmt_item = $pdo->prepare("INSERT INTO Item (ItemName, Quantity, ItemDesc, Price, Img, Location_ID, OperatingSystem, DisplaySize, DisplayResolution, BatteryLife, CameraMegapixels, BiometricAuthentication, Colour, Storage) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
        // Bind parameters and execute
        $stmt_location->execute([$shelf, $itemrow]);
        $stmt_brand->execute([$brandname]);
        $location_id = $pdo->lastInsertId();
        
        $stmt_item->execute([$itemname, $quantity, $itemdescription, $price, $file_name, $location_id, $operatingsystem, $screensize, $disres, $batterylife, $camera, $biometrics, $color, $storage]);
        
        if(move_uploaded_file($tempname, $folder)){
            echo "<alert>Product Uploaded Successfully</alert>";
        } else {
            echo "<alert>Product not added</alert>";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

