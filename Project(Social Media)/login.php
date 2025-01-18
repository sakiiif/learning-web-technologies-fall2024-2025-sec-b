<?php
session_start();
require_once('usermodel.php');
if (isset($_POST['signup'])) {
    header("location: signup.php");
}
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $status = login($email, $password);
    if ($status) {
        setcookie("email", $email, time() + (3600), "/");
        header("location: profile.php");
    } else {
        echo "user ID or password did not match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebBook Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5e9;
        }

        .header {
            background-color: #20c997;
            text-align: center;
            padding: 20px 0;
            color: white;
            font-size: 2rem;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        .signup-btn {
            background-color: #c39d31;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .signup-btn:hover {
            background-color: #a67f25;
        }

        .login-box {
            background-color: white;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
            color: #333;
            font-weight: bold;
        }

        .login-box input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .login-btn {
            background-color: #20c997;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
        }

        .login-btn:hover {
            background-color: #17a089;
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>WebBook</h1>
    </header>
    <div class="container">
        <form action="" method="POST">
            <button class="signup-btn" name="signup">SignUp</button>
        </form>
        <div class="login-box">
            <h2>Login To My WebBook</h2>
            <form method="POST">
                <input type="text" name="email" placeholder="email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login" class="login-btn">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
