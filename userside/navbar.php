<link rel="stylesheet" href="CSS/navbar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 

<nav>
    <ul class="nav_list> 
        <li><img src="CSS/images/logo.png" width="90px" height="65px"></li>
        <li><a href="homepage.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="browse.php">Browse</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
        <?php
        //if logged in, adds account.php and logout.php links
        session_start();
        if(isset($_SESSION['username']) && isset($_SESSION['User_ID'])){
            echo "<li><a href='account.php'>Welcome ".$_SESSION['username']."</a></li>";
            echo "<li><a href='logout.php'>Logout</a></li>";
            session_abort();
        } 
        session_abort();
        ?>
        <li><a href="basket.php"><i class="fa fa-shopping-basket"></i></a></li>
        <li><a href="login.php"><i class="fa fa-user"></i></a></li>
        
    </ul>
</nav>
