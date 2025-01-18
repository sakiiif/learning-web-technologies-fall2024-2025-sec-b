<?php
session_start();
require_once('usermodel.php');
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
    $arr2 = unique_arr($arr2);

$mutual_arr = [];

for ($i = 0; $i < count($arr1); $i++) {
    for ($j = 0; $j < count($arr2); $j++) {
        if ($arr1[$i][0] == $arr2[$j][0]) {
            $mutual_arr[] = $arr1[$i];
        }
    }
}
if ($mutual_arr !== NULL)
    $mutual_arr = unique_arr($mutual_arr);

var_dump($mutual_arr);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #1c1e21;
            margin: 0;
        }

        .profile-header {
            position: relative;
            text-align: center;
            background-color: #f0f2f5;
            margin-bottom: 20px;
        }

        .cover-photo {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background-color: #ccc;
        }

        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid white;
            position: absolute;
            top: 150px;
            left: 50%;
            transform: translateX(-50%);
        }

        .profile-header h1 {
            margin-top: 70px;
            font-size: 24px;
        }

        .nav-bar {
            display: flex;
            justify-content: center;
            background-color: white;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }

        .nav-bar a {
            padding: 15px 20px;
            text-decoration: none;
            color: #1877f2;
            font-weight: bold;
        }

        .nav-bar a:hover {
            background-color: #f0f2f5;
        }

        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            gap: 20px;
        }

        .left-sidebar {
            width: 25%;
            background-color: white;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .left-sidebar h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .left-sidebar ul {
            list-style-type: none;
        }

        .left-sidebar ul li {
            margin-bottom: 10px;
        }

        .left-sidebar ul li a {
            text-decoration: none;
            color: #1877f2;
        }

        .main-content {
            width: 75%;
        }

        .status {
            background-color: white;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .status textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            outline: none;
            resize: none;
        }

        .status button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #1877f2;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }



        .post {
            background-color: white;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .post h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .post p {
            font-size: 14px;
            color: #606770;
        }

        .post .timestamp {
            font-size: 12px;
            color: #90949c;
            margin-top: 5px;
        }

        .friends-heading {
            color: blue;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="profile-header">
        <div class="cover-photo"></div>
        <img src="" alt="Profile Picture" class="profile-picture">
        <h1><?php echo "$name" ?></h1>
    </div>

    <div class="nav-bar">
        <a href="about.php">About</a>
        <a href="#photos">Photos</a>
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
                        echo "<p>" . $arr[$i][1] . "</p>";
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
