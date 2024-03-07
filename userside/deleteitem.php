<?php
session_start();
include "connectdb.php";
include "navbar.php";

if(isset($_POST['deleteItem']) && isset($_POST['BasketItem_ID'])) {
    $basketItemID = $_POST['BasketItem_ID'];
    

    $sql = "DELETE FROM `basketitem` WHERE BasketItem_ID = :BasketItem_ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':BasketItem_ID' => $basketItemID]);
    
    if(!isset($_SESSION['prev_page'])){
        header("Location: basket.php");
        exit();
    } else{
        $prevpage = $_SESSION['prev_page'];
        header("Location: $prevpage");
        exit();
    }
    
}
?>
