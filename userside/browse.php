<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Teamprotecht</title>
    <link rel="stylesheet" href="CSS/browse.css">
    <script defer src="JavaScript/script.js"></script>
</head>
<?php
include('connectdb.php');
session_start();
include "navbar.php";
?>
<body>
    <br><br>
    <h1>Search Products</h1>
    <form class="searchbox" method="post" action="browse.php">
        <input type="text" placeholder="Search" name="searchitem" value="<?php echo isset($_POST['searchitem']) ? $_POST['searchitem'] : ''; ?>">
        <button type="submit"><i class="fa fa-search"></i>GO</button>
    </form>
    <br>
    <div id="searchresult">
        <div id="filter">
            <br>
            <h2>Filters</h2>
            <form method="post" action="browse.php">
                <h3>Prices</h3>
<div id="myPrices">
    <input type="number" placeholder="Minimum" name="minprice" min="0" max="9999" value="<?php echo isset($_POST['minprice']) ? $_POST['minprice'] : '1'; ?>">
    <input type="number" placeholder="Maximum" name="maxprice" min="1" max="10000" value="<?php echo isset($_POST['maxprice']) ? $_POST['maxprice'] : '10000'; ?>">
</div>
                <br>

                <?php
                // Fetch brands from the database
                $brandQuery = "SELECT DISTINCT BrandName FROM Brand";
                $brandStatement = $pdo->query($brandQuery);
                $brands = $brandStatement->fetchAll(PDO::FETCH_ASSOC);

                // Populate brands dynamically
                echo "<h3>Brands</h3>";
                echo "<select name='selected_brand'>";
                echo "<option value=''>Select Brand</option>";
                foreach ($brands as $brand) {
                    $selected = (isset($_POST['selected_brand']) && $_POST['selected_brand'] == $brand['BrandName']) ? ' selected' : '';
                    echo "<option value='" . $brand['BrandName'] . "'$selected>" . $brand['BrandName'] . "</option>";
                }
                echo "</select>";

                // Fetch operating systems from the database
                $osQuery = "SELECT DISTINCT OperatingSystem FROM Item";
                $osStatement = $pdo->query($osQuery);
                $operatingSystems = $osStatement->fetchAll(PDO::FETCH_ASSOC);

                // Populate operating systems dynamically
                echo "<h3>Operating System</h3>";
                echo "<select name='operating_system'>";
                echo "<option value=''>Select OS</option>";
                foreach ($operatingSystems as $os) {
                    $selected = (isset($_POST['operating_system']) && $_POST['operating_system'] == $os['OperatingSystem']) ? ' selected' : '';
                    echo "<option value='" . $os['OperatingSystem'] . "'$selected>" . $os['OperatingSystem'] . "</option>";
                }
                echo "</select>";
?>
<h3>Battery Size</h3>
<select name="battery_size">
    <option value="">Select Battery Size</option>
    <option value="0-12 hours"<?php if(isset($_POST['battery_size']) && $_POST['battery_size'] === '0-12 hours') echo ' selected'; ?>>Up to 12 hours</option>
    <option value="13-24 hours"<?php if(isset($_POST['battery_size']) && $_POST['battery_size'] === '13-24 hours') echo ' selected'; ?>>13 - 24 hours</option>
    <option value="25-36 hours"<?php if(isset($_POST['battery_size']) && $_POST['battery_size'] === '25-36 hours') echo ' selected'; ?>>25 - 36 hours</option>
    <option value="37-48 hours"<?php if(isset($_POST['battery_size']) && $_POST['battery_size'] === '37-48 hours') echo ' selected'; ?>>37 - 48 hours</option>
    <option value="49+ hours"<?php if(isset($_POST['battery_size']) && $_POST['battery_size'] === '49+ hours') echo ' selected'; ?>>49+ hours</option>
