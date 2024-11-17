<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $email = $_SESSION['email'];

    $sql = "DELETE FROM users WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        session_unset();
        session_destroy();
        header("location: ../pages/login.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>