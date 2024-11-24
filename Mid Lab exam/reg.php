<?php
  session_start();
  if(isset($_POST['submit'])){
    $_SESSION['name']=$_POST['name'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['phone']=$_POST['phone'];
    $_SESSION['password']=$_POST['password'];
    header("Location: regvalid.php");

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
    <form action="" method="POST";>
    <label for="name" name="name">NAME</label><br>
    <input type="text" name="name"><br>
    <label for="email" name="email">EMAIL</label><br>
    <input type="text" name="email"><br>
    <label for="phone" name="phone">PHONE</label><br>
    <input type="text" name="phone"><br>
    <label for="password" name="password">PASSWORD</label><br>
    <input type="text" name="password"><br>
    <table>
        <th>GENDER</th>
        <tr>
            <td>
                <label for="male">MALE</label><br>
                <input type="radio" name="gender" value="male"><br>
            </td>
            <td>
            <label for="female">FEMALE</label><br>
            <input type="radio" name="gender" value="female"><br>
            </td>
            <td>
            <label for="other">OTHER</label><br>
            <input type="radio" name="gender" value="other"><br>
            </td>
</tr>
</table>
</form>
<button type="submit"> Submit </button>
</body>
</html>