<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <title>Teamprotecht</title>
    <link rel="stylesheet" href="hp.css" />
    <script defer src="JavaScript/script.js"></script>
  </head>
<?php
include "navbar.php";
?>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <main>
    <div class="carousel">
      <section id="Featured_Phones">
        <div class="Phones">
        </div>
        <div id="FeaturedCarousel" class="carousel slide">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#FeaturedCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#FeaturedCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#FeaturedCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="CSS/images/iPhone15.png" class="d-block w-100" alt="iPhone15">
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color: white;">The Fabulous IPhone 15</h3>
            </div>
          </div>
          <div class="carousel-item">
            <img src="CSS/images/s23ultra.jpg" class="d-block w-100" alt="s23ultra">
            <div class="carousel-caption d-none d-md-block">
              <h3 style="color: white;">Shop the new 23 Ultra</h3>   
            </div>
          </div>
          <div class="carousel-item">
            <img src="CSS/images/fold.jpg" class="d-block w-100" alt="fold">
            <div class="carousel-caption d-none d-md-block">
              <h5 style="color: white;">Galaxy Fold Available to pre- order</h5>
            </div>
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#FeaturedCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#FeaturedCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>

      </section>
    </div>


    <div class="Featured Products">
      <h1>Best Sellers</h1>                        
    </div>      
    </main>


    <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4>Contact Us</h4>
        <p>Email: group3.cs2tp@gmail.com</p>
        <p>Phone: +44 (0) 123456789</p>
      </div>
      <div class="col-md-6">
        <h4>Follow Us</h4>
        <p>Connect with us on social media:</p>
        <ul class="social-icons">
          <li><a href="https://en-gb.facebook.com/" target="_blank"><img src="facebook.png" alt="Facebook" width="30" height="30"></a></li>
          <li><a href="https://twitter.com/i/flow/login" target="_blank"><img src="twitter.png" alt="Twitter" width="30" height="30"></a></li>
          <li><a href="https://www.instagram.com/" target="_blank"><img src="insta.png" alt="Instagram" width="30" height="30"></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="text-center">
    <p>&copy; All rights reserved. </p>
  </div>
</footer>

  </body>
</html>