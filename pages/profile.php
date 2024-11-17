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

include '../php/config.php';

$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $email = $row['email'];
} else {
    $name = '';
    $email = '';
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarGlow</title>
    <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="../images/logoNew.png">
            </div>
            <nav>
                <ul>
                    <li><a href="profile.php" class="active">PROFILE</a></li>
                    <li><a href="contactUs.php">CONTACT US</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>
                    <li><a href="welcome.php">EVENTS</a></li>
                </ul>
            </nav>
            <div class="home">
                <a href="?logout=true" class="active">LOGOUT</a>
            </div>
        </div>
    </header>

    <div class="profile-container">
        <div class="profile-picture">
            <img src="../images/vote.png" alt="Profile Picture">
        </div>
        <div class="profile-details">
            <h2>Profile Details</h2>
            <form action="../php/edit_profile.php" method="post">
                <p>Name: <input type="text" name="name" value="<?php echo $name; ?>"></p>
                <p>Email: <input type="email" name="email" value="<?php echo $email; ?>" readonly></p>

                <div class="profile-buttons">
                    <button type="submit" name="edit">Edit</button>
                </div>
            </form>
            <form action="../php/delete_profile.php" method="post"
                onsubmit="return confirm('Are you sure you want to delete your profile?');">
                <div class="profile-buttons">
                    <button type="submit" name="delete">Delete</button>
                </div>
            </form>
        </div>
    </div>



    <footer id="footer">
        <div class="container">
            <div class="logo">
                <img src="../images/logoNew.png">
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