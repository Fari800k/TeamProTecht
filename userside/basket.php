<?php 
session_start();
include "connectdb.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Teamprotecht</title>
    <link rel="stylesheet" href="CSS/basket.css" />
    <script defer src="JavaScript/script.js"></script>
</head>
<body>
    <?php include "navbar.php"; ?>
    <main>
        <h2>Your Basket</h2>
        <section id="basket">
            <?php
            
            if(isset($_SESSION['User_ID']) && isset($_SESSION['Basket_ID'])) {
                $userID = $_SESSION['User_ID'];

                //$sql1 = "SELECT * FROM `basket` WHERE User_ID = :userID ORDER BY `Updated_at` DESC LIMIT 1";
                //$stmt = $pdo->prepare($sql1);
                //$stmt->execute([':userID' => $userID]);
                //$usersBasket = $stmt->fetch();
{
                    //$basketID = $usersBasket['Basket_ID'];
                    $basketID = $_SESSION['Basket_ID'];

                    //join tables to fetch item details for the basket
                    $sql2 = "SELECT basketitem.*, item.ItemName, item.Price FROM `basketitem` JOIN `item` ON basketitem.Item_ID = item.Item_ID WHERE Basket_ID = :basketID";
                    $stmt = $pdo->prepare($sql2);
                    $stmt->execute([':basketID' => $basketID]);

                    echo "<table><tr><th>Item name</th><th>Quantity</th><th>Price</th><th>Action</th></tr>";
                    while($basketItem = $stmt->fetch()) {
                        echo "<tr><td>".$basketItem['ItemName']."</td><td>".$basketItem['Quantity']."</td><td>".($basketItem['Price'] * $basketItem['Quantity'])."</td>";
                        //delete item form
                        echo "<td><form action='deleteItem.php' method='post'><input type='hidden' name='BasketItem_ID' value='".$basketItem['BasketItem_ID']."'/><button type='submit' name='deleteItem'>Delete</button></form></td></tr>";
                    }
                    echo "</table>";
                    //placeholder checkout form
                    echo "<form action='checkout.php' method='post'><input type='hidden' name='Basket_ID' value='".$basketID."'/><button type='submit' name='checkout'>Checkout</button></form>";
                }
            } else {
                echo "<strong> No new basket, added an item to view here </strong>";
            }
            ?>
        </section>
        <button><a href="browse.php">Return to shopping</a></button>
    </main>
    <?php include "footer.php"; ?>
</body>
</html>
