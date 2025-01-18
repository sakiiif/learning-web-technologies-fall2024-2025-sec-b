
<?php

// Set headers for JSON response
header('Content-Type: application/json');
/*
// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);


// Check if all fields are provided
if (isset($data['first_name'], $data['last_name'], $data['gender'], $data['email'], $data['password'], $data['confirm_password'] ) ) {
    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $gender = $data['gender'];
    $email = $data['email'];
    //$password = password_hash($data['password'], PASSWORD_BCRYPT); // Hash the password
    $password = $data['password'];
    $confirm_password = $data['confirm_password'];

    // now

    $user_id = rand(1, 100000000);
    while (!isunique($user_id)) {
      $user_id = rand(1, 100000000);
    }

    if (!isunique_email($email)) {
      //echo "This Email is already registered";
      echo json_encode(["message" => "This Email is already registered! Try a new one."]);
    } 
    else {
      $status = addUser($first_name, $last_name, $user_id, $gender, $email, $password);
      if ($status) {
        echo json_encode(["message" => "Registration successful!"]);
        //header('location: login.php');
      } 
      else {
        //echo "signed up!";
        //header('location: signup.php');
        echo json_encode(["message" => "Some Error occured!! Try again."]);
      }
    }
    /*
    // Database connection
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "your_database";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(["message" => "Database connection failed: " . $conn->connect_error]);
        exit();
    }

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Registration successful!"]);
    } else {
        echo json_encode(["message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
    
} 
else {
    echo json_encode(["message" => "Invalid input."]);
}
*/

/*
session_start();
require_once('usermodel.php');
if (isset($_POST['login'])) {
  header("location: login.php");
}

if (isset($_POST['submit'])) {
  $first_name = trim($_POST['ffirst_name']);
  $last_name = trim($_POST['flast_name']);
  $gender = trim($_POST['fgender']);
  $email = trim($_POST['femail']);
  $password = trim($_POST['fpassword']);
  $confirm_password = trim($_POST['fconfirm_password']);

  if ($password !== $confirm_password) {
    echo "Passwords do not match.";
  } else {
    $user_id = rand(1, 100000000);
    while (!isunique($user_id)) {
      $user_id = rand(1, 100000000);
    }

    if (!isunique_email($email)) {
      echo "This Email is already registered";
    } else {
      $status = addUser($first_name, $last_name, $user_id, $gender, $email, $password);
      if ($status) {
        header('location: login.php');
      } else {
        echo "signed up!";
        //header('location: signup.php');
      }
    }
  }
} <link rel="icon" href="favicon.ico" type="image/x-icon">
  <meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src 'self';">
*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WebBook Sign Up</title>
  
  <link rel="stylesheet" href="signup.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="container">
    <header>
      <h1><a href="login.php">WebBook</a></h1>
      <form action="" method="POST">
        <button name="login" class="login-btn">Login</button>
      </form>

    </header>
    <div class="signup-box">
      <h2>Sign up To WebBook</h2>
      <form action="" name="signupForm" method="POST">

        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>

        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>

        <input type="email" id="email" name="email" placeholder="Email" required>

        <input type="password" id="password" name="password" placeholder="Password" required>

        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>

        <button type="submit" name="submit" class="signup-btn">Sign Up</button>

      </form>
    </div>
  </div>
  <script src="form_validation.js"></script>
</body>

</html>
