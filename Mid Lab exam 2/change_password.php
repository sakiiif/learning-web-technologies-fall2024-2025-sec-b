<?php
session_start();
if(isset($_POST['change']))
{
    if($_POST['new_password']!=$_POST['confirm_new_password'])
    {
        echo "password does not match";
    }
    else
    {
        $_SESSION['user']['password']=$_POST['cur_password'];
        echo"password changed successfully";
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
    <form action="" method="POST">
        <label for="password" name="cur_password">CURRENT PASSWORD</label><br>
        <input type="text" name="cur_password"><br>
        <label for="password" name="new_password">NEW PASSWORD</label><br>
        <input type="text" name="new_password"><br>
        <label for="confirm_password" name="confirm_new_password">CONFIRM NEW PASSWORD</label><br>
        <input type="text" name="confirm_new_password"><br>
        <button type="submit" name="change">change</button>
        <a href="home.php">home</a>
    </form>

</body>
</html>
