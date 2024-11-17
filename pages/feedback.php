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
    <link rel="stylesheet" href="../css/feedbackStyles.css" />
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="../images/logoNew.png">
            </div>
            <nav>
                <ul>
                    <li><a href="welcome.php">EVENTS</a></li>
                    <li><a href="contactUs.php">CONTACT US</a></li>
                    <li><a href="feedback.php" class="active">FEEDBACK</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                </ul>
            </nav>
            <div class="home">
                <a href="?logout=true" class="active">LOGOUT</a>
            </div>
        </div>
    </header>

    <div class="slideshow-container">
        <div class="mySlides-fade">
            <img src="../images/image1.jpg" />
        </div>
        <div class="mySlides-fade">
            <img src="../images/image2.jpg" />
        </div>
        <div class="mySlides-fade">
            <img src="../images/image3.jpg" />
        </div>
        <div class="mySlides-fade">
            <img src="../images/image4.jpg" />
        </div>
    </div>
    <script src="../js/feedbackScript.js"></script>

    <div class="feedback-form-overlay" id="feedback-form-overlay">
        <div class="feedback-form">
            <h2>Feedback Form</h2>
            <p>
                We would love to hear your thoughts, suggestions, concerns, or
                problems with anything so we can improve!
            </p>
            <form action="../php/submit_feedback.php" method="post">
                <label for="feedback-types">Feedback Type :</label>
                <div class="feedback-types">
                    <label><input type="radio" name="feedback-type" value="comment" />
                        Comment</label>
                    <label><input type="radio" name="feedback-type" value="suggestion" />
                        Suggestion</label>
                    <label><input type="radio" name="feedback-type" value="question" />
                        Question</label>
                </div>
                <label for="name">Name :</label>
                <input type="text" id="name" name="name" required />

                <label for="country">Country :</label>
                <input type="text" id="country" name="country" required />

                <label for="feedback">Describe Your Feedback :</label>
                <textarea id="feedback" name="feedback" rows="4" required></textarea>

                <div class="rating">
                    <label for="rating">Rate Us:</label><br />
                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5">&#9733;</label>
                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4">&#9733;</label>
                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3">&#9733;</label>
                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2">&#9733;</label>
                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1">&#9733;</label>
                </div>

                <input type="submit" class="submit-btn"><br>

                <a href="view_feedback.php" class="view-link">View Feedback</a>
            </form>

        </div>

    </div>



    <footer id="footer">
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
                    <a href="profile.php">Profile</a>
                    <a href="news.php">News</a>
                    <a href="contactUs.php">Contact us</a>

                </div>
                <div class="navigation">

                    <a href="gallery.php">Gallery</a>
                    <a href="feedback.php">Feedback</a>
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