<?php
session_start();
include "connectdb.php";

if(isset($_POST['deleteItem']) && isset($_POST['BasketItem_ID'])) {
    $basketItemID = $_POST['BasketItem_ID'];
    

    $sql = "DELETE FROM `basketitem` WHERE BasketItem_ID = :BasketItem_ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':BasketItem_ID' => $basketItemID]);
    
    header("Location: basket.php");
    exit();
}
?>
