
<head>
<link rel="stylesheet" href="employee.css" />

<script>
  if (performance.navigation.type === 1) {
    // The page is reloaded, redirect to a different website
    window.location.href = 'http://localhost/demo/stockpage.PHP';
  }
</script>

</head>
<div class="navbar">
        <!-- Menu Bar -->
        <ul>
          <div class="logo-container1">
            <img src="CSS Images\white_logo.png" alt="Logo 1">
          </div>
            <li><a href="http://localhost/Year%202%20Team%20Project/confirmorders.html">Confirm Orders</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/pendingorders.html">Pending Orders</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/pendingorders.html">View Inventory</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/fulfilledorders.html">Fulfilled Orders</a></li>
            <li><a href="file:///C:/xampp/htdocs/Year%202%20Team%20Project/stocksystem.html">Stock Put Away</a></li>
     <li><a href="http://localhost/Year%202%20Team%20Project/viewcontact.php">View contct forms</a></li>
            <li class="logout-link"><a href="http://localhost/Year%202%20Team%20Project/login.html" onclick="logout()">Logout</a></li>
        </ul>
    </div>


<form method="post" action=""><br>
        <select name="action" id="action-select">
            <option value="null">null</option>
            <option value="update">update</option>
            <option value="filter">filter</option>
        </select><br><br>

        <label for="user_Amount" id="user-Amount-label" style="display:none;">Ammount: </label>
        <input type="number" id="user_Amount" name="user_Amount" style="display:none;"  min="0" step="1">
 	  <label for="amount_Filter" id="amount_Filter_label" style="display:none;">amount_Filter:</label>
	  <select name="amount_Filter" id="amount_Filter" style="display:none;">
		<option value="">select</option>
		<option value="=">equal</option>
      	<option value="<">less then</option>
      	<option value=">">greater then</option>

	   </select>

	  
        <label for="item_id" id="item_id_label" style="display:none;">item ID:</label>
	  <input type="number" id="item_id" name="item_id" style="display:none;"  min="0" step="1">


	  <label for="selected_option" id="selected_option_label" style="display:none;">selected_option:</label>
	  <select name="selected_option" id="selected_option" style="display:none;">
		<option value="null">select</option>
      	<option value="setto">set to</option>
      	<option value="remove">remove</option>

	   </select>



	  <label for="find_product" id="find_product_label" style="display:none;">product name:</label>
	  <input type="text" id="find_product" name="find_product" style="display:none;">




	   <label for="iteam_shelf" id="iteam_shelf_label" style="display:none;">shelf:</label>
	   <input type="number" id="iteam_shelf" name="iteam_shelf" style="display:none;"  min="0" step="1"></textarea>

	   <label for="iteam_row" id="iteam_row_label" style="display:none;">row:</label>
	   <input type="text" id="iteam_row" name="iteam_row" style="display:none;"></textarea>

	  <br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <script>
    const actionSelect = document.getElementById('action-select');

    const user_AmountLabel = document.getElementById('user-Amount-label');
    const user_AmountInput = document.getElementById('user_Amount');

    const amount_Filterlabel = document.getElementById('amount_Filter_label');
    const amount_Filterinput = document.getElementById('amount_Filter');

    const selected_optionlabel = document.getElementById('selected_option_label');
    const selected_optioninput = document.getElementById('selected_option');

    const itemidlabel = document.getElementById('item_id_label'); 
    const itemidinput = document.getElementById('item_id'); 

    const rowlabel = document.getElementById('iteam_row_label');
    const rowinput = document.getElementById('iteam_row');


    const shelflabel = document.getElementById('iteam_shelf_label');
    const shelfinput = document.getElementById('iteam_shelf');


    const findproductlabel = document.getElementById('find_product_label');
    const findproductinput = document.getElementById('find_product');



    actionSelect.addEventListener('change', function() {
        if (actionSelect.value === 'null') {
            user_AmountLabel.style.display = 'none';
            user_AmountInput.style.display = 'none';

            amount_Filterlabel.style.display = 'none';
            amount_Filterinput.style.display = 'none';

           selected_optionlabel.style.display = 'none';
            selected_optioninput.style.display = 'none';

            amount_Filterlabel.style.display = 'none';
            amount_Filterinput.style.display = 'none';

            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';

            rowlabel.style.display = 'none';
            rowinput.style.display = 'none';

            shelflabel.style.display = 'none';
            shelfinput.style.display = 'none';


            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';

            itemidlabel.style.display = 'none';
            itemidinput.style.display = 'none';

        } else if (actionSelect.value === 'update') {
            user_AmountLabel.style.display = 'block';
            user_AmountInput.style.display = 'block';

            itemidlabel.style.display = 'block'; 
            itemidinput.style.display = 'block';

            amount_Filterlabel.style.display = 'none';
            amount_Filterinput.style.display = 'none';

           selected_optionlabel.style.display = 'block';
            selected_optioninput.style.display = 'block';


            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';


            rowlabel.style.display = 'none';
            rowinput.style.display = 'none';

            shelflabel.style.display = 'none';
            shelfinput.style.display = 'none';


            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';


        } else if (actionSelect.value === 'filter') {
            user_AmountLabel.style.display = 'block';
            user_AmountInput.style.display = 'block';

            amount_Filterlabel.style.display = 'block';
            amount_Filterinput.style.display = 'block';

           selected_optionlabel.style.display = 'none';
            selected_optioninput.style.display = 'none';

            amount_Filterlabel.style.display = 'block';
            amount_Filterinput.style.display = 'block';

            rowlabel.style.display = 'block';
            rowinput.style.display = 'block';

            shelflabel.style.display = 'block';
            shelfinput.style.display = 'block';


            findproductlabel.style.display = 'block';
            findproductinput.style.display = 'block';

            itemidlabel.style.display = 'none';
            itemidinput.style.display = 'none';

        }
    });
