<?php
include 'config.php';

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$teamName = $data->teamName;
$numMembers = $data->numMembers;
$competitionName = $data->competitionName;
$captainsName = $data->captainsName;

$sql = "UPDATE teams SET team_name='$teamName', num_members='$numMembers', competition_name='$competitionName', captains_name='$captainsName' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Team updated successfully !.'); window.location.href='../admindashboard.php';</script>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>