<?php
include('../userside/connectdb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST["productName"];
    $locationID = $_POST["locationID"]; // Assuming this is passed in the POST request
    $quantityPutAway = $_POST["quantityPutAway"];

    // Check if the item already exists
    $checkSql = "SELECT Quantity FROM Item WHERE ItemName = ? AND Location_ID = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("si", $itemName, $locationID);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $checkStmt->close();

    if ($result->num_rows > 0) {
        // Item exists, update it
        $updateSql = "UPDATE Item SET Quantity = Quantity + ? WHERE ItemName = ? AND Location_ID = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("isi", $quantityPutAway, $itemName, $locationID);
        $updateStmt->execute();

        if ($updateStmt->affected_rows > 0) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: ";
        }
        $updateStmt->close();
    } else {
        // Item does not exist, insert it
        $insertSql = "INSERT INTO Item (ItemName, Quantity, Location_ID, Created_at) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("sii", $itemName, $quantityPutAway, $locationID);
        $insertStmt->execute();

        if ($insertStmt->affected_rows > 0) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertSql . "<br>" ;
        }
        $insertStmt->close();
    }
}

?>
