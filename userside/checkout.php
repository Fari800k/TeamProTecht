<?php
session_start();
include "connectdb.php";
include "navbar.php";

if (!isset($_SESSION['User_ID'])) {
    header("Location: login.php");
    exit();
}

//retrieve basket
$userID = $_SESSION['User_ID'];
$sql1 = "SELECT * FROM `basket` WHERE User_ID = :userID ORDER BY `Updated_at` DESC LIMIT 1";
$stmt = $pdo->prepare($sql1);
$stmt->execute([':userID' => $userID]);
$usersBasket = $stmt->fetch();

if ($usersBasket) {
    $basketID = $usersBasket['Basket_ID'];
} else {
    //no basket
    header("Location: basket.php");
    exit();
}

//user details
$sql2 = "SELECT * FROM `users` WHERE User_ID = :userID";
$stmt = $pdo->prepare($sql2);
$stmt->execute([':userID' => $userID]);
$user = $stmt->fetch();

//place order submission
if (isset($_POST['placeOrder'])) {
    $address = $_POST['address'];

    //create order
    $orderStatus = "Pending";
    $sql3 = "INSERT INTO `orders` (`Basket_ID`, `Address_Order`, `Order_Status`) VALUES (:basketID, :address, :orderStatus)";
    $stmt = $pdo->prepare($sql3);
    $stmt->execute([
        ':basketID' => $basketID,
        ':address' => $address,
        ':orderStatus' => $orderStatus
    ]);

    //update item quantities
    $sql4 = "SELECT * FROM `basketitem` WHERE Basket_ID = :basketID";
    $stmt = $pdo->prepare($sql4);
    $stmt->execute([':basketID' => $basketID]);
    $basketItems = $stmt->fetchAll();

    foreach ($basketItems as $basketItem) {
        $itemID = $basketItem['Item_ID'];
        $orderedQuantity = $basketItem['Quantity'];

        $sql5 = "UPDATE `item` SET Stock = Stock - :orderedQuantity WHERE Item_ID = :itemID";
        $stmt = $pdo->prepare($sql5);
        $stmt->execute([
            ':orderedQuantity' => $orderedQuantity,
            ':itemID' => $itemID
        ]);
    }

    $sql = "INSERT INTO `basket` (User_ID) VALUES (:userID)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':userID' => $userID]);
    //generate new basket in session
    $newBasketID = $pdo->lastInsertId();
    $_SESSION['Basket_ID'] = $newBasketID;
    header("Location: homepage.php?ordersuccess=true");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="CSS/checkout.css">
    <script>
        function validateCardNumber(input) {
            input.value = input.value.replace(/\D/g, '');
            let formattedValue = input.value.replace(/(\d{4})(?=\d)/g, '$1 ');
            input.value = formattedValue;
        }

        function validateExpiryDate(input) {
            input.value = input.value.replace(/\D/g, '');
            if (input.value.length > 2) {
                let formattedValue = input.value.substring(0, 2) + '/' + input.value.substring(2);
                input.value = formattedValue;
            }
        }

        function validateCVV(input) {
            input.value = input.value.replace(/\D/g, '');
        }

        function validateForm() {
            let cardNumber = document.getElementById("cardNumber").value;
            let expiryDate = document.getElementById("expiryDate").value;
            let cvv = document.getElementById("cvv").value;
            let isValid = true;

            if (cardNumber.length !== 19) {
                alert("Invalid card number format. Please enter a valid 16-digit card number.");
                isValid = false;
            }

            if (expiryDate.length !== 5 || isNaN(expiryDate.replace('/', ''))) {
                alert("Invalid expiry date format. Please enter the expiry date in MM/YY format.");
                isValid = false;
            }

            if (cvv.length !== 3 || isNaN(cvv)) {
                alert("Invalid CVV format. Please enter a valid 3-digit CVV.");
                isValid = false;
            }

            return isValid;
        }
    </script>
</head>
<body>
    <main>
        <h2>Checkout</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validateForm()">
            
        <div class="address-section">
            <h3>Delivery Address</h3>
            <div>
                <input type="radio" id="savedAddress" name="address" value="<?php echo $user['Address_User']; ?>" checked>
                <label for="savedAddress">Use saved address</label>
                <p><?php echo $user['Address_User']; ?></p>
            </div>
            <div>
                <input type="radio" id="newAddress" name="address" value="">
                <label for="newAddress">Enter a new address</label>
                <input type="text" name="newAddress" placeholder="New Address" class="address-field">
            </div>

            <h3>Billing Address</h3>
            <div>
                <input type="radio" id="sameAddress" name="billingAddress" value="<?php echo $user['Address_User']; ?>" checked>
                <label for="sameAddress">Same as delivery address</label>
            </div>
            <div>
                <input type="radio" id="differentAddress" name="billingAddress" value="">
                <label for="differentAddress">Enter a different address</label>
                <input type="text" name="billingAddress" placeholder="Billing Address" class="address-field">
            </div>
    </div>

            <h3 class="card-details" >Payment</h3>
            <div>
                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="Card Number" oninput="validateCardNumber(this)" required>
            </div>
            <div>
                <label for="expiryDate">Expiry Date</label>
                <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" oninput="validateExpiryDate(this)" required>
            </div>
            <div>
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="CVV" oninput="validateCVV(this)" required>
            </div>

            <button type="submit" name="placeOrder">Place Order</button>
        </form>
    </main>
    <?php include "footer.php"; ?>
</body>
</html>
