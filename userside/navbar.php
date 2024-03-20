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
        // Set current page as prev_page
        if($_SERVER['REQUEST_URI'] !== "/TeamProTecht/userside/login.php") {
            if($_SERVER['REQUEST_URI'] !== "/TeamProTecht/userside/addtobasket.php"){
                if($_SERVER['REQUEST_URI'] !== "/TeamProTecht/userside/deleteitem.php"){
                    if($_SERVER['REQUEST_URI'] !== "/TeamProTecht/userside/connectdb.php"){
                        if($_SERVER['REQUEST_URI'] !== "/TeamProTecht/userside/changeaccinfo.php"){
                            $_SESSION['prev_page'] = $_SERVER['REQUEST_URI'];
                        }
                    }
                }
            }
        }
        //if logged in, adds account.php and logout.php links
        if(isset($_SESSION['username']) && isset($_SESSION['User_ID'])){
            echo "<li><a href='accountpage.php'>Welcome ".$_SESSION['username']."</a></li>";
            echo "<li><a href='logout.php'>Logout</a></li>";
        } 
        
        //if item/s added to a new basket, view basket in dropdown menu
        if(isset($_SESSION['Basket_ID'])){
            $overviewsql = "SELECT * FROM basketitem 
                                JOIN item ON item.Item_ID = basketitem.Item_ID
                                WHERE Basket_ID = ".$_SESSION['Basket_ID']."";

            $basketviewitems = $pdo->prepare($overviewsql);
            $basketviewitems->execute();

            //only include basket nav if basket_id set
            echo "<div id='basketcontainer'>";
            echo "<li class='basketbutton' id='buttonbasket'><a href='basket.php'><i class='fa fa-shopping-basket'></i></a></li>";
            echo "<div class='mybasket' id='mybasketdropdown'>";
            echo "<strong>Your Basket</strong>";
            foreach($basketviewitems as $basketviewitem){
                echo "<div class = 'basketitemcontainer' id = 'basketitemID" . $basketviewitem['BasketItem_ID'] . "'>";
                echo "<div class = 'basketiteminfo'><a href='product_dt.php?Item_ID=" . $basketviewitem['Item_ID'] . "'><img src='CSS/images/". $basketviewitem['Img'] . "'></a>";
                echo "<div class = 'basketitemnumbers'><p>£".$basketviewitem['Price']." per item</p>";
                echo "<p>Quantity: ". $basketviewitem['Quantity'] ."</p>";
                echo "<form action='deleteitem.php' method='post'><input type='hidden' name='BasketItem_ID' value='".$basketviewitem['BasketItem_ID']."'/>";
                echo "<button type='submit' name='deleteItem'>Delete</button></form></div></div></div>";
            }
        }
        ?>
        </div>
        </div>
        <div id="accountcontainer">
            <?php
            if(isset($_SESSION['User_ID'])){
                echo "<li class='accountbutton' id='buttonaccount'><a href='accountpage.php'><i class='fa fa-user'></i></a></li>";
            } else {
                echo "<li class='accountbutton' id='buttonaccount'><a href='#'><i class='fa fa-user'></i></a></li>
                        <div class='myaccount' id='myaccountdropdown'>
                            <li class='accountcustomer' id='customer'><a href='login.php'>Customer</a></li>
                            <li class='accountemployee' id='employee'><a href='../login_system/login.php'>Employee</a></li>
                        </div>";
            }
            ?>
        </div>             
    </ul>
</nav>


