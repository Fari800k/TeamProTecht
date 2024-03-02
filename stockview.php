<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!---box icons css-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="employee.css">
    <title>Stock View</title>
    <style>
    .product-image {
        width: 40%;
        height: 30%;
    }

    .product-image img{
        max-width: 100%;
    }
    </style>
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
                <a href="#">
                    <i class='bx bx-mail-send' ></i>
                    <span class="text">Confirm Orders</span>
                </a>
            </li>            
            
            <li>
                <a href="pending_orders.php">
                    <i class='bx bxs-hourglass' ></i>
                    <span class="text">Pending Orders</span>
                </a>
            </li>            
            
            <li>
                <a href="viewcontact.php">
                    <i class='bx bxs-hourglass' ></i>
                    <span class="text">contact forms</span>
                </a>
            </li>            
            
            <li>
                <a href="#">
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
    <section id="table">
        <a href="additem.PHP">Add Item</a><br><br>
        <a href="#">Change featured Items</a><br><br>
    <table>
        <tr>
            <th>Item ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Location ID</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        
        <?php
           $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
           $statement = $pdo->query("SELECT Item_ID, ItemName, ItemDesc, Price, Img, Location_ID, Created_at, Updated_at  FROM item");
           
           foreach ($statement as $rows) {
                echo "<td>" . $rows['Item_ID'] . "</td>";
                echo "<td>" . $rows['ItemName'] . "</td>";
                echo "<td>" . $rows['ItemDesc'] . "</td>";
                echo "<td>" . "£". $rows['Price'] . "</td>";
                echo "<td>" . "<div class='product-image'><img src='./img/'></div>". "</td>";
                echo "<td>" . $rows['Location_ID'] . "</td>";
                echo "<td>" . $rows['Created_at'] . "</td>";
                echo "<td>" . $rows['Updated_at'] . "</td></tr>";
            }
            ?>
</body>
</html>