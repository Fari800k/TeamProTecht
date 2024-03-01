<link rel="stylesheet" href="CSS/navbar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav>
    <ul class="nav_list"> 
        <li><img src="CSS/images/logo.png" width="90px" height="65px"></li>
        <li><a href="homepage.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="browse.php">Browse</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
        <?php

        include "connectdb.php";
        //if logged in, adds account.php and logout.php links
        session_start();
        if(isset($_SESSION['username']) && isset($_SESSION['User_ID'])){
            echo "<li><a href='account.php'>Welcome ".$_SESSION['username']."</a></li>";
            echo "<li><a href='logout.php'>Logout</a></li>";
        } 
        
        ?>
        <div id="basketcontainer">
            <li class="basketbutton" id="buttonbasket"><a href="basket.php"><i class="fa fa-shopping-basket"></i></a></li>
            <div class="mybasket" id="mybasketdropdown">
        <?php
            //if item/s added to a new basket, view basket in dropdown menu
            echo $_SESSION['Basket_ID'];
            if(isset($_SESSION['Basket_ID'])){


                $overviewsql = "SELECT * FROM basketitem 
                                    JOIN item ON item.Item_ID = basketitem.Item_ID
                                    WHERE Basket_ID = ".$_SESSION['Basket_ID']."";

                $basketviewitems = $pdo->prepare($overviewsql);
                $basketviewitems->execute();

                foreach($basketviewitems as $basketviewitem){
                    echo "<div = 'basketitemID" . $basketviewitem['BasketItem_ID'] . "'><a href='". $basketviewitem['Item_ID'] ."'>". $basketviewitem['ItemName'] ."</a>";
                    echo "<img src='CSS/images/". $basketviewitem['Img'] . "' width='10%' height='15%'></div>";    
                }
            }
        session_abort();
        ?>
        </div>
        </div>
        <li><a href="login.php"><i class="fa fa-user"></i></a></li>
    </ul>
</nav>
