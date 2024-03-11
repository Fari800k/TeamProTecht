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

    
    $checkItemExist = "SELECT COUNT(*) FROM `basketitem` WHERE Basket_ID= '".$_SESSION['Basket_ID']."' AND Item_ID = $itemID";
    $itemExist = $pdo->prepare($checkItemExist);
    $itemExist->execute();
    $basketitemcount = $itemExist->fetchColumn();

    $addItemSQL = "";
    //if item exists in basket
    if($basketitemcount>0){
        //if quantity > 1 when adding (i.e. added from product_dt.php), add quantity on top of current item basket
        if(isset($_POST['quantity'])){
            $addquantity = $_POST['quantity'];
            $addItemSQL = "UPDATE `basketitem` SET `Quantity` = `Quantity`+$addquantity WHERE `Basket_ID` = '".$_SESSION['Basket_ID']."' AND `Item_ID` = $itemID";
            echo "item exists update with quantity";
        } else{
            //quantity not mentioned (i.e. added from browse.php), update add 1 to quantity in currently used basket
            $addItemSQL = "UPDATE `basketitem` SET `Quantity` = `Quantity`+1 WHERE `Basket_ID` = '".$_SESSION['Basket_ID']."' AND `Item_ID` = $itemID";
            echo "item exists update with 1";
        }
    }  else {
        //if quantity > 1 when adding (i.e. added from product_dt.php), add to current item basket with quantity
        if(isset($_POST['quantity'])){
            $addquantity = $_POST['quantity'];
            $addItemSQL = "INSERT INTO `basketitem` (Basket_ID, Item_ID, Quantity) VALUES (".$_SESSION['Basket_ID'].", $itemID, $addquantity);";
            echo "item doesn't exist add with quantity";
        } else{
            //quantity not mentioned (i.e. added from browse.php), add 1 to quantity in currently used basket
            $addItemSQL = "INSERT INTO `basketitem` (Basket_ID, Item_ID, Quantity) VALUES (".$_SESSION['Basket_ID'].", $itemID, 1);";
            echo "item doesn't exist add 1";
        }
    }

    $addBasketItem = $pdo->prepare($addItemSQL);
    $addBasketItem->execute();
                        
    unset($_POST['product_id'.$row['Item_ID']]);
    unset($itemID);

    header("Location: basket.php");
    exit();
} else{
    echo "<script>alert('Adding an item requires you to login')</script>";
    header("Location: login.php");
}
?>