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

    $ex_query= $pdo->prepare($item_query);
    $exec = $pdo->prepare($brand_query);
    
    $ex_query->execute([$item_id]);
    $exec->execute();

    $row = $ex_query->fetch(PDO::FETCH_ASSOC);
    $brand_row = $exec->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the item -->
    <title><?php echo $brand_row["BrandName"] . " " . $row["ItemName"]?></title>
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
        <h1 class="item-name"><?php echo $brand_row["BrandName"] . " " . $row["ItemName"]?></h1>
        <div id="phone_image_column" class="column">
            <img class="phone_image" src="CSS/images/<?php echo $row["Img"]?>"/>        
        </div>

        <div id = "phone_info_column" class="column">
            <p class="price"><b><?php echo "£" . $row["Price"] ?></b></p>
            <hr>
            <!-- TASK FOR DANIEL: MAKE FORM FOR ADD TO BASKET -->
            <p>
                <?php
                /* Get Availability status */
                $stock = $row["Stock"]; // get number of items in stock from database
                
                /* 
                * Validate availability status for specific item
                * with their appropriate messages included
                */
                if ($stock == 0) {
                    $error_msg = "Out of stock";
                    echo "<i id='cross' class='fa fa-times'></i>" . "<strong>" .$error_msg. "</strong>";
                } else if ($stock == 1) {
                    $critical_msg = "This is our last product, if you want it! Hurry before someone else buys it!" ;
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
                <p><?php echo $row["ItemDesc"] ?></p>
            </div>
            
            <button class="collapsible"><b>Why buy this phone?</b></button>
            <div class="content">
                <p><?php echo "High quality " . $row["CameraMegapixels"] . " camera"?></p>
                <p><?php echo "Long lasting battery life up to " . $row["BatteryLife"] . " hours"?></p>
                <p><?php echo "Extremely spacious " .$row["DisplaySize"] . " display for real-screen estate with high screen-to-body ratio"?></p>
            </div>
            
            <button class="collapsible"><b>Phone Specs</b></button>
            <div class="content">
                <p><?php echo "<b>Operating System:</b> " . $row["OperatingSystem"]?></p>
                <p><?php echo "<b>Display size:</b> " . $row["DisplaySize"]?></p>
                <p><?php echo "<b>Camera:</b> " . $row["CameraMegapixels"]?></p>
                <p><?php echo "<b>Biometric authentication:</b> " . $row["BiometricAuthentication"]?></p>
                <p><?php echo "<b>Available colour(s):</b> " . $row["colour"]?></p>
                <p><?php echo "<b>Storage space:</b> " . $row["storage"]?></p>
                <p><?php echo "<b>Theoretical battery life:</b> " . $row["BatteryLife"] . " hours"?></p>
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
            <br><br><br><br><br><hr>
            <h1 class="best-sellers">Best Sellers</h1>
            <?php include "featureditem.php"?>
            
            <div id="rate_review_column" class="column">
            <br><br><hr>    
            <h1 class="rate-review">Share your thoughts</h1>
            <div id="rate-review-card" class="card">
                <h1>Product Review</h1>

                <?php 
                $review_query = "SELECT ";
                ?>

                <div id="rating_bar">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <p>4.1 average based on 254 reviews</p>
                    
                    <div class="row">
                        <div class="side">
                            <div>5 star</div>
                        </div>
                    </div>

                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-5"></div>
                        </div>
                    </div>

                    <div class="side right">
                        <div>150</div>
                    </div>

                    <div class="side">
                        <div>4 star</div>
                    </div>

                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-4"></div>
                        </div>
                    </div>

                    <div class="side right">
                        <div>63</div>
                    </div>

                    <div class="side">
                        <div>3 star</div>
                    </div>

                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-3"></div>
                        </div>
                    </div>

                    <div class="side right">
                        <div>15</div>
                    </div>

                    <div class="side">
                        <div>2 star</div>
                    </div>

                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-2"></div>
                        </div>
                    </div>

                    <div class="side right">
                        <div>6</div>
                    </div>

                    <div class="side">
                        <div>1 star</div>
                    </div>

                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-1"></div>
                        </div>
                    </div>

                    <div class="side right">
                        <div>20</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>