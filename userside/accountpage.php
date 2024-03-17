<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/account.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="JavaScript/script.js"></script>

</head>
<body>
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
if (isset($_SESSION['update_error'])) {
    echo '<div class="error-message">' . $_SESSION['update_error'] . '</div>';
    unset($_SESSION['update_error']); // Unset the session variable to clear the message
}
?>


<div id="updateDetailsPopup" class="popup-menu">
                    <h3>Update Details</h3>
                    <form id="updateForm" method="post" action="update_details.php">
                    <?php
                        // Fetch user details from the database
                        $user_sql = "SELECT * FROM users WHERE User_ID = :userID";
                        $user_stmt = $pdo->prepare($user_sql);
                        $user_stmt->bindParam(':userID', $_SESSION['User_ID'], PDO::PARAM_INT);
                        $user_stmt->execute();
                        $user = $user_stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                        Username: <input type="text" name="username" value="<?php echo $user['Username'] ?? ''; ?>"><br><br>
                        Password: <input type="password" name="password"><br><br>
                        Forename: <input type="text" name="forename" value="<?php echo $user['Fore_name'] ?? ''; ?>"><br><br>
                        Second Name: <input type="text" name="second_name" value="<?php echo $user['Second_Name'] ?? ''; ?>"><br><br>
                        Last Name: <input type="text" name="last_name" value="<?php echo $user['Last_Name'] ?? ''; ?>"><br><br>
                        Address: <textarea name="address"><?php echo $user['Address_User'] ?? ''; ?></textarea><br><br>
                        <input type="submit" value="Update">
                        <button type="button" onclick="cancelUpdatePopup()">Cancel</button>
                    </form>
                </div>
    <div class="accountbody">
            <div class="card">
                <img class="user_image" src="CSS/images/userlogo.png"/>
                <h3>
                    <?php echo $_SESSION['username']; ?>
                </h3>
                <a href="#" onclick="updateDetailsPopup()">Update Details</a><br>
                <a href="#" onclick="returnPopup()">Return an Order</a><br>
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
                <!-- Update Details Popup -->
               
            </div>
            <?php
            try {
                $order_sql = "SELECT orderbaskets.Order_ID, orderbaskets.Basket_ID,
                                brand.BrandName, item.Item_ID, item.ItemName, item.Img, basketitem.Quantity,
                                orderbaskets.Order_Status, (basketitem.Quantity * item.Price) AS Total_Price
                            FROM basketitem
                            JOIN ((SELECT orders.Order_ID, orders.Order_Status, basket.Basket_ID, basket.User_ID
                                FROM orders JOIN basket ON basket.Basket_ID = orders.Basket_ID
                                WHERE basket.User_ID = :user_id) AS orderbaskets)
                            ON orderbaskets.Basket_ID = basketitem.Basket_ID
                            JOIN item ON item.Item_ID = basketitem.Item_ID
                            JOIN brand ON brand.Item_ID = basketitem.Item_ID";
                
                $order_stmt = $pdo->prepare($order_sql);
                $order_stmt->bindParam(':user_id', $_SESSION['User_ID'], PDO::PARAM_INT);
                $order_stmt->execute();

                $currentorderbasket = null;
                $totalbasketprice = 0;

                echo '<div class="prev">';
                echo "<h3>Previous Orders</h3>";
                
                foreach ($order_stmt as $order) {
                    $orderid = $order['Order_ID'];
                    $basketid = $order['Basket_ID'];
                    $itemid = $order['Item_ID'];
                    $brandname = $order['BrandName'];
                    $itemname = $order['ItemName'];
                    $itemimg = $order['Img'];
                    $itemquantity = $order['Quantity'];
                    $totalitemprice = $order['Total_Price'];
                    $orderStatus = $order['Order_Status'];

                    echo "<div class='order'>";
                    echo '<div class="phone">';
                    echo '<h4>' . 'Order #:' . $orderid . '</h4>';
                    echo '<img src="CSS/images/' . $itemimg . '" alt="asus" class="phone">';
                    echo '<div class="phone_name">';
                    echo "<h4>" . $brandname . " " . $itemname . "</h4>";
                    echo "<h4>" . 'Quantity: ' . $itemquantity . "</h4>";
                    echo "<h4>" . 'Total Price £' . $totalitemprice . "</h4>";
                    echo "<h4>" . 'Order Status: ' . $orderStatus . "</h4>";
                    echo "</div>";
                    echo "</div>";
                    ?>
                    <!-- make review form -->
                    <div class='review'>
                        <form method ='post' id="<?php echo $orderid.$itemid; ?>" class='reviewform' action='reviewitem.php'>
                            <h4>Rating</h4>
                            <span onclick="star(1, <?php echo $orderid.$itemid; ?>)" class="fa fa-star" id='one-<?php echo $orderid.$itemid; ?>' value="1"></span>
                            <span onclick="star(2, <?php echo $orderid.$itemid; ?>)" class="fa fa-star" id='two-<?php echo $orderid.$itemid; ?>' value="2"></span>
                            <span onclick="star(3, <?php echo $orderid.$itemid; ?>)" class="fa fa-star" id='three-<?php echo $orderid.$itemid; ?>' value="3"></span>
                            <span onclick="star(4, <?php echo $orderid.$itemid; ?>)" class="fa fa-star" id='four-<?php echo $orderid.$itemid; ?>' value="4"></span>
                            <span onclick="star(5, <?php echo $orderid.$itemid; ?>)" class="fa fa-star" id='five-<?php echo $orderid.$itemid; ?>' value="5"></span><br>
                            <input type='hidden' id='stars-<?php echo $orderid.$itemid; ?>' name="rating" value="0">
                            <h4>Share your thoughts below</h4>
                            <input type='text' name='reviewdesc'>
                            <input type='hidden' name='itemid' value='<?php echo $itemid ?>'>
                            <input type='submit' name='reviewsubmit'></button>
                        </form>
                    </div>
                    <?php
                    echo "</div>";

                    $totalbasketprice += $totalitemprice;
                }
                echo "</div>";

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

                function updateDetailsPopup() {
                    document.getElementById('updateDetailsPopup').style.display = 'block';
                }

                function cancelUpdatePopup() {
                    document.getElementById('updateDetailsPopup').style.display = 'none';
                }

                var totalstars = document.getElementsByClassName("fa fa-star");
                var totalstarsarray = Array.from(totalstars);
                //make array groups for each form
                var groupedstars = groupIntoSubgroups(totalstarsarray, 5);
                
                for (var j = 0; j < groupedstars.length; j++) {
                    for (var c = 0; c < 5; c++) {
                        groupedstars[j][c] = totalstars[j * 5 + c].id;
                    }
                }

                //n = star value, o = form id (star id = "one/two/three/four/five-o")
                function star(n, o){
                    var output = document.getElementById("stars-"+o);
                    remove();
                    for(var j=0; j < groupedstars.length; j++){
                        for(var k=0; k<5; k++){
                            if(groupedstars[j][k].includes(o)){
                                for (let i = 0; i < n; i++) {
                                    if (n == 1) cls = "one";
                                    else if (n == 2) cls = "two";
                                    else if (n == 3) cls = "three";
                                    else if (n == 4) cls = "four";
                                    else if (n == 5) cls = "five";
                                    document.getElementById(groupedstars[j][i]).className = "fa fa-star " + cls;
                                }
                            }
                            output.value = n;
                        }
                    }
                }
                    
                function remove() {
                    for(var j=0; j < groupedstars.length; j++){
                        var i = 0;
                        while (i < 5) {
                            document.getElementById(groupedstars[j][i]).className= "fa fa-star";
                            i++;
                        }
                    }
                }

                function groupIntoSubgroups(array, groupSize) {
                    var result = [];
                    for (var i = 0; i < array.length; i += groupSize) {
                        result.push(array.slice(i, i + groupSize));
                    }
                    return result;
                }
            </script>
</body>
