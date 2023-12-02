<?php 

session_start();


if(isset($_SESSION["userEmail"]) || isset($_COOKIE["userEmail"])){
    header("location:admin_add_menu.php");
}

    // $id = $_GET['id'];

    // select id get data

    if(isset($_POST['btn_submit'])){
        $email = $_POST['userEmail'];
        $password = $_POST['userPassword'];


          // page1.php
          // session_start();

          // $_SESSION['param'] = $email;

          // $_SESSION['user_credentials'] = array(
          //   'email' => $email,
          //   'password' => $password
          // );

        require("connection.php");

        // $query = "UPDATE `tbl_student` SET `name`='$name', `marks`='$marks' WHERE id=$id";

        $query = "SELECT * FROM `tbl_yummy` WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        // Check if the query was successful
        if (mysqli_num_rows($result) > 0) {
          echo "Login successful!";
          $_SESSION["userEmail"] = $email;
          header('location:admin_add_menu.php');

          // session_start();
          // $_SESSION['param'] = $email;

        } else {
            echo "Invalid email or password.";
            $errorMessaged = "Invalid email or password.";

            
            // Use PHP to generate JavaScript code
            echo '<script>';
            echo '    alert("' . $errorMessaged . '");';
            echo '</script>';
            


        }
          


        // header('location:index.php');
    }


?>




<script>
    function showError(message) {
        alert(message);
    }

    function validateForm() {
        var email = document.forms["loginForm"]["userEmail"].value;
        var password = document.forms["loginForm"]["userPassword"].value;

        if (email === "" || password === "") {
            showError("Both email and password must be filled out");
            return false;
        }

        // Email format validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.match(emailRegex)) {
            showError("Invalid email format");
            return false;
        }

        return true;
    }
</script>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Yummy Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

   <!-- Favicons -->
   <link href="assets/img/Faviconnn.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="signin.css">

  <!-- =======================================================
  * Template Name: Yummy
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

    <a href="/Yummy/bannerpage.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Yummy<span>.</span></h1>
      </a>

      <!-- <nav id="navbar" class="navbar">
        <ul>
          <li ><a class="disabled" href="/index.html">Home</a></li>
          <li ><a class="disabled" href="/about.html">About</a></li>
          <li ><a class="disabled" href="/menu.html">Menu</a></li>
          <li ><a class="disabled" href="/events.html">Events</a></li>
          <li><a class="disabled" href="/chef.html">Chefs</a></li>
          <li><a class="disabled" href="/gallery.html">Gallery</a></li>

          <li><a href="/contact.html">Contact</a></li>
        </ul>
      </nav> -->

      <div class="d-flex">
      <a class="btn-book-a-table" href="/Yummy/signup.php">Signup</a>
      <a class="btn-book-a-table" href="/Yummy/bannerpage.php">User</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      </div>

    </div>
  </header><!-- End Header -->




  <!-- -------------------------SIGNUP FORM------------------------------ -->


  <div class="wrapper fadeInDown my-5">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first my-5">
        <img src="./assets/img/capture.png" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="" method="POST" name="loginForm" onsubmit="return validateForm()">
        <h3 class="my-3">ADMIN SIGNIN</h3>
        <input type="text" id="login" class="fadeIn second" name="userEmail" placeholder="email">
        <input type="text" id="password" class="fadeIn third" name="userPassword" placeholder="password">
        <input type="submit" name="btn_submit" class="fadeIn my-5 fourth btn_submit" value="Sign In">
      </form>


      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022 - US<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +92 301 0943306<br>
              <strong>Email:</strong> arbazkhaann256@gamil.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-Sat: 11AM</strong> - 23PM<br>
              Sunday: Closed
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>