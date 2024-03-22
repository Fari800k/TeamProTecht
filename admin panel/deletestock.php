<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: ../login_system/login.php");
    exit();
}
session_abort();
// Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if order ID and new status are set
    if(isset($_POST['stocktodelete']) && isset($_POST['verify_delete'])){
        // SQL injection prevention
        $verifyitem = $_POST['verify_delete'];
        $itemid = $_POST['stocktodelete'];
        
        if(preg_match('/[r|R]elete/', $verifyitem)){
            // Update order status in the database
            $query = "UPDATE `item` SET Stock=0 WHERE Item_ID=:itemid";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':itemid', $itemid);

            if ($stmt->execute()) {
                // Redirect back to the previous page
                header("Location: stockview.php?error=Successfully deleted");
                exit();
                //Error handling 
            } else {
                header("Location: stockview.php?error=" . urlencode("Error deleting item: " . $stmt->errorInfo()[2]));
                exit();
            }
        }else{
            if(preg_match('', $verifyitem)){
                header("Location: stockview.php?error=Verify stock delete by typing delete.");
                exit();
            } else{
                header("Location: stockview.php?error=Verification incorrect");
                exit();
            }
        } 
    } else {
        header("Location: stockview.php?error=No item stock to delete");
        exit();
    }
} else {
    header("Location: logout.php");
    exit();
}
?>