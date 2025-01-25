<?php
session_start();
require_once('../model/usermodel.php');
$email = $_COOKIE['email'];
$first = get_first_name($email);
$last = get_last_name($email);
$name = $first . " " . $last;
$user_id = get_user_id($email);

$arr = show_status($user_id);

if (isset($_POST['post'])) {


    $status = $_POST['status'];
    $photo = $_POST['photo'];
    
    post_status($user_id, $status, $photo);
    header("Location: " . $_SERVER['PHP_SELF']);
     exit();
    

}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    delete_status($id);
    header("Location: " . $_SERVER['PHP_SELF']);

}

$arr1 = show_friends($user_id);
if ($arr1 !== NULL)
    $arr1 = unique_arr($arr1);
//var_dump($arr1);

if (isset($_POST['view_profile_btn'])) {
    $friend_user_id = $_POST['friend_user_id'];
    $_SESSION['friend_user_id'] = $friend_user_id;
    header('location: viewprofile.php');
}

if(isset($_POST['profile_photo_btn']))
{
    $profile_pic=$_POST['profile_photo'];
    update_profile_picture($user_id,$profile_pic);

}

$profile_pic_url=show_profile_pic($user_id);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../view/profile.css">
</head>

<body>
    <form method ="post" action="#">
           <input type="text" name="search" id="search" placeholder="SEARCH">
    </form>
    <div id="back_result"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#search').keyup(function(){

                var name= $(this).val();

                $.post('../model/get_users.php', {name:name}, function(data){
                      
                    $('div#back_result').css({'display':'block'});
                     $('div#back_result').html(data);

                });

            });

        });
    </script>

    <div class="profile-header">
        <div class="cover-photo"></div>
        
        <img src="../Asset/<?php echo $profile_pic_url; ?>" Profile Picture class="profile-picture">
        <form action="" method="POST">
            <input type="file" name="profile_photo" accept="image/*">
            <button type="submit" name="profile_photo_btn">Upload</button>
        </form>
        <h1><?php echo "$name" ?></h1>
    </div>

    <div class="nav-bar">
        <a href="timeline.php">Timeline</a>
        <a href="about.php">About</a>
        <a href="friends.php">Friends</a>
        <a href="photos.php">Photos</a>
        <a href="../view/settings.html">Settings</a>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>

    <div class="container">
        <div class="left-sidebar">
            <h2 class="friends-heading">Friends</h2>
            <ul>
                <?php
                if (!empty($arr1)) {

                    for ($i = 0; $i < count($arr1); $i++) {
                        if ($user_id != $arr1[$i][0]) {
                            echo '<li>';
                            echo '<div class="friend-info">' . $arr1[$i][1] . ' ' . $arr1[$i][2] . '</div>';
                            echo '<form action="" method="POST" style="display:inline;">
                                    <input type="hidden" name="friend_user_id" value="' . $arr1[$i][0] . '">
                                    <button type="submit" name="view_profile_btn" class="friend-request-btn">View Profile</button>
                                </form>';
                            echo '</li>';
                        }

                    }


                }
                ?>
            </ul>

        </div>


        <div class="main-content">
            <div class="status">
                <form action="" method="POST">
                    <textarea rows="3" name="status" placeholder="What's on your mind?"></textarea>
                    <input type="file" name="photo" accept="image/*">
                    <button name="post">Post</button>
                </form>
            </div>

            <?php
            if (!empty($arr) && count($arr) > 0) {
                $n = count($arr);
                for ($i = $n - 1; $i >= 0; $i--) {
                    if (isset($arr[$i][1], $arr[$i][2])) {
                        echo '<div class="post">';
                        echo "<h2>$name</h2>";
                        if($arr[$i][3]!=NULL)
                        {
                            echo '<img src="../Asset/'. $arr[$i][3] . '" width="350" height="200">';
                        }
                        if($arr[$i][1]!=NULL)
                        {
                             echo "<p>" . $arr[$i][1] . "</p>";
                        }
                       
                        echo '<div class="timestamp">Posted on ' . $arr[$i][2] . '</div>';
                        echo '
                            <form action="" method="POST" style="display: inline;">
                                 <input type="hidden" name="id" value="' . $arr[$i][0] . '">
                                <button name="edit">Edit</button>
                            </form>
                            <form action="" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="' . $arr[$i][0] . '">
                                <button name="delete">Delete</button>
                            </form>';
                        echo '</div>';

                    }
                }
            }
            ?>

        </div>
    </div>


</body>

</html>