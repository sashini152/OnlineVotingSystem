<?php
include 'config.php';

$successAlert = '';
$errorAlert = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $errorAlert = "Email already exists.";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            header("Location: ../pages/login.php");
            exit();
        } else {
            $errorAlert = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>