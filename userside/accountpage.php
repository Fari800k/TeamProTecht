<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/account.css">
    <script defer src="JavaScript/script.js"></script>

</head>
<?php
include('connectdb.php');
session_start();
include "navbar.php";
if(!isset($_SESSION['User_ID'])){
    header("Location: login.php");
} 
?>


<body>
    <div class="row">
        <div class="column">
            <div class="card" style="padding-left: 50px; padding-top: 100px;">
                <img class="user_image" src="CSS/images/userlogo.png" style="width: 150px; height: 150px;"/>
                <h3><?php echo $_SESSION['username']; ?></h3>
                <a href="" >Update Details</a><br>
                <a href="" >Return an Order</a><br>
                <a href="" >Review a product</a>
            </div>
            <?php
        try {
            $order_sql = "SELECT orderbaskets.Order_ID, orderbaskets.Basket_ID, brand.BrandName, item.ItemName, item.Img, basketitem.Quantity, (basketitem.Quantity * item.Price) AS Total_Price FROM basketitem
                        JOIN ((SELECT orders.Order_ID, basket.Basket_ID, basket.User_ID FROM orders
                                JOIN basket ON basket.Basket_ID = orders.Basket_ID
                                WHERE basket.User_ID = :user_id) AS orderbaskets)
                        ON orderbaskets.Basket_ID = basketitem.Basket_ID
                        JOIN item ON item.Item_ID = basketitem.Item_ID
                        JOIN brand ON brand.Item_ID = basketitem.Item_ID";
            $order_stmt = $pdo->prepare($order_sql);
            $order_stmt->bindParam(':user_id', $_SESSION['User_ID'], PDO::PARAM_INT);
            $order_stmt->execute();

            $currentorderbasket = null;
            $totalbasketprice = 0;

                echo '<div class="prev" style="padding-top: 100px; padding-left: 100px;">';
                echo "<h3>Previous Orders<h3>";
                foreach($order_stmt as $order){
                    $orderid = $order['Order_ID'];
                    $basketid = $order['Basket_ID'];
                    $brandname = $order['BrandName'];
                    $itemname = $order['ItemName'];
                    $itemimg = $order['Img'];
                    $itemquantity = $order['Quantity'];
                    $totalitemprice = $order['Total_Price'];

                    echo '<div class="phone">';
                    echo '<img src="CSS/images/' . $itemimg . '" alt="asus" class="phone">';
                    echo '<div class="phone_name">';
                    echo "<h3>" . $brandname . " " . $itemname . "</h3>";
                    echo "<h3>" . 'Quantity: ' . $itemquantity . "</h3>";
                    echo "<h3>". 'Total Price £'. $totalitemprice ."</h3>";
                    echo "</div>";
                    echo "</div>";

                    
                    $totalbasketprice += $totalitemprice;
                }

                }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
        ?>
            
                
                
                    
                    
                        
                   



