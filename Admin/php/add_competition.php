<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    $sql = "INSERT INTO events (title, date, description) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $date, $description);

    if ($stmt->execute()) {
        echo "<script>alert('competition added  successfully !.'); window.location.href='../competitions.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>