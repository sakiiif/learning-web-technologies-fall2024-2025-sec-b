
<?php

//header('Content-Type: application/json');

session_start();
require_once('usermodel.php');
if (isset($_POST['login'])) {
  header("location: login.php");
}
//$_SERVER['REQUEST_METHOD'] === 'POST'  isset($_POST['submit'])
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
// Get the raw POST data
  $input = file_get_contents('php://input'); //**** 

    // Decode the JSON data
  $data = json_decode($input, true);

    // Check if the required fields are present
  if (isset($data['first_name']) && isset($data['last_name']) && isset($data['gender']) && isset($data['email']) && isset($data['password']) && isset($data['confirm_password']) ) {
        $fname = htmlspecialchars($data['first_name']); // Sanitize input
        $lname = htmlspecialchars($data['last_name']); // Sanitize input
        $gender = htmlspecialchars($data['gender']); // Sanitize input
        $email = htmlspecialchars($data['email']); // Sanitize input
        $name = htmlspecialchars($data['password']); // Sanitize input
        $name = htmlspecialchars($data['confirm_password']); // Sanitize input

        // Perform any additional processing (e.g., saving to a database)
        // For demonstration purposes, we return a success message

        $user_id = rand(1, 100000000);
        while (!isunique($user_id)) {
          $user_id = rand(1, 100000000);
        }

        if (!isunique_email($email)) {
          //echo "This Email is already registered";
          echo json_encode([
            'status' => 'error',
            'message' => 'This Email is already registered! Provide a new one.',
          ]);
        }
        else {
          $status = addUser($first_name, $last_name, $user_id, $gender, $email, $password);
          if ($status) {
            echo json_encode([
              'status' => 'success',
              'message' => "Registration Successful!",
            ]);
            header('location: login.php');
            } 
            else {
              //echo "signed up!";
              echo json_encode([
                'status' => 'error',
                'message' => 'Some Error occured! Try agin..',
              ]);
              header('location: signup.php');
            }
        }
    } 
    else {
        // If required fields are missing, return an error response
      echo json_encode([
          'status' => 'error',
          'message' => 'Invalid input. Please provide all fields.',
      ]);
    }
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WebBook Sign Up</title>
  
  <link rel="stylesheet" href="signup.css">
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
      <h3 id="response">dssdsd<h3>
      <h2>Sign up To WebBook</h2>
      <form name="signupForm" id="signupForm" >

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

      <!--  <input type="submit" name="submit" class="signup-btn" value="Sign Up"> -->
        <button type="submit" name="submit" class="signup-btn">Sign Up</button>

      </form>
    </div>
  </div>
  <script src="form_validation.js"></script>
</body>

</html>
