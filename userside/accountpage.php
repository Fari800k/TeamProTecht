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
if (!isset($_SESSION['User_ID'])) {
    header("Location: login.php");
}
//retrieve the orders for the current user
$sql = "SELECT orders.Order_ID, orders.Order_Status, orders.Address_Order
        FROM orders
        INNER JOIN basket ON orders.Basket_ID = basket.Basket_ID
        WHERE basket.User_ID = :userID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userID', $_SESSION['User_ID'], PDO::PARAM_INT);
$stmt->execute();
$orders = $stmt->fetchAll();

//form submission
if (isset($_POST['start_return'])) {
    $orderID = $_POST['order_id'];

    //update status
    $sql = 'UPDATE orders SET Order_Status = "Returning" WHERE Order_ID = :orderID';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':orderID', $orderID, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Order status updated to 'Return Started' successfully.";
    } else {
        echo "Error updating order status.";
    }
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
                <img class="user_image" src="CSS/images/userlogo.png" style="width: 150px; height: 150px;" />
                <h3>
                    <?php echo $_SESSION['username']; ?>
                </h3>
                <a href="">Update Details</a><br>
                <a href="#" onclick="returnPopup()">Return an Order</a>
                <div id="returnOrderPopup" class="popup-menu">
                    <h3>Return Order</h3>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <label for="order_id">Select Order:</label>
                        <select id="order_id" name="order_id">
                            <?php foreach ($orders as $order): ?>
                                <option value="<?php echo $order['Order_ID']; ?>">
                                    Order ID:
                                    <?php echo $order['Order_ID']; ?> (
                                    <?php echo $order['Order_Status']; ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <br>
                        <br>
                        <input type="submit" name="start_return" value="Start Return">
                        <br>
                        <br>
                        <button type="button" onclick="cancelReturnPopup()">Cancel</button>
                    </form>
                </div>
            </div>
            <?php
            try {
                $order_sql = "SELECT orderbaskets.Order_ID, orderbaskets.Basket_ID, brand.BrandName, item.ItemName, item.Img, basketitem.Quantity, orderbaskets.Order_Status, (basketitem.Quantity * item.Price) AS Total_Price
            FROM basketitem
            JOIN ((SELECT orders.Order_ID, orders.Order_Status, basket.Basket_ID, basket.User_ID
            FROM orders
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
                foreach ($order_stmt as $order) {
                    $orderid = $order['Order_ID'];
                    $basketid = $order['Basket_ID'];
                    $brandname = $order['BrandName'];
                    $itemname = $order['ItemName'];
                    $itemimg = $order['Img'];
                    $itemquantity = $order['Quantity'];
                    $totalitemprice = $order['Total_Price'];
                    $orderStatus = $order['Order_Status'];

                    echo '<div class="phone">';
                    echo '<h3>' . 'Order #:' . $orderid . '</h3>';
                    echo '<img src="CSS/images/' . $itemimg . '" alt="asus" class="phone">';
                    echo '<div class="phone_name">';
                    echo "<h3>" . $brandname . " " . $itemname . "</h3>";
                    echo "<h3>" . 'Quantity: ' . $itemquantity . "</h3>";
                    echo "<h3>" . 'Total Price £' . $totalitemprice . "</h3>";
                    echo "<h3>" . 'Order Status: ' . $orderStatus . "</h3>";
                    echo "</div>";
                    echo "</div>";


                    $totalbasketprice += $totalitemprice;
                }

            } catch (Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }
            ?>
            <script>
                function returnPopup() {
                    document.getElementById('returnOrderPopup').style.display = 'block';
                }

                function cancelReturnPopup() {
                    document.getElementById('returnOrderPopup').style.display = 'none';
                }
            </script>
</body>
