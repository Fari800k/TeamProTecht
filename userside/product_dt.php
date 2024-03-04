<?php
    // Include navbar.php
    include "navbar.php";
    include "connectdb.php";

    $Item_ID = ""; 

    if(isset($_GET["Item_ID"])) {
        $Item_ID = $_GET["Item_ID"];
    } else {
       
        echo "Item ID is not set";
        exit(); 
    }

    $sql_query = "SELECT * FROM item WHERE Item_ID = ?";
    $ex_query= $pdo->prepare($sql_query);
    $ex_query->execute([$Item_ID]); 

    
    $row = $ex_query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Description</title>
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="row">
<div class= "col-md-5">
<h1><?php echo $row["ItemName"]; ?></h1>
<img src="CSS/images/<?php echo $row["Img"]; ?>" style="width: 25%; padding-bottom: 20px;" />
<p><?php echo $row["ItemDesc"]; ?></p>
</div>
<div class="col-md-3">
<button>Add To Basket</Button>
</div>
</div>
</body>
</html>