</script>



<table border="1">
    <tr>
        <th>Shelf</th>
        <th>Row</th>
	<th>product name</th>
	<th>item id</th>
        <th>BrandName</th>
        <th>Quantity</th>
    </tr>


    



<?php



$userAmount = $selectedOption = $itemID = "";
$Amount = $amountFilter = $shelf = $row = $action = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    $userAmount = $_POST["user_Amount"];
    $selectedOption = $_POST["selected_option"];
    $itemID = $_POST["item_id"];
    $product = $_POST["find_product"];
    $amountFilter = $_POST["amount_Filter"];
    $shelf = $_POST["iteam_shelf"];
    $row = $_POST["iteam_row"];

    echo " userAmount: " . $action . "<br>";
    echo "Selected Option: " . $selectedOption . "<br>";
    echo "Item ID: " . $itemID . "<br>";
    echo "product: " . $product . "<br>";
    echo "Selected Option: " . $amountFilter . "<br>";
    echo "Shelf: " . $shelf . "<br>";
    echo "Row: " . $row . "<br>";
}
if ($action == "update"){
	if ($selectedOption == "setto") {
 	   $pdo = new PDO('sqlite:new.db');
 	   $statement = $pdo->query("
			UPDATE Item
			SET Quantity = '$userAmount'
			WHERE Item_ID = '$itemID';");



    			$pdo = new PDO('sqlite:new.db');
   			$statement = $pdo->query("SELECT
   			L.Shelf,
    			L.Row,
    			B.BrandName,
    			I.Item_ID,
    			I.ItemName,
    			I.Quantity
			FROM
    				Location L
			JOIN
    				Item I ON L.Location_ID = I.Location_ID
			JOIN
    				Brand B ON I.Item_ID = B.Item_ID;

			");
	}else if($selectedOption == "remove") {
	    $pdo = new PDO('sqlite:new.db');
	    $statement = $pdo->query("
			UPDATE Item
			SET Quantity = Quantity - '$userAmount'
			WHERE Item_ID = '$itemID';");

    		$pdo = new PDO('sqlite:new.db');
    		$statement = $pdo->query("SELECT
    		L.Shelf,
    		L.Row,
    		B.BrandName,
    		I.Item_ID,
    		I.ItemName,
    		I.Quantity
		FROM
    			Location L
		JOIN
 			Item I ON L.Location_ID = I.Location_ID
		JOIN
    			Brand B ON I.Item_ID = B.Item_ID;

		");
	}

}else if ($action == "filter") {
	echo "Debugging - Action is 'filter'.<br>";
    $pdo = new PDO('sqlite:new.db');
    $query = "SELECT
        Location.Shelf,
        Location.Row,
        Item.ItemName,
	Item.Item_ID,
        Brand.BrandName,
        Item.Quantity
    FROM
        Item
    JOIN
        Location ON Item.Location_ID = Location.Location_ID
    LEFT JOIN
        Brand ON Item.Item_ID = Brand.Item_ID
    WHERE 1";  // Start the WHERE clause

    if ($shelf != "") {
        $query .= " AND Location.Shelf = '$shelf'";
    }

    if ($row != "") {
        $query .= " AND Location.Row = '$row'";
    }

    if ($product != "") {
        $query .= " AND Item.ItemName = '$product'";
    }

    if ($amountFilter != "" && $userAmount != "") {
        $query .= " AND Item.Quantity $amountFilter '$userAmount'";
    }

    $query .= ";";  // End the SQL query

    $statement = $pdo->query($query);
    
	
}else{

    $pdo = new PDO('mysql:host=localhost;dbname=cs2tp', 'root', '');
    $statement = $pdo->query("SELECT
    L.Shelf,
    L.Row,
    B.BrandName,
    I.Item_ID,
    I.ItemName,
    I.Quantity
FROM
    Location L
JOIN
    Item I ON L.Location_ID = I.Location_ID
JOIN
    Brand B ON I.Item_ID = B.Item_ID;

");
}


    foreach ($statement as $rows) {
        print "<td>" . $rows['Shelf'] . "</td>";
        print "<td>" . $rows['Row'] . "</td>";
	print "<td>" . $rows['ItemName'] . "</td>";
	print "<td>" . $rows['Item_ID'] . "</td>";
        print "<td>" . $rows['BrandName'] . "</td>";
        print "<td>" . $rows['Quantity'] . "</td><tr>";
    }
    ?>
</table>
</body>
</html>
