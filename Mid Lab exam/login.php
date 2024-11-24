<?php
  session_start();
  if(isset($_POST['submit'])){
    $_SESSION['Lemail']=$_POST['email'];
    $_SESSION['Lpassword']=$_POST['password'];
    header("Location: loginvalid.php");

  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<label for="email" name="email">EMAIL</label><br>
<input type="text" name="email"><br>
<label for="password" name="password">PASSWORD</label><br>
<input type="text" name="password"><br>
<button type="submit"> Log In </button>
    
</body>
</html>