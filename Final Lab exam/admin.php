<?php
require_once('db.php');
$arr=show();
if(isset($_POST['delete']))
{
    $id=$_POST['emp_id'];
    delete($id);
    
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
    <h1>employee Information</h1>
    <?php
                if(!empty($arr))
                {
                    for ($i = 0; $i < count($arr); $i++) {
                        echo '<li>';
                        echo '<h4>Name: </h4>' . $arr[$i][1] . '<h4>Contact: </h4>' . $arr[$i][2];
                        echo   ' <form method="post">
                                    <input type="hidden" name="emp_id" value="' . $arr[$i][0] . '"> 
                                    <button type="submit" name="delete">Delete</button>
                                </form>';
                        echo '</li>';
                    }
                      
                        
                    
                    
                }
                ?>
</body>
</html>
