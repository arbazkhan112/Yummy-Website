<?php


session_start();

if(!isset($_SESSION["userEmail"]) && isset($_COOKIE["userEmail"])){
    header("location: signin.php");
}

$email="";

if(isset($_SESSION["userEmail"])){
  $email = $_SESSION["userEmail"];
}


echo "PHP is Running.......";
include "admin_connection.php";
$id = $_GET['updateid'];

$sql = "select * from `yummy_dishes` where id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$price = $row['price'];
$image = $row['image'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    // Check if a new image is uploaded
    if ($_FILES['image']['size'] > 0) {
        $target_dir = "uploads/";
        $newImage = $_FILES['image']['name'];
        $img_loc = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $image_des = "uploads/" . $img_name;
        move_uploaded_file($img_loc, 'uploads/' . $img_name);
    } else {
        // Keep the existing image if no new image is uploaded
        $newImage = $image;
    }

    $sql = "update  `yummy_dishes` set name='$name', price='$price', image='$newImage' where id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "updated Successfully....";
        header("location: admin_display_menu.php");
    } else {
        echo "there is an error in this code";
    }
}
?>











<!-- ------------------------------------------------------------------------------------------------ -->









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

      <div class="container d-flex justify-content-center">
      <nav id="navbar" class="navbar">
      <ul>
          <li><a href="/Yummy/admin_add_menu.php">Add Menu</a></li>
          <li><a href="/Yummy/admin_display_menu.php">Display Menu</a></li>
          

      </ul>
      </nav><!-- .navbar -->
      </div>


      <a class="btn-book-a-table ml-5" href="/Yummy/signin.php">Signout</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>


  </header><!-- End Header -->

   <!-- ======= Menu Section ======= -->
   <section id="menu" class="menu my-5">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Our Menu</h2>
        <p>Check Our <span>Yummy Menu</span></p>
      </div>

    </div>
  </section>




<!-- Form Code Start Here -->


<form method="post" action="" class="container" enctype="multipart/form-data">
    <div class="mb-5">
        <label for="exampleInputEmail1" class="form-label">Dish Name: </label>
        <input type="text" value="<?php echo $name ?>" class="form-control" id="exampleInputEmail1"
               aria-describedby="emailHelp" autocomplete="no" name="name">
    </div>
    <div class="mb-5">
        <label for="exampleInputPassword1" class="form-label">Dish Price: </label>
        <input type="text" value="<?php echo $price ?>" class="form-control" id="exampleInputPassword1"
               autocomplete="no" name="price">
    </div>
    <div class="mb-5">
        <label for="exampleInputPassword1" class="form-label">Image: </label>
        <input type="file" class="form-control" id="exampleInputPassword1" autocomplete="no" name="image">
    </div>
    <div class="text-center my-5">
        <button class="btn btn-danger"><a class="text-white" href="/Yummy/admin_display_menu.php">Back</a></button>
        <button type="submit" name="submit" class="btn btn-warning ">update</button>

    </div>
</form>





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