<?php
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
    if (!$email) {
        $_SESSION['error'] = 'No email found in session.';
        exit();
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $feedback_type = mysqli_real_escape_string($conn, $_POST['feedback-type']);
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
    $rating = isset($_POST['rating']) ? mysqli_real_escape_string($conn, $_POST['rating']) : null;

    $sql = "INSERT INTO feedback (name, email, country, feedback_type, feedback, rating) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    $stmt->bind_param('sssssi', $name, $email, $country, $feedback_type, $feedback, $rating);

    if ($stmt->execute()) {
        echo "<script>alert('feedback added successfully !.'); window.location.href='../pages/feedback.php';</script>";
        $stmt->close();
        $conn->close();
        exit();
    } else {
        $_SESSION['error'] = 'Error submitting feedback: ' . $stmt->error;
        $stmt->close();
        $conn->close();
        exit();
    }


} else {
    echo "error !!!!";
    exit();
}




?>