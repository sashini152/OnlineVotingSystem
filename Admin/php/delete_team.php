<?php
include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;

$sql = "DELETE FROM teams WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../admindashboard.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>