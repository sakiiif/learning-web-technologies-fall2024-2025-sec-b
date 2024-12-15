


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome 
    <?php
    session_start();
    echo $_SESSION['user']['name'] ;
     ?>
     
    </h1><br>
    <a href="profile.php">Profile</a><br>
    <a href="change_password.php">change password</a><br>
    <a href="view_user.php">view user</a><br>
    <a href="logout.php">logout</a>
    
    

</body>
</html>
