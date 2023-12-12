<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add admin</title>
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

    <div class="container">
       <div class="container-fluid">
        <h1>Add admin</h1>

        <form action="" method="POST">
            <table>
                <tr>
                    <tr>
                         <td>Employee's First Name</td>
                <td><input type="text" name="firstName" placeholder="First Name" required /></td>
                    </tr>
                <tr>
                     <td>Employee's Last Name</td>
                <td><input type="text" name="lastName" placeholder="Last Name" required /></td>
                </tr>
               <tr>
                <td>Password</td>
                <td colspan="2"><input type="password" name="password" id="userInput" placeholder="Password"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 characters"
                    required /></td>
               </tr>
                </tr>
                <tr>
                    <td class="col-2">
                        <input type="submit" name="add_Admin" id="addAdmin" value="Add Admin" class="btn btn-success">
                    </td>
                </tr>
               
            </table>
        </form>
    </div> 
    </div>
    
    
</body>
</html>

<?php
//Process form to database 
if(isset($_POST['submitted']))
{
   $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $password = $_POST['password'];
}
//
?>