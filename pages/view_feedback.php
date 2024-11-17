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
    <script src="../js/view_feedbackScript.js"></script>
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
                    <li><a href="feedback.php">FEEDBACK</a></li>
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

            <?php
            require '../php/fetch_feedback.php';
            ?>

            <div class="feedback-display-container">
                <?php foreach ($userFeedbacks as $feedback): ?>
                    <div class="feedback-card">
                        <p><strong>Type:</strong> <?php echo htmlspecialchars($feedback['feedback_type']); ?></p>
                        <p><strong>Feedback:</strong> <?php echo htmlspecialchars($feedback['feedback']); ?></p>
                        <p><strong>Rating:</strong> <?php echo htmlspecialchars($feedback['rating']); ?></p>
                        <div class="card-buttons">
                            <button onclick="toggleUpdateForm(<?php echo $feedback['id']; ?>)">Update</button>
                            <button onclick="confirmDelete(<?php echo $feedback['id']; ?>)">Delete</button>
                        </div>
                        <div id="update-form-<?php echo $feedback['id']; ?>" style="display: none;">
                            <form action="../php/update_feedback.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $feedback['id']; ?>">
                                <label for="update-feedback-type-<?php echo $feedback['id']; ?>">Feedback Type :</label>
                                <select id="update-feedback-type-<?php echo $feedback['id']; ?>" name="feedback-type"
                                    required>
                                    <option value="comment" <?php if ($feedback['feedback_type'] === 'comment')
                                        echo 'selected'; ?>>Comment
                                    </option>
                                    <option value="suggestion" <?php if ($feedback['feedback_type'] === 'suggestion')
                                        echo 'selected'; ?>>Suggestion
                                    </option>
                                    <option value="question" <?php if ($feedback['feedback_type'] === 'question')
                                        echo 'selected'; ?>>Question
                                    </option>
                                </select>
                                <label for="update-feedback-<?php echo $feedback['id']; ?>">Feedback :</label>
                                <textarea id="update-feedback-<?php echo $feedback['id']; ?>" name="feedback" rows="4"
                                    required><?php echo htmlspecialchars($feedback['feedback']); ?></textarea>
                                <label for="update-rating-<?php echo $feedback['id']; ?>">Rating :</label>
                                <input type="number" id="update-rating-<?php echo $feedback['id']; ?>" name="rating" min="1"
                                    max="5" value="<?php echo $feedback['rating']; ?>" required>
                                <button type="submit">Update Feedback</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>




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