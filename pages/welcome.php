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
    <link rel="stylesheet" href="../css/welcomeStyles.css">
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="../images/logoNew.png">
            </div>
            <nav>
                <ul>
                    <li><a href="welcome.php" class="active">EVENTS</a></li>
                    <li><a href="contactUs.php">CONTACT US</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
                </ul>
            </nav>
            <div class="home">
                <a href="?logout=true" class="active">LOGOUT</a>
            </div>
        </div>
    </header>

    <div class="events-container">
        <?php
        include '../php/config.php';

        $sql = "SELECT * FROM events";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<a href="leaderboard.php"><div class="event-card">';
                echo '<h2 class="event-title">' . $row['title'] . '</h2>';
                echo '<p class="event-description">' . $row['description'] . '</p>';

                echo '<p class="event-date">Date: ' . $row['date'] . '</p>';
                echo '</div></a>';
            }
        } else {
            echo '<p>No events available.</p>';
        }

        $conn->close();
        ?>
    </div>

    <footer id="footer">
        <div class="container">
            <div class="logo">
                <img src="../images/logoNew.png" alt="SLIIT Dance Dinasty Logo">
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

                    <a href="gallery.php">Gallery</a>
                    <a href="feedback.php">Feedback</a>
                </div>
            </div>
            <div class="social">
                <a href="#"><img src="../images/fb.png" alt="Facebook"></a>
                <a href="#"><img src="../images/in.png" alt="Instagram"></a>
                <a href="#"><img src="../images/tik.png" alt="TikTok"></a>
                <a href="#"><img src="../images/yt.png" alt="YouTube"></a>
            </div>
        </div>
    </footer>
    <div class="copyright">
        <p>Copyright © 2024 StarGlow</p>
    </div>
</body>

</html>