<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>StarGlow</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7;
            background-image: url('../images/image4.jpg');
        }

        .login-form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="email"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: none;
            background-color: #5c67f2;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4a54e1;
        }
    </style>
</head>

<body>
    <div class="login-form">
        <center>
            <h1>Login Here ...</h1>
        </center>
        <form action="../php/login.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login" style=" background-color: #b903fb;">
        </form>
        <a href="register.php" <center>
            <h3>Dont you have account register now!</h3>
            </center>
        </a>
    </div>
</body>

</html>