<?php
// Include the file that establishes the database connection
include 'connectdb.php';

// Check if $pdo is set and not null
if ($pdo) {
    // SQL query to retrieve 4 items with the lowest quantity (greater than or equal to 1)
    $query = "SELECT * FROM item WHERE Quantity >= 1 ORDER BY Quantity ASC LIMIT 4";
    $result = $pdo->query($query);

    // Check if there are results
    if ($result->rowCount() > 0) {
        // Container for displaying items
        echo '<div style="display: flex; flex-wrap: wrap;">';
        // Output each row
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // Display each item
            echo '<div style="border: 1px solid #000; padding: 10px; margin: 5px;">';
            echo "<img src='CSS/images/" . $row['Img'] . "'>";

            echo '</div><br>';   
            echo '<button onclick="viewMore(' . $row["Item_ID"] . ')">View More</button>';
        }
        // Close the container
        echo '</div>';
    } else {
        echo "Featured Products to be announced";
    }
} else {
    echo "Database connection failed";
}
?>
