<?php
session_start();

    if(isset($_POST['register']))
    {
        header("Location: reg.php");
    }
    if(isset($_POST['sign_in']))
    {
       if( $_SESSION['user']['id']==$_POST['id']  && $_SESSION['user']['password']==$_POST['password'])
       {

            $_SESSION['user']['flag']='1';
            header("Location: home.php");
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
<form action="" method="POST" >`
        <label for="ID" name="id">USER ID</label><br>
        <input type="text" name="id"><br>
        <label for="password" name="password">PASSWORD</label><br>
        <input type="text" name="password"><br>
        
        <button type="submit" name="sign_in">log in</button>
        <button type="submit" name="register">register</button>

    </form>
</body>
</html>
