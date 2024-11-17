<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {

    header("location: login.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarGlow</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #b903fb;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;

            margin: 0 auto;

            border-collapse: collapse;
            background-color: #fff;

            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"] {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
            margin-right: 8px;
        }

        button[type="submit"] {
            padding: 8px 16px;
            background-color: #000;

            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #333;

        }

        .message {
            margin-top: 10px;
            text-align: center;
            font-size: 14px;
        }

        .success {
            color: white;
            background-color: black;
        }

        .error {
            color: white;
            background-color: black;
        }


        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <a href="welcome.php"><button class="back-button">Back</button></a>

    <h1>Candidates Leaderboard</h1>

    <?php
    if (isset($_SESSION['delete_message'])) {
        echo "<p class='message error'>{$_SESSION['delete_message']}</p>";
        unset($_SESSION['delete_message']);
    }

    // Check for success message
    if (isset($_SESSION['success_message'])) {
        echo "<p class='message success'>{$_SESSION['success_message']}</p>";
        unset($_SESSION['success_message']);
    }

    // Check for error message
    if (isset($_SESSION['error_message'])) {
        echo "<p class='message error'>{$_SESSION['error_message']}</p>";
        unset($_SESSION['error_message']);
    }
    ?>



    <form method="post" action="../php/lcandidate_add.php">
        <input type="text" name="name" required placeholder="Enter candidate name">
        <button type="submit" name="addCandidate">Add Candidate</button>
    </form>


    <?php
    include '../php/config.php';
    $sql = "SELECT * FROM candidates ORDER BY votes DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Name</th><th>Votes</th><th>Vote</th><th>Delete</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                  <td>{$row['name']}</td>
                  <td>{$row['votes']}</td>
                  <td><form method='post' action='../php/add_vote.php'><input type='hidden' name='id' value='{$row['id']}'><button type='submit' name='vote'>Vote</button></form></td>
                  <td><form method='post' action='../php/lcandidate_delete.php'><input type='hidden' name='id' value='{$row['id']}'><button type='submit' name='delete'>Delete</button></form></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='message'>No candidates found.</p>";
    }
    $conn->close();
    ?>
</body>

</html>