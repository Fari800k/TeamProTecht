<?php
    // connect to database
    include "connectdb.php";

    $item_id = ""; 

    if(isset($_GET["Item_ID"])) {
        $item_id = $_GET["Item_ID"];
    } else {
       
        echo "Item ID is not set";
        exit(); 
    }

    $item_query = "SELECT * FROM item WHERE Item_ID = ?";
    $brand_query = "SELECT * FROM brand";
    $review_query = "SELECT * FROM reviews";

    $ex_item= $pdo->prepare($item_query);
    $ex_brand = $pdo->prepare($brand_query);
    $ex_rev = $pdo->prepare($review_query);
    
    $ex_item->execute([$item_id]);
    $ex_brand->execute();
    $ex_rev->execute();

    $item_row = $ex_item->fetch(PDO::FETCH_ASSOC);
    $brand_row = $ex_brand->fetch(PDO::FETCH_ASSOC);
    $rev_row = $ex_rev->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the item -->
    <title><?php echo $brand_row["BrandName"] . " " . $item_row["ItemName"]?></title>
    <link rel="stylesheet" href="CSS/product_dt.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="JavaScript/script.js"></script>
</head>

<body>
    <?php
    session_start();
    // include navbar file
    include "navbar.php";
    ?>
    <div class="row">
        <h1 class="item-name"><?php echo $brand_row["BrandName"] . " " . $item_row["ItemName"]?></h1>
        <div id="phone_image_column" class="column">
            <img class="phone_image" src="CSS/images/<?php echo $item_row["Img"]?>"/>        
        </div>

        <div id = "phone_info_column" class="column">
            <p class="price"><b><?php echo "£" . $item_row["Price"] ?></b></p>
            <hr>
            <!-- TASK FOR DANIEL: MAKE FORM FOR ADD TO BASKET -->
            <p>
                <?php
                /* Get Availability status */
                $stock = $item_row["Stock"]; // get number of items in stock from database
                
                /* 
                * Validate availability status for specific item
                * with their appropriate messages included
                */
                if ($stock == 0) {
                    $error_msg = "Out of stock";
                    echo "<i id='cross' class='fa fa-times'></i>" . "<strong>" .$error_msg. "</strong>";
                } else if ($stock == 1) {
                    $critical_msg = "This is our last product, if you want it! Hurry before it's gone!" ;
                    echo "<i id='warning' class='fa fa-exclamation'></i>" . "<strong>" .$critical_msg. "</strong>";
                } else if ($stock >=2 and $stock <=5) {
                    $more_prompt_msg = "Stock is close to running out!";
                    echo "<i id='more_prompt' class='fa fa-exclamation'></i>" ."<strong>" .$more_prompt_msg. "</strong>";
                } else if ($stock >= 10 and $stock <= 15) {
                    $warning_msg = "Low stock! Only a couple left! Hurry before it's gone";
                    echo "<i id='warning1' class='fa fa-exclamation'</i>" . "<strong>" .$warning_msg. "</strong<";
                } else {
                    $normal_msg = "In stock";
                    echo "<i id='tickbox' class='fa fa-check'></i>" . "<strong>" .$normal_msg. "</strong>";
                }
                ?>
            </p>
            
            <hr>
            <button class="collapsible"><b>Brief Product Description</b></button>
            <div class="content">
                <p><?php echo $item_row["ItemDesc"] ?></p>
            </div>
            
            <button class="collapsible"><b>Why buy this phone?</b></button>
            <div class="content">
                <p><?php echo "High quality " . $item_row["CameraMegapixels"] . " camera"?></p>
                <p><?php echo "Long lasting battery life up to " . $item_row["BatteryLife"] . " hours"?></p>
                <p><?php echo "Extremely spacious " .$item_row["DisplaySize"] . " display for real-screen estate with high screen-to-body ratio"?></p>
            </div>
            
            <button class="collapsible"><b>Phone Specs</b></button>
            <div class="content">
                <p><?php echo "<b>Operating System:</b> " . $item_row["OperatingSystem"]?></p>
                <p><?php echo "<b>Display size:</b> " . $item_row["DisplaySize"]?></p>
                <p><?php echo "<b>Camera:</b> " . $item_row["CameraMegapixels"]?></p>
                <p><?php echo "<b>Biometric authentication:</b> " . $item_row["BiometricAuthentication"]?></p>
                <p><?php echo "<b>Available colour(s):</b> " . $item_row["colour"]?></p>
                <p><?php echo "<b>Storage space:</b> " . $item_row["storage"]?></p>
                <p><?php echo "<b>Theoretical battery life:</b> " . $item_row["BatteryLife"] . " hours"?></p>
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
        ?>

        <div id="best_sellers_column" class="column">
            <br><br><br><br><hr class="best-sellers">
            <h1 class="best-sellers">Best Sellers</h1>
            <?php include "featureditem.php"?>
            <div id="rev_col" class="column">
            <h1 class="rev">What people have said about this product?</h1>
                <div id="rev_card" class="card">

                    <div class="row">
                        <div class="side">
                            <div>
                                <?php
                                for () {
                                    
                                }
                                echo $rev_row["Description"]
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>