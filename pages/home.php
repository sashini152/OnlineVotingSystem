<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header("location: login.php");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StarGlow</title>
  <link rel="stylesheet" href="../css/homestyles.css">
  <script src="https://kit.fontawesome.com/42e5148630.js" crossorigin="anonymous"></script>
  <script src="../js/home.js"></script>
</head>

<body>
  <?php include ('header.php') ?>

  <div class="imagebar">
    <div class="slider-track">
      <div class="slide-item fade">
        <img class="image-1" src="../images/pic1.jpg" width="1080px">
      </div>
      <div class="slide-item fade">
        <img class="image-2" src="../images/slide-2.jpg">
      </div>
      <div class="slide-item fade">
        <img class="image-3" src="../images/Untitled-1.jpg">
      </div>
      <div class="slide-item fade">
        <img class="image-4" src="../images/slide-4.jpg">
      </div>
      <div class="slide-item fade">
        <img class="image-5" src="../images/slide-5.jpg">
      </div>
    </div>
  </div>

  <div class="pavbar" id="pbar">



    <div class="btn-bars"><a style="color:white; text-decoration:none; " href="welcome.php">Vote Now</a></div>



  </div>
  <hr>
  <div class="about-us">
    <div class="pic" id="bp1"></div>
    <div class="text">
      <p>

      </p>
      <div id="btn-about" class="btn-about"><a style="color:white; text-decoration:none; "
          href="gallery.php">Gallery</a></div>
    </div>
  </div>
  <hr>
  <div class="about-us">
    <div class="text">
      <p>
      </p>
      <div id="btn-about" class="btn-about"><a style="color:white; text-decoration:none; " href="welcome.php">Events</a>
      </div>
    </div>
    <div class="pic" id="bp2"></div>
  </div>
  <hr>
  <div class="about-us">
    <div class="pic" id="bp3">

    </div>
    <div class="text">
      <p>
      </p>
      <div id="btn-about" class="btn-about"><a style="color:white; text-decoration:none; " href="news.php">News and
          Updates</a></div>
    </div>
  </div>


  <footer>
    <div class="container">
      <div class="logo">
        <img src="../images/logoNew.png" alt="STAR GLOW" />
      </div>

      <div class="menu">
        <div class="navigation">
          <a href="home.php">Home</a>

          <a href="aboutUs.php">About us</a>
          <a href="welcome.php">Vote</a>
        </div>

        <div class="navigation">

          <a href="news.php">News</a>
          <a href="contactUs.php">Contact us</a>
          <a href="feedback.php">Feedback</a>
        </div>
        <div class="navigation">
          <a href="profile.php">Profile</a>
          <a href="gallery.php">Gallery</a>
          <a href="welcome.php">Event</a>

        </div>
      </div>
      <div class="social">
        <a href="#"><img src="../images/fb.png" /></a>
        <a href="#"><img src="../images/in.png" /></a>
        <a href="#"><img src="../images/tik.png" /></a>
        <a href="#"><img src="../images/yt.png" /></a>
      </div>
    </div>
  </footer>
  <div class="copyright">
    <p>Copyright © 2024 StarGlow</p>
  </div>
</body>

</html>