<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../pages/login.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location: ../pages/login.php");
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style2.css">

</head>

<body>

    <div class="navbar">
        <img src="logo.jpg" alt="Admin Logo">
        <a href="admindashboard.php">Teams</a>
        <a href="../pages/leaderboard.php">Leaderboard</a>
        <a href="competitions.php">Competitions</a>
        <div class="logout-button">
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo '<a href="?logout">Logout</a>';
            }
            ?>
        </div>
    </div>


    <div class="content">
        <h1>Welcome to the Admin Page</h1>
        <div class="form-container">

            <form action="php/add_teams.php" method="post">
                <center>
                    <h1 style="color: black;">Add Team Details</h1>
                </center>
                <label for="team-name">Team Name:</label><br>
                <input type="text" id="team-name" name="team-name" required><br>

                <label for="num-members">Number of Members:</label><br>
                <input type="number" id="num-members" name="num-members" required><br>

                <label for="competition-name">Competition Name:</label><br>
                <input type="text" id="competition-name" name="competition-name" required><br>

                <label for="captains-name">Captain's Name:</label><br>
                <input type="text" id="captains-name" name="captains-name" required><br>

                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="team-list">
            <h2>Team List</h2>
            <table>
                <tr>
                    <th>Team Name</th>
                    <th>Number of Members</th>
                    <th>Competition Name</th>
                    <th>Captain's Name</th>
                    <th>Actions</th>
                </tr>
                <?php
                include 'php/config.php';

                $sql = "SELECT * FROM teams";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                    <td contenteditable='true' class='editable' data-id='{$row['id']}' data-field='team_name'>{$row['team_name']}</td>
                                    <td contenteditable='true' class='editable' data-id='{$row['id']}' data-field='num_members'>{$row['num_members']}</td>
                                    <td contenteditable='true' class='editable' data-id='{$row['id']}' data-field='competition_name'>{$row['competition_name']}</td>
                                    <td contenteditable='true' class='editable' data-id='{$row['id']}' data-field='captains_name'>{$row['captains_name']}</td>
                                    <td>
                                        <button onclick='updateTeam({$row['id']})'>Update</button>
                                        <button onclick='deleteTeam({$row['id']})'>Delete</button>
                                    </td>
                                    </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No teams found</td></tr>";
                }
                $conn->close();
                ?>
            </table>
        </div>

    </div>

    <footer>
        <p>&copy; 2024 Admin Page</p>
    </footer>
</body>
<script>
    function updateTeam(id) {
        var teamName = document.querySelector("[data-field='team_name'][data-id='" + id + "']").innerText;
        var numMembers = document.querySelector("[data-field='num_members'][data-id='" + id + "']").innerText;
        var competitionName = document.querySelector("[data-field='competition_name'][data-id='" + id + "']").innerText;
        var captainsName = document.querySelector("[data-field='captains_name'][data-id='" + id + "']").innerText;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "php/update_team.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                location.reload();
            }
        };
        xhr.send(JSON.stringify({
            id: id,
            teamName: teamName,
            numMembers: numMembers,
            competitionName: competitionName,
            captainsName: captainsName
        }));
    }

    function deleteTeam(id) {
        var confirmation = confirm("Are you sure you want to delete this team?");
        if (confirmation) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "php/delete_team.php", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    location.reload();
                }
            };
            xhr.send(JSON.stringify({
                id: id
            }));
        }
    }
</script>

</html>