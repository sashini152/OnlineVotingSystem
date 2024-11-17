<?php
session_start();
include 'config.php';

if (isset($_POST['addCandidate'])) {

    if (isset($_SESSION['email'])) {
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
            $name = $_POST['name'];
            $sql = "INSERT INTO candidates (name) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $name);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                $_SESSION['success_message'] = "Candidate added successfully";
            } else {
                $_SESSION['error_message'] = "Error adding candidate";
            }
            $stmt->close();
            $conn->close();


            header("Location: ../pages/leaderboard.php");
            exit();
        } else {
            $_SESSION['error_message'] = "You do not have permission to add candidates";
        }
    } else {
        $_SESSION['error_message'] = "User not logged in";
    }
}


header("Location: ../pages/leaderboard.php");
?>