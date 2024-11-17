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
        <a href="../leaderboard.php">Leaderboard</a>
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

            <form action="php/add_competition.php" method="post">
                <center>
                    <h1 style="color: black;">Add Competition</h1>
                </center>
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" required><br>

                <label for="date">Date:</label><br>
                <input type="date" id="date" name="date" required><br>

                <label for="description">Description:</label><br>
                <input type="text" id="description" name="description" required><br>

                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="team-list">
            <h2>Competition List</h2>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <?php
                include 'php/config.php';

                $sql = "SELECT * FROM events";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                    <td contenteditable='true' class='editable' data-id='{$row['id']}' data-field='title'>{$row['title']}</td>
                                    <td contenteditable='true' class='editable' data-id='{$row['id']}' data-field='date'>{$row['date']}</td>
                                    <td contenteditable='true' class='editable' data-id='{$row['id']}' data-field='description'>{$row['description']}</td>
                                    <td>
                                        <button onclick='updateCompetition({$row['id']})'>Update</button>
                                        <button onclick='deleteCompetition({$row['id']})'  style='margin-top:5px'>Delete</button>
                                    </td>
                                    </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No competitions found</td></tr>";
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
    function updateCompetition(id) {
        var title = document.querySelector("[data-field='title'][data-id='" + id + "']").innerText;
        var date = document.querySelector("[data-field='date'][data-id='" + id + "']").innerText;
        var description = document.querySelector("[data-field='description'][data-id='" + id + "']").innerText;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "php/update_competition.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                location.reload();
            }
        };
        xhr.send(JSON.stringify({
            id: id,
            title: title,
            date: date,
            description: description
        }));
    }

    function deleteCompetition(id) {
        var confirmation = confirm("Are you sure you want to delete this competition?");
        if (confirmation) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "php/delete_competition.php", true);
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