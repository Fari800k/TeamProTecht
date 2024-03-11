<?php
    // Include navbar.php
    include "navbar.php";
    include "connectdb.php";

    $item_id = ""; 

    if(isset($_GET["Item_ID"])) {
        $item_id = $_GET["Item_ID"];
    } else {
        echo "Item ID is not set";
        exit(); 
    }

    $sql_query = "SELECT * FROM item WHERE Item_ID = ?";
    $ex_query= $pdo->prepare($sql_query);
    $ex_query->execute([$item_id]); 
    $row = $ex_query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["ItemName"]?></title>
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/product_dt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="row">
        <h1><?php echo $row["ItemName"] . " - " . $row["ItemDesc"]?></h1>
        <div class="column">
            <div class="card">
                <img class="phone_image" src="CSS/images/<?php echo $row["Img"]; ?>"/>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <p class="price"><b><?php echo "£" . $row["Price"]?></b></p>
                <button class="add-to-basket" onclick="redirectToBasketPage()"><b>Add to Basket</b></button>
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
                        echo "<i id='cross' class='fa fa-times'></i>" . "Out of stock";
                    } else if ($stock >= 1 and $stock <= 15) {
                        echo "<i id='exclamation' class='fa fa-exclamation'></i>" . "Hurry before it is sold out!";
                    } else {
                        echo "<i id='tickbox' class='fa fa-check'></i>" . "In stock";
                    }
                    ?>
                </p>
                <hr>
                <p class="product-details"><?php echo "<b>Short description:</b> " . $row["ItemDesc"]?></p>
                <hr>
                <button class="collapsible"><b>Why buy this phone?</b></button>
                <div class="content">
                    <p><?php echo "High quality " . $row["CameraMegapixels"] . " camera for excellent pictures"?></p>
                    <p><?php echo "Long lasting battery life up to " . $row["BatteryLife"] . " hours"?></p>
                    <p><?php echo "Large and spacious " .$row["DisplaySize"] . " display for real-screen estate with high screen-to-body ratio"?></p>
                    <p><?php echo "High storage capacity for storing your favourite pictures and videos, and other things you love and enjoy " ?></p>
                </div>
                
                <button class="collapsible"><b>Product information</b></button>
                <div class="content">
                    <p><?php echo "<b>Operating System</b>: " . $row["OperatingSystem"]?></p>
                    <p><?php echo "<b>Display size</b>: " . $row["DisplaySize"]?></p>
                    <p><?php echo "<b>Camera</b>: " . $row["CameraMegapixels"]?></p>
                    <p><?php echo "<b>Biometric authentication:</b> " . $row["BiometricAuthentication"]?></p>
                    <p><?php echo "<b>Available colours:</b> " . $row["colour"]?></p>
                    <p><?php echo "<b>Storage space:</b> " . $row["storage"]?></p>
                    <p><?php echo "<b>Theoretical battery life:</b> " . $row["BatteryLife"] . " hours"?></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        /* DO NOT REMOVE - controls collapsible elements. If moved to js file, it won't work */
        /* Iterate through collapsible elements */
        var coll = document.getElementsByClassName("collapsible");
        for (var i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight){
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                } 
            });
        }

        function redirectToBasketPage() {
            location.replace("addtobasket.php");
        }
    </script>
</body>
</html>