<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Items</title>
     <!--Attaching css file-->
     <link rel="stylesheet" href="stocksystem.css"/>
     <!-- Add icon library -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <div class="navbar">
        <!-- Menu Bar -->
        <ul>
          <div class="logo-container1">
            <img src="CSS Images/logo.png" alt="Logo 1">
          </div>
            <li><a href="http://localhost/Year%202%20Team%20Project/confirmorders.html">Confirm Orders</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/pendingorders.html">Pending Orders</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/pendingorders.html">View Inventory</a></li>
            <li><a href="http://localhost/Year%202%20Team%20Project/fulfilledorders.html">Fulfilled Orders</a></li>
            <li><a href="file:///C:/xampp/htdocs/Year%202%20Team%20Project/stocksystem.html">Stock Put Away</a></li>
            <li class="logout-link"><a href="http://localhost/Year%202%20Team%20Project/login.html" onclick="logout()">Logout</a></li>
        </ul>
    </div>
    <span class="container-fluid text-center">
         <h2>Add Item(s)</h2>
    </span>
     
    <form action="additems.php" method="post" enctype="multipart/form-data">
        <label for="ItemName">Item Name: </label>
        <input type="text" name="ItemName" required><br>

        <label for="Quantity">Quantity: </label>
        <input type="number" name="Quantity" id="Quantity" required>

        <label for="ItemDesc">Item Description: </label>
        <textarea name="ItemDesc" id="ItemDesc" cols="30" rows="10" required></textarea><br>

        <label for="Price">Price: </label>
        <input type="number" name="Price" required><br>

        <label for="Img">Image: </label>
        <input type="file" name="Img" id="Img"><br>

        <label for="Location_ID">Location ID: </label>
        <input type="number" name="Location_ID" id="Location _ID"><br>

        <input type="submit" value="Upload">
    </form>

</body>
</html>
<?php
//connect to db 
require_once('connectdb.php');

// process data 
$ItemName = $_POST['ItemName'];
$Quantity = $_POST['Quantity'];
$ItemDesc = $_POST['ItemDesc'];
$Price = $_POST['Price'];
$Img = $_POST['Img'];
$Location_ID = $_POST['Location_ID'];
if(isset($_POST["submit"])){
//handle file uploaded 
if($_FILES['Img']['size']>0)
    $Img = addslashes(file_get_contents($_FILES['Img']['tmp_name']));
}else{
    $Img = null;
}


//Insert data into db 
$sql = "INSERT INTO Item(ItemName,Quantity,ItemDesc,Price,Img,Location_ID) VALUES ('$ItemName','$Quantity','$ItemDesc','$Price','$Img','$Location_ID')";

if($conn->query($sql)===TRUE){
    echo "Item has been uploaded successfully";
}else{
echo "Error: " . $sql . "<br>";
}

?>