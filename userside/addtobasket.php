<?php
include('connectdb.php');
session_start();
include "navbar.php";
if(isset($_POST['add_to_basket']) && isset($_SESSION['User_ID']) && isset($_SESSION['username'])){
    //Relocate $_POST['product_id'$row['Item_ID']]
    foreach ($_POST as $key => $value) {
        if (preg_match('/^product_id\d+$/', $key)) {
            // Key matches the pattern, which starts with "product_id" followed by digits
            $product_id = $value;
            // Now you have the value of the product_id
            // You can use $product_id for further processing
            break; // Exit the loop once the value is found
        }
    }
    
    $itemID = $_POST["product_id$product_id"];
    $userID = $_SESSION['User_ID'];
    //if no basket exists in session, make a new one
    if(!isset($_SESSION['Basket_ID'])){
        //Add new basket
        $newBasketSQL = "INSERT INTO `basket` (User_ID) VALUES($userID)";
        $prepBasket = $pdo->prepare($newBasketSQL);
        $prepBasket->execute();

        //Get the most recent basket
        $getNewBasket = "SELECT * FROM `basket` WHERE Basket_ID = (SELECT MAX(Basket_ID) FROM `basket` WHERE User_ID = $userID)";
        $getUserBasket = $pdo->prepare($getNewBasket);
        $getUserBasket->execute();
        foreach($getUserBasket as $userbasketID){
            //Set the most recent basketID as the basketid in the current session
            //Will need to unset once basket turns into order
            $_SESSION['Basket_ID'] = $userbasketID['Basket_ID'];
            echo "<script>alert('Basket is ".$_SESSION['Basket_ID']."');</script>";
        }
    }

    //Add item to itembasket
    $addItemSQL = "INSERT INTO `basketitem` (Basket_ID, Item_ID, Quantity) VALUES (".$_SESSION['Basket_ID'].", $itemID, 1);";

    $addBasketItem = $pdo->prepare($addItemSQL);
    $addBasketItem->execute();
                        
    unset($_POST['product_id'.$row['Item_ID']]);
    unset($itemID);

    header("Location: basket.php");
    exit();
} else{
    echo "values not found";
}
?>