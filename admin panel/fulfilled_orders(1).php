
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---box icons css-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="employee.css">
    <title>Fulfilled Orders</title>
</head>
<body>
    <section id="sidebar">
          <a href="" class="brand">
            <span class="icon">
                <img src="logo.png" alt="teamprotect logo">
            </span>
          </a>
          <ul class="side-menu top">
            <li>
                <a href="stockview.php">
                    <i class='bx bxl-dropbox' ></i>
                    <span class="text">Stock View</span>
                </a>
            </li>
            <li>
                <a href="confirm_orders.php">
                    <i class='bx bx-mail-send' ></i>
                    <span class="text">Confirm Orders</span>
                </a>
            </li >            
            <li>
                <a href="pending_orders.PHP">
                    <i class='bx bxs-hourglass' ></i>
                    <span class="text">Pending Orders</span>
                </a>
            </li>           
             <li>
                <a href="fulfilled_orders.php">
                    <i class='bx bxs-package' ></i>
                    <span class="text">Fulfilled Orders</span>
                </a>
            </li>
        </li>            
        <li>
            <a href="#">
                <i class='bx bx-log-out'></i>
                <span class="text">Logout</span>
            </a>
        </li>
          </ul>
    </section>

<br>

<section id="table">

<form method="post" >
<label for="orderSelect">Select Order:</label>
<select id="orderSelect" name="orderSelect">
    <option value=""></option>
    <option value="ASC">Ascending</option>
    <option value="DESC">Descending</option>
</select>

    <input type="submit" value="Submit">
</form>

<table>
        <tr>
            <th>Shipping ID</th>
            <th>Address</th>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Order Status</th>
            <th>Updated At</th>
            <th>Row</th>
            <th>Shelf</th>
            <th>Quantity Ordered?</th>
        </tr>
        </body>
</html>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
$order = "ASC"; // Default order

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["orderSelect"] == "DESC" || $_POST["orderSelect"] == "ASC") {
        $order = $_POST["orderSelect"]; // Use the selected order if it's valid
    }
}

$status = array();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["orderSelect"]) && !empty($_POST["orderSelect"])) {
    $status[] = $_POST["orderSelect"];
    // Create a string for the WHERE clause with multiple statuses
    $status_string = "'" . implode("','", $status) . "'";
    $statement = $pdo->prepare("SELECT
        Orders.Order_ID,
        Orders.Address_Order AS Order_Address,
        Item.Item_ID,
        Item.ItemName,
        Orders.Order_Status,
        Orders.Updated_at AS Order_Updated_at,
        Location.Row,
        Location.Shelf,
        BasketItem.Quantity AS Basket_Quantity
    FROM Orders
    JOIN Basket ON Orders.Basket_ID = Basket.Basket_ID
    JOIN BasketItem ON Orders.Basket_ID = BasketItem.Basket_ID
    JOIN Item ON BasketItem.Item_ID = Item.Item_ID
    JOIN Location ON Item.Location_ID = Location.Location_ID
    WHERE Orders.Order_Status IN ($status_string)
    ORDER BY Order_Updated_at $order");
} else {
    // Default value when loaded will be ascending and show all statuses
    $status_string = "'Delivered','Returning','Returned','Shipped'";
    $statement = $pdo->prepare("SELECT
        Orders.Order_ID,
        Orders.Address_Order AS Order_Address,
        Item.Item_ID,
        Item.ItemName,
        Orders.Order_Status,
        Orders.Updated_at AS Order_Updated_at,
        Location.Row,
        Location.Shelf,
        BasketItem.Quantity AS Basket_Quantity
    FROM Orders
    JOIN Basket ON Orders.Basket_ID = Basket.Basket_ID
    JOIN BasketItem ON Orders.Basket_ID = BasketItem.Basket_ID
    JOIN Item ON BasketItem.Item_ID = Item.Item_ID
    JOIN Location ON Item.Location_ID = Location.Location_ID
    WHERE Orders.Order_Status IN ($status_string)
    ORDER BY Order_Updated_at $order");
}

$statement->execute();

foreach ($statement as $rows) {
    print "<td>" . $rows['Order_ID'] . "</td>";
    print "<td>" . $rows['Order_Address'] . "</td>";
    print "<td>" . $rows['Item_ID'] . "</td>";
    print "<td>" . $rows['ItemName'] . "</td>";
    print "<td>" . $rows['Order_Status'] . "</td>";
    print "<td>" . $rows['Order_Updated_at'] . "</td>";
    print "<td>" . $rows['Basket_Quantity'] . "</td>";
    print "<td>" . $rows['Row'] . "</td>";
    print "<td>" . $rows['Shelf'] . "</td><tr>";
}

// Close the database connection
$pdo = null;
?>

</table>
</section>
</body>
</html>