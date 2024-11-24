<?php

session_start();
$flag=1;
if(isset($_SESSION['name']) && !empty($_SESSION['name'])){
 $flag=0;

}
if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    $flag=0;
   
   }
   if(isset($_SESSION['phone']) && !empty($_SESSION['phone'])){
    $flag=0;
   
   }
   if(isset($_SESSION['password']) && !empty($_SESSION['password'])){
    $flag=0;
   
   }
   if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
    $flag=0;
   
   }

   if(isset($_SESSION['emal']) && !empty($_SESSION['email'])){
    $flag=0;
   
   }
   if($flag==1){
    header("Location: reg.php");
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
    
</body>
</html>
