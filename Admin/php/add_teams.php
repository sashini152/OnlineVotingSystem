<?php

include 'config.php';

$team_name = $_POST['team-name'];
$num_members = $_POST['num-members'];
$competition_name = $_POST['competition-name'];
$captains_name = $_POST['captains-name'];

$sql = "INSERT INTO teams (team_name, num_members, competition_name, captains_name)
VALUES ('$team_name', '$num_members', '$competition_name', '$captains_name')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Team added successfully !.'); window.location.href='../admindashboard.php';</script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>