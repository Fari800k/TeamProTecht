<!DOCTYPE html>
<html>

<head>
    <title>Phone Selling Stock System</title>
    <link rel="stylesheet" href="style.css" />
</head>

    <body>
    <div class="navbar">
        <!-- Menu Bar -->
        <ul>
          <div class="logo-container1">
            <img src="CSS Images\white_logo.png" alt="Logo 1">
          </div>
            <li><a href="http://localhost/Year%202%20Team%20Project/confirmorders.html">Confirm Orders</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/pendingorders.html">Pending Orders</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/pendingorders.html">View Inventory</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/fulfilledorders.html">Fulfilled Orders</a></li>
            <li><a href="file:///C:/xampp/htdocs/Year%202%20Team%20Project/stocksystem.html">Stock Put Away</a></li>
<li><a href="http://localhost/Year%202%20Team%20Project/viewcontact.php">View contct forms</a></li>
            <li class="logout-link"><a href="http://localhost/Year%202%20Team%20Project/login.html" onclick="logout()">Logout</a></li>
        </ul>
    </div>





<br>

<table border="1">
    <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Order Address</th>
        <th>Items (ID, Name, Price, Quantity, Row, Shelf)</th>
        <th>Updated At</th>
        <th>Created At</th>
        <th>Order Status</th>
    </tr>
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
    $ordersQuery = "SELECT * FROM Orders WHERE Order_Status = 'Pending'";
    $ordersStatement = $pdo->query($ordersQuery);

    foreach ($ordersStatement as $order) {
        echo "<tr>";
        echo "<td>" . $order['Order_ID'] . "</td>";
        echo "<td>" . $order['User_ID'] . "</td>";
        echo "<td>" . $order['Address_Order'] . "</td>";

        // Inner loop to fetch items associated with each Basket_ID
        $itemsQuery = "SELECT Item.Item_ID, Item.ItemName, Item.Price, BasketItem.Quantity, Location.Row, Location.Shelf
                       FROM BasketItem 
                       JOIN Item ON BasketItem.Item_ID = Item.Item_ID
                       JOIN Location ON Item.Location_ID = Location.Location_ID
                       WHERE BasketItem.Basket_ID = " . $order['Basket_ID'];
        $itemsStatement = $pdo->query($itemsQuery);

        echo "<td>";
        foreach ($itemsStatement as $item) {
            echo "ID: " . $item['Item_ID'] . ", ";
            echo "Name: " . $item['ItemName'] . ", ";
            echo "Price: " . $item['Price'] . ", ";
            echo "Quantity: " . $item['Quantity'] . ", ";
            echo "Row: " . $item['Row'] . ", ";
            echo "Shelf: " . $item['Shelf'] . "<br>";
        }
        echo "</td>";

        echo "<td>" . $order['Updated_at'] . "</td>";
        echo "<td>" . $order['Created_at'] . "</td>";
        echo "<td>" . $order['Order_Status'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
