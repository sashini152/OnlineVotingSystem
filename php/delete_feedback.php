<?php
session_start();

$data = json_decode(file_get_contents("php://input"));


include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "DELETE FROM feedback WHERE id=?";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header('Location: ../pages/view_feedback.php');
        $stmt->close();
        $conn->close();
        exit();
    } else {
        $_SESSION['error'] = 'Error deleting feedback: ' . $stmt->error;
        header('Location: ../pages/view_feedback.php');
        $stmt->close();
        $conn->close();
        exit();
    }


} else {
    header('Location: ../pages/view_feedback.php');
    exit();
}
?>