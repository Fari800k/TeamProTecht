The TeamProTecht main branch is broken down into 3 main folders
1. "userside" - holds the customer user pages
2. "login_system" - holds the admin user login
3. "admin panel" - holds the admin/employee user pages

The "userside" folder:

The userside folder consists of 3 folders and 19 PHP files:
1. "CSS" - holds all css files and images
2. "JavaScript" - holds the script.js file
3. "SQL" - holds the mysqli connection, admin/employee login verification php,
            and the sql used for the main branch

PHP files:
1. aboutus.php - contains the values and scope of TeamProTecht
2. accountpage.php - contains functionality for logged-in user detail changes, past orders, rating those orders, and returning those orders
3. addtobasket.php - file for adding an item (singular or multiple) to a new/existing shopping basket
4. basket.php - contains a general overview of items added to 1 basket, an option to delete the item, a button to checkout, and a link to return to shopping
5. checkout.php - contains code to finalise a basket, converting it into an order with the "Pending" order status
6. contactus.php - contains a form for the purpose of giving feedback about TeamProTecht, the website or any errors encountered while using the website
7. deleteitem.php - file for deleting an item from a logged-in user's currently in use basket
8. featureditem.php - contains 4 items that have the lowest stock, indicating the best sold items
9. footer.php - contains the customer-side footer
10. homepage.php - contains the TeamProTecht home page along with a carousel
11. login.php - contains the login form and register form popup for the customer user. If the user accesses the page when already logged in, they will be sent to accountpage.php
12. logout.php - file logs the customer out of the site and returns to the homepage
13. navbar.php - holds the navigation bar for the customer-side pages that changes depending on whether the user is logged in and if that logged in user has made a new basket
14. product_dt.php - contains all the specifications for the product, the price, reviews of users who had bought the product and an option to add multiple of the product to your basket
15. registeruser.php - file that creates a new user account with details given from the registration popup from login.php
16. reviewitem.php - file that sends a product review from accountpage.php to the database to be seen by all users in product_dt.php
17. update_details.php - file that updates the database of a logged-in user based on the form in accountpage.php

