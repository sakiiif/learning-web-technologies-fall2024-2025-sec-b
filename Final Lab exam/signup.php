<?php
require_once('db.php');
if(isset($_POST['register']))
{

    register($_POST['name'],$_POST['contact'],$_POST['username'],$_POST['password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>register</h1>
    <form action="" method="POST">
        <label for="">name</label><br>
        <input type="text" name="name"><br>
        <label for="">contact</label><br>
        <input type="text" name="contact"><br>
        <label for="">username</label><br>
        <input type="text" name="username"><br>
        <label for="">password</label><br>
        <input type="password" name="password"><br>
        <button name="register">register</button>
    </form>
    <form action="login.php">
        <button name=''login>login</button>
    </form>
    
</body>
</html>
