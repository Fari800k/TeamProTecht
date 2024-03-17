<?php

include('connectdb.php');
session_start();
include "navbar.php";

echo $_POST['itemid'];
echo $_SESSION['User_ID'];

if(isset($_POST['itemid']) && isset($_SESSION['User_ID'])){
    $rating = $_POST['rating'];
    $revitemid = $_POST['itemid'];
    $revdesc = $_POST['reviewdesc'];

    $makereview = "INSERT INTO `reviews` (User_ID, Item_ID, Rating, Description)
                                        VALUES (:userid, :itemid, :rating, :description)";

    $review_stmt = $pdo->prepare($makereview);
    $review_stmt->bindParam(':userid', $_SESSION['User_ID'], PDO::PARAM_INT);
    $review_stmt->bindParam(':itemid', $revitemid, PDO::PARAM_INT);
    $review_stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
    $review_stmt->bindParam(':description', $revdesc, PDO::PARAM_STR);
    $review_stmt->execute();

    header("Location: accountpage.php?reviewsent=true");
    exit();
} else{
    echo "error";
}
?>