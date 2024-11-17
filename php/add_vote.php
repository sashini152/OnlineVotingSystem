<?php
include 'config.php';

if (isset($_POST['vote'])) {
    $id = $_POST['id'];
    $sql = "UPDATE candidates SET votes = votes + 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Vote added successfully!";
    } else {
        echo "Error voting.";
    }
    $stmt->close();
    $conn->close();
}

header("Location: ../pages/leaderboard.php");