<?php

require 'config.php';
$userFeedbacks = [];
if (isset($_SESSION['email'])) {
    $userEmail = $_SESSION['email'];
    $query = "SELECT * FROM feedback WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $userFeedbacks[] = $row;
        }
    }
    $stmt->close();
}
?>