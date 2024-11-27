<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="index.css">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/ec1a397272.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
      <nav>
      <div class="row1">
        <a href="Landingpage.php"><img src="Image/lighthouselogo.png" alt="Coffeshop" class="logo"></a>
        <ul class="nav-bar">
          <li><a href="Landingpage.php">Home</a></li>
          <li><a href="Menu.php">Menu</a></li>
          <li><a href="About Us.php">About Cafe</a></li>
          <li><a href="Contact Us.php">Contact Us</a></li>
          <?php if (!isset($_SESSION['userID'])): ?>
              <li><a href="Signup-Login.php">Login/Signup</a></li>
          <?php endif; ?>
          <li><a href="Feedback Form.php">Reviews</a></li>
        </ul>
      </div>
      <div class="nav-right">
        <a href="ATC.php" class="cart-icon">
          <img src="/Image/finalcart.png" alt="Cart Logo">
        </a>
      </div>
      </nav>
      <div class="hero-text-box">
        <h1 class="businessgrow">Where Good Talks Happen</h1>
      </div>
    </header>

  <!-- Testimonials Section -->
  <section class="testimonials">
    <div class="container">
      <h1>What Our Customers Say..</h1>
      <div class="row">
        <div class="col-sm-12">
          <div id="customers-testimonials" class="owl-carousel">
            <!--TESTIMONIALS-->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="/Image/landpage.png" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">EMILIANO AQUILANI</div>
            </div>
            <!--END OF TESTIMONIAL 1 -->
            <!--TESTIMONIAL 2 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="/Image/landpage.png" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">ANNA ITURBE</div>
            </div>
            <!--END OF TESTIMONIAL 2 -->
            <!--TESTIMONIAL 3 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="/Image/landpage.png" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">LARA ATKINSON</div>
            </div>
            <!--END OF TESTIMONIAL 3 -->
            <!--TESTIMONIAL 4 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="/Image/landpage.png" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">IAN OWEN</div>
            </div>
            <!--END OF TESTIMONIAL 4 -->
            <!--TESTIMONIAL 5 -->
            <div class="item">
              <div class="shadow-effect">
                <img class="img-circle" src="/Image/landpage.png" alt="">
                <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
              </div>
              <div class="testimonial-name">MICHAEL TEDDY</div>
            </div>
            <!--END OF TESTIMONIAL 5 -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End of Testimonials Section -->

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h4>Contact Us</h4>
          <p>LightHouse Cafe</p>
          <p>Ground floor, Lighthouse Bible Baptist Church, 89 ROTC Hunters St., Barangay Tatalon, Quezon City, Philippines</p>
          <p>Phone: 0995 925 1083</p>
          <p>Email: lighthousecafe@gmail.com</p>
        </div>
        <div class="col-md-5">
          <h4>Opening Hours</h4>
          Monday - 9:00 AM - 5:00 PM<br>
          Tuesday - 9:00 AM - 5:00 PM<br>
          Wednesday - 9:00 AM - 5:00 PM<br>
          Thursday - 9:00 AM - 5:00 PM<br>
          Friday - 9:00 AM - 5:00 PM<br>
          Saturday - 9:00 AM - 5:00 PM<br>
          Sunday - 9:00 AM - 5:00 PM<br>
        </div>
        <div class="col-md-2">
          <h4>Quick Links</h4>
          <ul class="list-unstyled">
            <li><a href="Landingpage.php">Home</a></li>
            <li><a href="About Us.php">Our Menu</a></li>
            <li><a href="Menu.php">About Cafe</a></li>
            <li><a href="Contact Us.php">Contact Us</a></li>
            <li><a href="ATC.php">Cart</a></li>
            <li><a href="footer.php">Order</a></li>
            <li><a href="footer.php">Delivery</a></li>
          </ul>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-12">
          <div class="socmed">
            <a href="https://www.facebook.com/LighthouseCafeCoffeeShop"><i class="fab fa-facebook-square fa-beat-fade" style="color: #000000;"></i></a>
            <a href="https://www.instagram.com/lighthousecafetv?igsh=YXdodDVxaXR0eHI1"><i class="fab fa-instagram fa-beat-fade" style="color: #000000;"></i></a>
          </div>
          <p class="copy-rights">&copy; 2024 LightHouse Cafe - All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
  <!-- Custom JS -->
  <script src="Testimonials.js"></script>
  <script src="Landingpage.js"></script>
  <script src="Menu.js"></script>

</body>

</html>
