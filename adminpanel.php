<!DOCTYPE html>
<html lang="en">
<head>
     <!--Specifying character set-->
        <meta charset="UTF-8"/>
        <!--Title of web page-->
        <title>Admin Panel</title>
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

<div class="main-content container">
    <div class="container-fluid">
        <br>
        <br>
        <h1 class="text-center">Manage Admin</h1>

        <br> <br>

        <a href="addAdmin.php" class="btn btn-success">Add Admin</a>

        <br> <br> <br>
<div class="bg-dark-subtle align-content-between">
 <table>
            <tr>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <td>1.</td>
            <td>John</td>
            <td>Smith</td>
            <td>JohnSmith1@aol.com</td>
            <td>
                       <a href="#" class="btn btn-info">Change Password</a>
                <a href="#" class="btn btn-secondary">Update Admin</a>
            <a href="#" class="btn btn-danger">Delete Admin</a>             
            </td>
        </table>   
</div>
        
    </div>
</div>
    
</body>
</html>

<?php

// Connect to DB 
require_once("connectdb.php");

?>