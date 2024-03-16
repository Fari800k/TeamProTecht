<link rel="stylesheet" href="CSS/featureditem.css" />

<?php
// Include the file that establishes the database connection
include 'connectdb.php';

// Check if $pdo is set and not null
 if ($pdo) {
        // SQL query to retrieve 4 items with the lowest quantity (greater than or equal to 1)
        $query = "SELECT * FROM item WHERE Stock >= 1 ORDER BY Stock ASC LIMIT 4";
        $result = $pdo->query($query);

        // Check if there are results
        if ($result->rowCount() > 0) {
            // Container 
            echo '<div class="card-container">';
            // Output each row
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Display each item
                echo '<div class="card">
                    <img src="CSS/images/' . $row["Img"] . '" alt="' . $row["ItemName"] . '" class="featured-image">
                    <h4>' . $row["ItemName"] . '</h4>
                    <p>Price: $' . $row["Price"] . '</p>
                    <button class="view-more-btn" onclick="viewMore(' . $row["Item_ID"] . ')">View More</button>
                  </div>';
            }
            echo '</div>';
        } else {
            echo "Featured Products to be announced";
        }
    } else {
        echo "Database connection failed";
    }
    ?>
