
<?php
session_start();
require_once('../model/usermodel.php');
$email = $_COOKIE['email'];
$user_id = get_user_id($email);
$photos_arr=get_photo_by_user_id($user_id);
$photos_arr=unique_arr($photos_arr);
//var_dump($photos_arr);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
    <link rel="stylesheet" href="../view/photos.css">
</head>
<body>
<a href="profile.php" class="back-button">back</a>

    <h1>Photo Gallery</h1>
    <div class="gallery">
    <?php
    if (!empty($photos_arr)) {
        for ($i = 0; $i < count($photos_arr); $i++) {
            echo '<img src="../Asset/' . $photos_arr[$i][0]. '" width="300" height="150">';
        }
    } else {
        echo '<p>No photos available.</p>';
    }
    ?>
        
    </div>
    
</body>
</html>
