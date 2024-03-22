<?php 
session_start();
include "connectdb.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Your Basket</title>
    <link rel="stylesheet" href="CSS/basket.css" />
    <link rel="icon" type="image/x-icon" href="CSS/images/favicon.ico">
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
                    $basketID = $_SESSION['Basket_ID'];

                    //join tables to fetch item details for the basket
                    $sql2 = "SELECT basketitem.*, item.ItemName, item.Price FROM `basketitem` JOIN `item` ON basketitem.Item_ID = item.Item_ID WHERE Basket_ID = :basketID";
                    $stmt = $pdo->prepare($sql2);
                    $stmt->execute([':basketID' => $basketID]);

                    echo "<table><tr><th>Item name</th><th>Quantity</th><th>Price</th><th>Action</th></tr>";
                    while($basketItem = $stmt->fetch()) {
                        echo "<tr><td><a href='product_dt.php?Item_ID=" . $basketItem['Item_ID'] . "'>".$basketItem['ItemName']."</a></td><td>".$basketItem['Quantity']."</td><td>".($basketItem['Price'] * $basketItem['Quantity'])."</td>";
                        //delete item form
                        echo "<td><form action='deleteitem.php' method='post'><input type='hidden' name='BasketItem_ID' value='".$basketItem['BasketItem_ID']."'/><button type='submit' name='deleteItem'>Delete</button></form></td></tr>";
                    }
                    echo "</table>";
                    //placeholder checkout form
                    $sql3 = "SELECT COUNT(*) FROM `basketitem` WHERE Basket_ID = :basketID";
                    $stmt2 = $pdo->prepare($sql3);
                    $stmt2->execute([':basketID' => $basketID]);
                    $count = $stmt2->fetchColumn();
                    if($count >= 1){
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
