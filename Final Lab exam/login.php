<?php
require_once('db.php');
if(isset($_POST['login']))
{

   $status= login($_POST['username'],$_POST['password']);
   if($status)
   {
        header("location:admin.php");
   }
   else
   {
    echo"incorect login cred";
   }
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
    <h1>login</h1>
    <form action="" method="POST">
        <label for="" >username</label><br>
        <input type="text" name="username"><br>
        
        <label for="" >password</label><br>
        <input type="password" name="password"><br>

        <button name="login">login</button>
    </form>
    <form action="signup.php">
        <button >signup</button>
    </form>
    
</body>
</html>
