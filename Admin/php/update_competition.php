<?php
include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$title = $data->title;
$date = $data->date;
$description = $data->description;

$sql = "UPDATE events SET title='$title', date='$date', description='$description' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Competition updated successfully !.'); window.location.href='../admindashboard.php';</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>