</select>
<?php
                // Fetch biometrics from the database
                $biometricsQuery = "SELECT DISTINCT BiometricAuthentication FROM Item";
                $biometricsStatement = $pdo->query($biometricsQuery);
                $biometrics = $biometricsStatement->fetchAll(PDO::FETCH_ASSOC);

                // Populate biometrics dynamically
                echo "<h3>Biometrics</h3>";
                echo "<select name='biometrics'>";
                echo "<option value=''>Select Biometrics</option>";
                foreach ($biometrics as $bio) {
                    $selected = (isset($_POST['biometrics']) && $_POST['biometrics'] == $bio['BiometricAuthentication']) ? ' selected' : '';
                    echo "<option value='" . $bio['BiometricAuthentication'] . "'$selected>" . $bio['BiometricAuthentication'] . "</option>";
                }
                echo "</select>";

                // Fetch colors from the database
                $colorQuery = "SELECT DISTINCT colour FROM Item";
                $colorStatement = $pdo->query($colorQuery);
                $colors = $colorStatement->fetchAll(PDO::FETCH_ASSOC);

                // Populate colors dynamically
                echo "<h3>Color</h3>";
                echo "<select name='color'>";
                echo "<option value=''>Select Color</option>";
                foreach ($colors as $color) {
                    $selected = (isset($_POST['color']) && $_POST['color'] == $color['colour']) ? ' selected' : '';
                    echo "<option value='" . $color['colour'] . "'$selected>" . $color['colour'] . "</option>";
                }
                echo "</select>";

                // Fetch storage sizes from the database
                $storageQuery = "SELECT DISTINCT Storage FROM Item";
                $storageStatement = $pdo->query($storageQuery);
                $storageSizes = $storageStatement->fetchAll(PDO::FETCH_ASSOC);

                // Populate storage sizes dynamically
                echo "<h3>Storage Size</h3>";
                echo "<select name='storage_size'>";
                echo "<option value=''>Select Storage Size</option>";
                foreach ($storageSizes as $storage) {
                    $selected = (isset($_POST['storage_size']) && $_POST['storage_size'] == $storage['Storage']) ? ' selected' : '';
                    echo "<option value='" . $storage['Storage'] . "'$selected>" . $storage['Storage'] . " GB</option>";
                }
                echo "</select>";
?>
<h3>Display Size Range</h3>
<select name="display_size_range">
    <option value="">Select Display Size Range</option>
    <option value="0_5"<?php if(isset($_POST['display_size_range']) && $_POST['display_size_range'] === '0_5') echo ' selected'; ?>>Less than 5 inches</option>
    <option value="5_6"<?php if(isset($_POST['display_size_range']) && $_POST['display_size_range'] === '5_6') echo ' selected'; ?>>5 to 6 inches</option>
    <option value="6_7"<?php if(isset($_POST['display_size_range']) && $_POST['display_size_range'] === '6_7') echo ' selected'; ?>>6 to 7 inches</option>
    <option value="7_8"<?php if(isset($_POST['display_size_range']) && $_POST['display_size_range'] === '7_8') echo ' selected'; ?>>7 to 8 inches</option>
    <option value="8_99"<?php if(isset($_POST['display_size_range']) && $_POST['display_size_range'] === '8_99') echo ' selected'; ?>>8+ inches</option>
    <!-- Add more options for other ranges as needed -->
</select>
                

                <!-- Sort option -->
                <h3>Sort</h3>
                <select name="sort_order">
                    <option value="ASC"<?php if(isset($_POST['sort_order']) && $_POST['sort_order'] === 'ASC') echo ' selected'; ?>>Price Low to High</option>
                    <option value="DESC"<?php if(isset($_POST['sort_order']) && $_POST['sort_order'] === 'DESC') echo ' selected'; ?>>Price High to Low</option>
                </select>
                <br><br>
                <button type="submit">Update</button><br><br>
                <button type="button" id="resetButton" onclick="resetFilters()">Reset</button>
            </form>
        </div>
        <br>
        <div id="productlist">
            <?php

            if(isset($_GET['reset']) && $_GET['reset'] === 'true') {
                unset($_SESSION['selected_brand']);
                unset($_SESSION['selected_warranty']);
                unset($_SESSION['minprice']);
                unset($_SESSION['maxprice']);
                unset($_SESSION['operating_system']);
                unset($_SESSION['battery_size']);
                unset($_SESSION['biometrics']);
                unset($_SESSION['color']);
                unset($_SESSION['storage_size']);
                unset($_SESSION['display_size_range']);
                header("Refresh:0");
                exit();
            }

            // Check if a search query has been submitted
            if(isset($_POST['searchitem']) && !empty($_POST['searchitem'])) {
                $_SESSION['searched_word'] = $_POST['searchitem'];
            } elseif(isset($_SESSION['searched_word'])) {
                // If the search word is already stored in session, use it
                $_POST['searchitem'] = $_SESSION['searched_word'];
            }

            // Construct the base query
            $query = "SELECT * FROM Item
                    LEFT JOIN Brand ON Item.Item_ID = Brand.Item_ID";

            // Initialize an array to hold conditions
            $conditions = [];
            // Initialize parameters array
            $parameters = [];

            // Check if a search query exists
            if(isset($_POST['searchitem']) && !empty($_POST['searchitem'])) {
                $search = $_POST['searchitem'];
                // Add condition to the array
                $conditions[] = "(Item.ItemName LIKE '%$search%' OR Brand.BrandName LIKE '%$search%')";
            }



