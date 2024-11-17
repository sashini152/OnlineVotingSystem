<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_SESSION['email'];

    $sql = "UPDATE users SET name='$name' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        header("location: ../pages/profile.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>