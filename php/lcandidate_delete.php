<?php
session_start();
include 'config.php';

if (isset($_POST['delete'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT status FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($status);
    $stmt->fetch();
    $stmt->close();

    if ($status == 'admin') {
        $id = $_POST['id'];
        $sql = "DELETE FROM candidates WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['delete_message'] = "Candidate deleted successfully";
        } else {
            $_SESSION['delete_message'] = "Error deleting candidate";
        }
        $stmt->close();
        $conn->close();
    } else {
        $_SESSION['delete_message'] = "You do not have permission to delete";
    }
}


header("Location: ../pages/leaderboard.php");
?>