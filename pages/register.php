<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>StarGlow</title>
    <link rel="stylesheet" href="../css/registerStyles.css" />
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="../images/logoNew.png" />
            </div>
            <nav>
                <ul>
                    <li><a href="feedback.php">FEEDBACK</a></li>
                    <li><a href="contactUs.php">CONTACT US</a></li>
                    <li><a href="welcome.php">EVENTS</a></li>

                </ul>
            </nav>
            <div class="home">
                <a href="login.php" class="active">LOGIN</a>
            </div>
        </div>
    </header>

    <div class="registration-form-container">
        <form class="registration-form" action="../php/register.php" method="post">
            <h2>Register Now</h2>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Register</button>
            <p>Already registered? <a href="login.php">Go to login</a></p>
        </form>
    </div>


    <footer id="footer">
        <div class="container">
            <div class="logo">
                <img src="../images/logoNew.png" alt="SLIIT Dance Dinasty Logo" />
            </div>

            <div class="menu">
                <div class="navigation">
                    <a href="home.php">Home</a>

                    <a href="aboutUs.php">About us</a>
                    <a href="event.php">Vote</a>
                </div>

                <div class="navigation">

                    <a href="news.php">News</a>
                    <a href="contactUs.php">Contact us</a>

                </div>
                <div class="navigation">
                    <a href="profile.php">Profile</a>
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
    <script>
        <?php
        if (!empty($successAlert)) {
            echo "alert('$successAlert');";
        }
        if (!empty($errorAlert)) {
            echo "alert('$errorAlert');";
        }
        ?>
    </script>
</body>

</html>