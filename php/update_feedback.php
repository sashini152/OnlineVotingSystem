<?php
session_start();

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $feedback_type = $_POST['feedback-type'];
    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];

    $sql = "UPDATE feedback SET feedback_type=?, feedback=?, rating=? WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $feedback_type, $feedback, $rating, $id);

    if ($stmt->execute()) {
        header('Location: ../pages/view_feedback.php');
        $stmt->close();
        $conn->close();
        exit();
    } else {
        $_SESSION['error'] = 'Error updating feedback: ' . $stmt->error;
        header('Location: ../pages/feedback.php');
        $stmt->close();
        $conn->close();
        exit();
    }



} else {
    header('Location: ../pages/feedback.php');
    exit();
}


?>