<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feautured Item</title>

  <link rel="stylesheet" href="CSS/featureditem.css" />
        <!--External Stylesheet for featured items -->

</head>
<body>
  
</body>
</html>
<?php
// Include the file that establishes the database connection
include 'connectdb.php';

try {
    // Create a PDO instance
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to retrieve 4 items with the lowest quantity (greater than or equal to 1)
    $query = "SELECT * FROM item WHERE Quantity >= 1 ORDER BY Quantity ASC LIMIT 4";
    
    // Prepare the statement
    $statement = $conn->prepare($query);
    
    // Execute the statement
    $statement->execute();
    
    // Fetch all rows 
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are results
     if (count($rows) > 0) {
        // Container 
        echo '<div class="card-container">';

        // Output each row 
        foreach ($rows as $row) {
            // Display each item as a card
            echo '<div class="card">
                    <img src="#" alt="' . $row["ItemName"] . '">
                    <h4>' . $row["ItemName"] . '</h4>
                    <p>Price: $' . $row["Price"] . '</p>
                    <button onclick="addToBasket(' . $row["Item_ID"] . ')">Add to Basket</button>
                    <button onclick="viewMore(' . $row["Item_ID"] . ')">View More</button>
                  </div>';
        }
        echo '</div>';
         // Close the container
    } else {
        echo "Featured Products to be announced";
    }
    // Incase there is no stock 
} catch(PDOExeception $e) {
    echo "Database connection failed error: " . $e->getMessage();
    // Exception catch if database cannot be reached 
}
?>
