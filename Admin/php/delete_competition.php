<?php
include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;

$sql = "DELETE FROM events WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(array("message" => "Competition deleted successfully"));
} else {
    echo json_encode(array("error" => "Error deleting competition"));
}

$stmt->close();
$conn->close();
?>