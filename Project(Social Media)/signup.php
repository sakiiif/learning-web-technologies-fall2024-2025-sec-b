<?php
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
      <h2>Sign up To WebBook</h2>
      <form action="" name="signupForm" onsubmit="return validateForm()" method="POST">

        <div class="formdesign" id="first_name">
          <input type="text" name="ffirst_name" placeholder="First Name" required><br><b><span class="formerror"> </span></b>
        </div>
        
        <div class="formdesign" id="last_name">
          <input type="text" name="flast_name" placeholder="Last Name" required><br><b><span class="formerror"> </span></b>
        </div>

        <label for="gender">Gender:</label>
        <div class="formdesign" id="gender">
          <select name="fgender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
          <br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="email">
          <input type="email" name="femail" placeholder="Email" required><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="password">
          <input type="password" name="fpassword" placeholder="Password" required><br><b><span class="formerror"> </span></b>
        </div>

        <div class="formdesign" id="confirm_password">
          <input type="password" name="fconfirm_password" placeholder="Confirm Password" required><br><b><span class="formerror"> </span></b>
        </div>

        <button type="submit" name="submit" class="signup-btn">Sign Up</button>

      </form>
    </div>
  </div>
  <script src="form_validation.js"></script>
</body>

</html>
