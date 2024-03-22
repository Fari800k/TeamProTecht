<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Teamprotecht</title>
        <link rel="stylesheet" href="CSS/aboutus.css">
        <link rel="icon" type="image/x-icon" href="CSS/images/favicon.ico">
        <script defer src="JavaScript/script.js"></script>
    </head>
    <body>
<?php
include('connectdb.php');
session_start();
include "navbar.php";
?>
            <br>
            <br>
               <!--Creating the initial header and breif of the company-->
               <h1>About Us</h1>
               <p>Welcome to Teamprotecht! Founded in 2023, we are the best and upcoming retailer for mobile phones. Currently operating as an e-commerce business, we are physically based in the UK but obtain the ability to ship worldwide. Here at Teamprotecht, we sell a broad range of mobile phones including top brands such as Apple, Samsung and Google. We are certain we can find the right phone for you.</p>
               
               <!--Creating a section for the companys vision-->
               <vision>
                <div class="container">
                    <!--Creating a container for an image for aesthetics-->
                    <div class="image">
                        <img src="CSS/images/aboutus_image.jpeg" >
                    </div>
                    <!--Creating a container for text description-->
                    <div class="text">
                        <h5>Our Vision</h5>
                        <p>At Teamprotecht, our vision is to help everybody to get the most suitable phone for them; one which meets our customers requirements for price range, colour and its fetaures. We believe this is important as technology is becoming ever so important in the modern world. Nowadays mobile phones are used much more than for just calls. Mobile phones are used to connect people with others from around the world, improve lives, and staying healthy, productive and entertained. To carry out and implement our vision we have ensured that we offer a very wide range of phones to cover all needs and requirements, as well as search bars and filter boxes to help our customers to find their perfect phone.</p>
                    </div>
                </div>
                </vision>

                <br>
                <br>

                <!--Creating a section for the companys values-->
               <values>
                <!--Creating a container for text description-->
                <div class="container">
                    <div class="text">
                        <h5>Our Core Values</h5>
                        <p>Within our company we hold 4 main values:</h4>
                                <br>
                                <br>
                                <p><strong>People</strong> - At the heart of our business is people, the customers and also our employees. Without these people Teamprotecht would not be where it is now. And therfore we prioritise our peoples hapiness by doing our absolute best to fulfill their needs and desires.</p>
                                <br>
                                <p><strong>Environment</strong> -We also aim to be very eco friendly. Any items that need to be disposed are done so in the correct manner to ensure that there is no polution. We do this as we care for our planet and for its future. Shipping is also done in batches to ensure any gas released is kept to a minimum.</p>
                                <br>
                                <p><strong>Community</strong> - Another aspect of our values is giving back to the community. Every year we run fundraisers in order to raise money for local charities and food banks. Our employees also participate in external fundraisers to help give back to the community.</p>
                                <br>
                                <p><strong>Positivity</strong> - Positivity is also a major part of Teamprotecht. We ensure all our services are carried out with a positive attitude to help leave our customers with a smile on their faces.</p>
                            </div>
                    </div>
                </div>
            </values>

            <!--Creating a section for the companys reviews-->
            <reviews>
                <div class="container">
                    <!--Creating a container for an image for aesthetics-->
                    <div class="image">
                        <img src="CSS/images/aboutus_image_3.jpg" >
                    </div>
                    <!--Creating a container for text description-->
                    <div class="text">
                        <h5>Reviews</h5>
                        <p>Here's what some of our previous customers had to say about us:</p>
                        <p><strong>David Brown</strong> [15/01/23]</p>
                        <p>I would highly recommend Teamprotecht! Brilliant customer service and this has allowed me to find my perfect phone. I thought the prices were very reasonable and affordable, making Teamportecht a better option compared to other mobile phone shops.</p>
                        <p><strong>Lucy Johnson</strong> [25/11/23]</p>
                        <p>The website was easy to navigate through, I thought the search filters made my life so much easier. Overall just a great website to find a phone. Will definitely be coming back in the future!</p>
                    </div>
                </div>
            </reviews>
           <!-- Add footer -->
<?php include "footer.php";?>
                <html>