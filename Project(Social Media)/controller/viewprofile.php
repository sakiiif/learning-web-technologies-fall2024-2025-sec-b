<?php
session_start();
require_once('../model/usermodel.php');
$email = $_COOKIE['email'];//email of currently logged in person
$user_id = $_SESSION['friend_user_id'];
$first = first_name_($user_id);
$last = last_name_($user_id);
$name = $first . " " . $last;

$arr = show_status($user_id);

$arr1 = show_friends($user_id);
if ($arr1 !== NULL)
    $arr1 = unique_arr($arr1);


if (isset($_POST['view_profile_btn'])) {

    $friend_user_id = $_POST['friend_user_id'];
    $_SESSION['friend_user_id'] = $friend_user_id;
    header('location: viewprofile.php');

}

$cur_logged_in_user_id = get_user_id($email);
$arr2 = show_friends($cur_logged_in_user_id);
if ($arr2 !== NULL)
{
    $arr2 = unique_arr($arr2);
}

$mutual_arr = [];

for ($i = 0; $i < count($arr1); $i++) {
    for ($j = 0; $j < count($arr2); $j++) {
        if ($arr1[$i][0] == $arr2[$j][0]) {
            $mutual_arr[] = $arr1[$i];
        }
    }
}
if ($mutual_arr !== NULL)
  {

     $mutual_arr = unique_arr($mutual_arr);
 } 
//var_dump($mutual_arr);

$profile_pic_url=show_profile_pic($user_id);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/viewprofile.css">
</head>

<body>
    <div class="profile-header">
        <div class="cover-photo"></div>
        <img src="../Asset/<?php echo $profile_pic_url; ?>" Profile Picture class="profile-picture">
        <h1><?php echo "$name" ?></h1>
    </div>

    <div class="nav-bar">
        <a href="about.php">About</a>
        <a href="profile.php">My Profile</a>
        <a href="timeline.php">Timeline</a>
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
            <h2 class="friends-heading">Mutual Friends</h2>
            <ul>
                <?php
                if (!empty($mutual_arr)) {

                    for ($i = 0; $i < count($mutual_arr); $i++) {
                        if ($user_id != $mutual_arr[$i][0]) {
                            echo '<li>';
                            echo '<div class="friend-info">' . $mutual_arr[$i][1] . ' ' . $mutual_arr[$i][2] . '</div>';
                            echo '<form action="" method="POST" style="display:inline;">
                                    <input type="hidden" name="friend_user_id" value="' . $mutual_arr[$i][0] . '">
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

                        echo '</div>';

                    }
                }
            }
            ?>

        </div>
    </div>


</body>

</html>