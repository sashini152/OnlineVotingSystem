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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>StarGlow</title>
  <link rel="stylesheet" href="../css/contactStyles.css" />
</head>

<body>
  <header>
    <div class="header-container">
      <div class="logo">
        <img src="../images/logoNew.png" />
      </div>

      <nav>
        <ul>
          <li><a href="contactUs.php" class="active">CONTACT US</a></li>


          <li><a href="feedback.php">FEEDBACK</a></li>
          <li><a href="aboutUs.php">ABOUT US</a></li>
        </ul>
      </nav>

      <div class="home">
        <a href="?logout=true" class="active">LOGOUT</a>
      </div>
    </div>
  </header>
  <div class="contact-container">
    <div style="text-align: center">
      <h2>Contact Us</h2>
    </div>
    <div class="row">
      <div class="column">
        <div class="contact-info">
          <div class="info-box">
            <h2>Location</h2>
            <p>StarGlow Studio</p>
            <p>Galle Road, Kollupitiya</p>
          </div>
          <div class="info-box">
            <h2>Telephone</h2>
            <p>011 754 4801</p>
          </div>
          <div class="info-box">
            <h2>Email</h2>
            <p>StarGlow@gmail.com</p>
          </div>
        </div>
      </div>
      <div class="column">
        <form id="contactForm" method="post" action="#">
          <label for="fullname">Full Name</label>
          <input type="text" id="fullname" name="fullname" placeholder="Your Full Name" />
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Your Email" />
          <label for="phoneNumber">Phone Number</label>
          <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Your Phone Number" />
          <label for="subject">Subject</label>
          <textarea id="subject" name="subject" placeholder="Describe Your Needs.." style="height: 170px"></textarea>
          <input type="submit" value="Submit" />
        </form>
      </div>
    </div>
    <div class="userDetails" id="userDetails" style="display: none">
      <h2>User Details</h2>
      <p><strong>Name:</strong> <span id="userName"></span></p>
      <p><strong>Email:</strong> <span id="userEmail"></span></p>
      <p><strong>Phone Number:</strong> <span id="userNumber"></span></p>

      <p><strong>Message:</strong> <span id="userMessage"></span></p>
      <button class="edit-button" onclick="editDetails()">
        Edit Details
      </button>
      <button class="delete-button" onclick="deleteDetails()">
        Delete Details
      </button>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="logo">
        <img src="../images/logoNew.png" />
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
          <a href="profile.php">Profile</a>
        </div>
        <div class="navigation">
          <a href="welcome.php">Event</a>
          <a href="gallery.php">Gallery</a>
          <a href="feedback.php">Feedback</a>

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

  <script src="../js/contactScript.js"></script>
</body>

</html>