<?php
session_start();
if(isset($_SESSION['name']))
{
    echo "Current entered : " . $_SESSION['name'];
}
elseif(isset($_SESSION['email']))
{
    echo "Current entered : " . $_SESSION['email'];
}
elseif(isset($_SESSION['dd']) && isset($_SESSION['mm']) && isset($_SESSION['yyyy']))
{
    echo "Date of birth: " . $_SESSION['dd'] . "/" . $_SESSION['mm'] . "/" . $_SESSION['yyyy'];
    echo "<br>";
}
elseif(isset($_SESSION['gender']))
{
    echo "Gender: " . $_SESSION['gender'];
    echo "<br>";
}
elseif(isset($_SESSION['degree']))
{
   // var_dump($_SESSION['degree']);
  // print_r($_SESSION['degree']);
  for($i=0;$i<count($_SESSION['degree']);$i++)
  {
    echo $_SESSION['degree'][$i] . "<br>";
  }
    echo "<br>";
}
elseif(isset($_SESSION['blood_group']))
{
    echo "Blood Group: " . $_SESSION['blood_group'] ;
    echo "<br>";
}



if($_SERVER['REQUEST_METHOD']=='POST')
{
    header("Location: task1.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>handler</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Handler page</h1>
    <button>go back</button>
    </form>
   
</body>
</html>