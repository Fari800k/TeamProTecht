<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Details</title>
    <link rel="stylesheet" type="text/css" href="CSS/account.css">
    <script defer src="JavaScript/script.js"></script>

</head>
<body>
<?php
include('connectdb.php');
session_start();
include "navbar.php";

if(!isset($_SESSION['User_ID'])){
    header("Location: login.php");
} else{
?>

    <h2>Edit User Details</h2>
    <!-- Button to open the full popup menu -->
    <div class="buttonorders">
    <button onclick="openPopupMenu()">Previous Orders</button>
    </div>

    <!-- Full popup menu -->
    <div class="popup-menu-overlay" onclick="closePopupMenu()"></div>
    <div class="popup-menu">
        <h3>Previous Orders</h3>
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

                echo "<table border='1'>";
                echo "<tr><th>Order ID</th><th>Basket ID</th><th>Brand Name</th><th>Item Name</th><th>Quantity</th><th>Total Price</th></tr>";
                foreach($order_stmt as $order){
                    $orderid = $order['Order_ID'];
                    $basketid = $order['Basket_ID'];
                    $brandname = $order['BrandName'];
                    $itemname = $order['ItemName'];
                    $itemimg = $order['Img'];
                    $itemquantity = $order['Quantity'];
                    $totalitemprice = $order['Total_Price'];

                    //if current sub list is not current basket
                    if($currentorderbasket !== $basketid){
                        //if current order basket id is not first basket
                        if($currentorderbasket !== null){
                            echo "<tr><td colspan='5'>Subtotal:</td><td>$totalbasketprice</td></tr>";
                            echo "</table><br>";
                            $totalbasketprice = 0;
                        }
                        // Start a new subtable
                        echo "<table border='1'>";
                        echo "<tr><th>Order ID</th><th>Basket ID</th><th>Brand Name</th><th>Item Name</th><th>Quantity</th><th>Total Price</th></tr>";
                        $currentBasketID = $basketid;
                    }
                    echo "<tr>";
                    echo "<td>".$orderid."</td>";
                    echo "<td>".$basketid."</td>";
                    echo "<td>".$brandname."</td>";
                    echo "<td>".$itemname."</td>";
                    echo "<td>".$itemquantity."</td>";
                    echo "<td>".$totalitemprice."</td>";
                    echo "</tr>";   
                    
                    $totalbasketprice += $totalitemprice;
                }
                //display current basket total for last basket
                if ($currentBasketID !== null) {
                    echo "<tr><td colspan='5'>Basket total:</td><td>$totalbasketprice</td></tr>";
                    echo "</table>";
                }
        }catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
        ?>
    </div>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Username: <input type="text" name="username" value="<?php echo $row['Username'] ?? ''; ?>"><br><br>
        Password: <input type="password" name="password" value="<?php echo $row['Password'] ?? ''; ?>"><br><br>
        Forename: <input type="text" name="forename" value="<?php echo $row['Fore_name'] ?? ''; ?>"><br><br>
        Second Name: <input type="text" name="second_name" value="<?php echo $row['Second_Name'] ?? ''; ?>"><br><br>
        Last Name: <input type="text" name="last_name" value="<?php echo $row['Last_Name'] ?? ''; ?>"><br><br>
        Address: <textarea name="address"><?php echo $row['Address_User'] ?? ''; ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>

<?php
}
include "footer.php";
?>
</body>
</html>

