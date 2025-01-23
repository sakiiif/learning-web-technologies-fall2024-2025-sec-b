<?php
session_start();
require_once('usermodel.php');
if (isset($_POST['signup'])) {
    header("location: signup.php");
}

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

      $input = file_get_contents('php://input'); //**** 
    
      $data = json_decode($input, true);
    
      if (isset($data['email']) && isset($data['password']) ) {

            $email = htmlspecialchars($data['email']); // Sanitize input
            $password = htmlspecialchars($data['password']); // Sanitize input

            $status = login($email, $password);
            if ($status) {
                setcookie("email", $email, time() + (3600), "/");

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Login Succesful!',
                  ]);
                  exit;
                //header("location: profile.php");
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Email and password did not match!',
                  ]);
                  exit;
            }
        } 
        else {
          echo json_encode([
              'status' => 'error',
              'message' => 'Invalid input. Please provide all fields.',
          ]);
          exit;
        }
    } 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebBook Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header class="header">
        <h1>WebBook</h1>
    </header>
    <div class="container">
        <form action="" method="post" >
            <button class="signup-btn" name="signup">SignUp</button>
        </form>
        <div class="login-box">
            <h2 id="response">erer</h2>
            <h2>Login To My WebBook</h2>
            <form id="loginForm" name="loginForm">
                <input type="text" id="email" name="email" placeholder="email" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit" name="login" class="login-btn">Login</button>
            </form>
        </div>
    </div>
    <script src="login.js"></script>
</body>

</html>