if(isset($_POST['minprice']) && isset($_POST['maxprice'])) {
    $minprice = $_POST['minprice'];
    $maxprice = $_POST['maxprice'];

    // Swap if minimum price is greater than maximum price
if ($minprice > $maxprice) {
    $temp = $minprice;
    $minprice = $maxprice;
    $maxprice = $temp;
    
    // Update the values in $_POST to reflect the swapped values
    $_POST['minprice'] = $minprice;
    $_POST['maxprice'] = $maxprice;
    

    
    }
    $conditions[] = "Item.Price BETWEEN ? AND ?";
    // Add minimum and maximum prices to the parameters array
    $parameters[] = $minprice;
    $parameters[] = $maxprice;
}

            // Check if brand has been selected
            if(isset($_POST['selected_brand']) && !empty($_POST['selected_brand'])) {
                $brand = $_POST['selected_brand'];
                // Add condition to the array
                $conditions[] = "Brand.BrandName = ?";
                // Add brand to the parameters array
                $parameters[] = $brand;
                // Store selected brand in session
                $_SESSION['selected_brand'] = $brand;
            } elseif(isset($_SESSION['selected_brand'])) {
                // If the brand is already stored in session, use it
                $_POST['selected_brand'] = $_SESSION['selected_brand'];
            }

// Check if operating system filter has been applied
if(isset($_POST['operating_system']) && !empty($_POST['operating_system'])) {
    $os = $_POST['operating_system'];
    // Add condition to the array
    $conditions[] = "Item.OperatingSystem = ?";
    // Add operating system to the parameters array
    $parameters[] = $os;
    // Store operating system in session
    $_SESSION['operating_system'] = $os;
} elseif(isset($_SESSION['operating_system'])) {
    // If operating system is already stored in session, use it
    $_POST['operating_system'] = $_SESSION['operating_system'];
}

// Check if battery size filter has been applied
if(isset($_POST['battery_size']) && !empty($_POST['battery_size'])) {
    $batterySize = $_POST['battery_size'];
    // Split the range into minimum and maximum values
    $batteryRange = explode('-', $batterySize);
    // Add condition to the array
    $conditions[] = "Item.BatteryLife >= ? AND Item.BatteryLife <= ?";
    // Add minimum and maximum values to the parameters array
    $parameters[] = $batteryRange[0]; // Minimum value
    $parameters[] = $batteryRange[1]; // Maximum value
    // Store battery size in session
    $_SESSION['battery_size'] = $batterySize;
} elseif(isset($_SESSION['battery_size'])) {
    // If battery size is already stored in session, use it
    $_POST['battery_size'] = $_SESSION['battery_size'];
}



// Check if biometrics filter has been applied
if(isset($_POST['biometrics']) && !empty($_POST['biometrics'])) {
    $biometrics = $_POST['biometrics'];
    // Add condition to the array
    $conditions[] = "Item.BiometricAuthentication = ?";
    // Add biometrics to the parameters array
    $parameters[] = $biometrics;
    // Store biometrics in session
    $_SESSION['biometrics'] = $biometrics;
} elseif(isset($_SESSION['biometrics'])) {
    // If biometrics is already stored in session, use it
    $_POST['biometrics'] = $_SESSION['biometrics'];
}



