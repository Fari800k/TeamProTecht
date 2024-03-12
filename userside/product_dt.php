<?php
    // Include navbar.php

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
    <title><?php echo $row["ItemName"]?></title>
    <link rel="stylesheet" href="CSS/product_dt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="JavaScript/script.js"></script>
</head>

<body>
    <?php
    session_start();
    include "navbar.php";
    ?>
    <div class="row">
        <h1><?php echo $row["ItemName"]. ""?></h1>
        <div id= "phone_image_container" class="column">
            <div class="card">
                <img class="phone_image" src="CSS/images/<?php echo $row["Img"]; ?>"/>
            </div>
        </div>

        <div id = "phone_desc_container" class="column">
            <div class="card">
                <p class="price"><b><?php echo "£" . $row["Price"]?></b></p>
                <hr>
                <!-- TASK FOR DANIEL: MAKE FORM FOR ADD TO BASKET -->
                <p class="stock">
                    <?php
                    /* Get Availability status*/
                    $stock = $row["Stock"]; // get number of items in stock from database
                    
                    /* 
                    * Validate availability status for specific item,
                    * i.e. in stock (plenty available), limited (very few left) 
                    * or out of stock
                    */
                    if ($stock == 0) {
                        echo "<i id='cross' class='fa fa-times'></i>" . "<strong>Out of stock</strong>";
                    } else {
                        if ($stock >= 1 and $stock <= 15) {
                            echo "<i id='exclamation' class='fa fa-exclamation'></i>" . "<strong>Hurry before it is sold out!</strong>";
                        } else {
                            echo "<i id='tickbox' class='fa fa-check'></i>" . "<strong>In stock</strong>";
                        }
                    ?>
                </p>
                <hr>
                <p class="product-details"><?php echo "Product details: " . $row["ItemDesc"]?></p>
                <button class="collapsible"><b>Why buy this phone?</b></button>
                <div class="content">
                    <p><?php echo "High quality " . $row["CameraMegapixels"] . " camera"?></p>
                    <p><?php echo "Long lasting battery life up to " . $row["BatteryLife"] . " hours"?></p>
                    <p><?php echo "Extremely spacious " .$row["DisplaySize"] . " display for real-screen estate with high screen-to-body ratio"?></p>
                </div>
                
                <button class="collapsible"><b>Information about the phone</b></button>
                <div class="content">
                    <p><?php echo "Operating System: " . $row["OperatingSystem"]?></p>
                    <p><?php echo "Display size: " . $row["DisplaySize"]?></p>
                    <p><?php echo "Camera: " . $row["CameraMegapixels"]?></p>
                    <p><?php echo "Biometric authentication: " . $row["BiometricAuthentication"]?></p>
                    <p><?php echo "Available colours: " . $row["colour"]?></p>
                    <p><?php echo "Storage space: " . $row["storage"]?></p>
                    <p><?php echo "Theoretical battery life: " . $row["BatteryLife"] . " hours"?></p>
                </div>
            </div>
        </div>
                    <?php
                    //if item stock != 0, enable add to basket feature
                    echo "<div id='addtobasketdiv' class='column'>";
                    echo "<h1>Add to basket</h1>";
                    echo "<form method = 'post' action ='addtobasket.php'>";
                    echo "<div id='quantity'><b>Amount to add: </b><input type='number' id='quantityform' name = 'quantity' min= '1' max= '$stock' value='1'></div>";
                    echo "<input type='hidden' name = 'product_id".$_GET['Item_ID']."' value='" . $_GET['Item_ID'] . "'>";
                    echo "<button type='submit' name='add_to_basket' class='add-to-basket'><b>Add to Basket</b></button>";
                    echo "</form></div>";
                    }
                    ?>
    </div>
</body>
</html>