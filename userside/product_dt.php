<?php
    // Include navbar.php
    include "navbar.php";
    include "connectdb.php";

    $Item_ID = ""; 

    if(isset($_GET["Item_ID"])) {
        $Item_ID = $_GET["Item_ID"];
    } else {
       
        echo "Item ID is not set";
        exit(); 
    }

    $sql_query = "SELECT * FROM item WHERE Item_ID = ?";
    $ex_query= $pdo->prepare($sql_query);
    $ex_query->execute([$Item_ID]); 

    
    $row = $ex_query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/product_dt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="row">
        <div class= "col-md-5">
            <h1><?php echo $row["ItemName"]?></h1>
            <img src="CSS/images/<?php echo $row["Img"]; ?>" style="width: 25%; padding-bottom: 20px;" />
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <p><?php echo "Details: " . $row["ItemDesc"]?></p>
            <p>Additional Information</p>
            <p><?php echo "Price: £" . $row["Price"]?></p>
            <p><?php echo "Operating System: " . $row["OperatingSystem"]?></p>
            <p><?php echo "Display size: " . $row["DisplaySize"]?></p>
            <p><?php echo "Camera: " . $row["CameraMegapixels"]?></p>
            <p><?php echo "Biometric authentication: " . $row["BiometricAuthentication"]?></p>
            <p><?php echo "Available colours: " . $row["colour"]?></p>
            <p><?php echo "Storage space: " . $row["storage"]?></p>
            <p><?php echo "Theoretical battery life: " . $row["BatteryLife"] . " hours"?></p>
            <p>
                <?php
                /* Get Availability status*/
                echo "Availability: ";
                
                $stock = $row["Stock"]; // get number of items in stock from database
                
                /* 
                * Validate availability status of specific item, i.e. if items are in stock,
                * otherwise out of stock
                */
                if ($stock == 0) {
                    echo "Out of stock";
                } else {
                    echo "In stock";
                }
                ?>
            </p>
            <button class="add-to-basket" >Add To Basket</button>
        </div>
    </div>
</body>
</html>