// Check if color filter has been applied
if(isset($_POST['color']) && !empty($_POST['color'])) {
    $color = $_POST['color'];
    // Add condition to the array
    $conditions[] = "Item.Item_ID IN (SELECT Item_ID FROM item WHERE colour = ?)";
    // Add color to the parameters array
    $parameters[] = $color;
    // Store color in session
    $_SESSION['color'] = $color;
} elseif(isset($_SESSION['color'])) {
    // If color is already stored in session, use it
    $_POST['color'] = $_SESSION['color'];
}

// Check if storage size filter has been applied
if(isset($_POST['storage_size']) && !empty($_POST['storage_size'])) {
    $storageSize = $_POST['storage_size'];
    // Add condition to the array
    $conditions[] = "item.Item_ID IN (SELECT Item_ID FROM item WHERE storage = ?)";
    // Add storage size to the parameters array
    $parameters[] = $storageSize;
    // Store storage size in session
    $_SESSION['storage_size'] = $storageSize;
} elseif(isset($_SESSION['storage_size'])) {
    // If storage size is already stored in session, use it
    $_POST['storage_size'] = $_SESSION['storage_size'];
}



// Check if display size range filter has been applied
if(isset($_POST['display_size_range']) && !empty($_POST['display_size_range'])) {
    $displaySizeRange = $_POST['display_size_range'];
    // Define min and max display sizes based on selected range
    switch ($displaySizeRange) {
        case '0_5':
            $minDisplaySize = 0;
            $maxDisplaySize = 5;
            break;
        case '5_6':
            $minDisplaySize = 5;
            $maxDisplaySize = 6;
            break;
        case '6_7':
            $minDisplaySize = 6;
            $maxDisplaySize = 7;
            break;
        case '7_8':
            $minDisplaySize = 7;
            $maxDisplaySize = 8;
            break;
        // Add more cases for other ranges as needed
        default:
            // Default case if no valid range is selected
            $minDisplaySize = 0;
            $maxDisplaySize = 10; // Maximum display size, adjust as needed
            break;
    }
    // Add condition to the array
    $conditions[] = "Item.DisplaySize BETWEEN ? AND ?";
    // Add min and max display sizes to the parameters array
    $parameters[] = $minDisplaySize;
    $parameters[] = $maxDisplaySize;
    // Store display size range in session
    $_SESSION['display_size_range'] = $displaySizeRange;
} elseif(isset($_SESSION['display_size_range'])) {
    // If display size range is already stored in session, use it
    $_POST['display_size_range'] = $_SESSION['display_size_range'];
}


            // If conditions exist, add WHERE clause to the query
            if(!empty($conditions)) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }

            // Add sorting condition based on user selection
            if(isset($_POST['sort_order']) && ($_POST['sort_order'] === 'ASC' || $_POST['sort_order'] === 'DESC')) {
                $sort_order = $_POST['sort_order'];
                // Add sorting order to the query
                $query .= " ORDER BY Item.Price $sort_order";
            }

            // Prepare and execute the query
            $statement = $pdo->prepare($query);
            $statement->execute($parameters);

            // Store all different products of result
            $rowset = array();

            // Display all products fetched from the database
            foreach ($statement as $row) {
                //Verify no dupes
                if(!in_array($row, $rowset)){

                    echo "<div class='product-item'>";
                    echo "<a href='product_dt.php?Item_ID=" . $row['Item_ID'] . "'>";
                    echo "<strong>" . $row['ItemName'] . "</strong><br>";
                    echo "<img src='CSS/images/" . $row['Img'] . "'><br>";
                    echo "<strong>£" . $row['Price'] . "</strong><br>";
		    echo "<strong>Click To View More" . "</strong><br>";
                    echo "<form method='post' action='addtobasket.php'>";
                    echo "<input type='hidden' name='product_id".$row['Item_ID']."' value='" . $row['Item_ID'] . "'>";
                    echo "<button type='submit' name='add_to_basket'>Add to basket</button>";
                    echo "</form>";
                    echo "</div>";

                    array_push($rowset, $row);
                }
            }
            ?>
        </div>
    </div>
<!-- Add footer -->
<?php include "footer.php";?>
</body>
</html>
