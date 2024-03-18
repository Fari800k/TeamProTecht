<?php
// Connect to database
$pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if order ID and new status are set
    if(isset($_POST['order_id']) && isset($_POST['new_status'])) {
        // SQL injection prevention
        $order_id = $_POST['order_id'];
        $new_status = $_POST['new_status'];

        // Update order status in the database
        $query = "UPDATE Orders SET Order_Status = :new_status WHERE Order_ID = :order_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':new_status', $new_status);
        $stmt->bindParam(':order_id', $order_id);

        if ($stmt->execute()) {
            // Redirect back to the previous page
            header("Location: " . $_SERVER["HTTP_REFERER"]);
            exit();
            //Error handling 
        } else {
            echo "Error updating order status: " . $stmt->errorInfo()[2];
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Access denied.";
}
?>
