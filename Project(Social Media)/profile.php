<?php
session_start();
require_once('usermodel.php');
$email = $_COOKIE['email'];
$first = get_first_name($email);
$last = get_last_name($email);
$name = $first . " " . $last;
$user_id = get_user_id($email);

$arr = show_status($user_id);

if (isset($_POST['post'])) {


    $status = $_POST['status'];
    if (!empty($status)) {
        post_status($user_id, $status);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

}
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    delete_status($id);
    header("Location: " . $_SERVER['PHP_SELF']);

}

$arr1 = show_friends($user_id);
if ($arr1 !== NULL)
    $arr1 = unique_arr($arr1);
var_dump($arr1);

if (isset($_POST['view_profile_btn'])) {
    $friend_user_id = $_POST['friend_user_id'];
    $_SESSION['friend_user_id'] = $friend_user_id;
    header('location: viewprofile.php');
}


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

        .search-bar {
            background-color: white;
            padding: 10px;
            display: flex;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .search-bar input {
            width: 50%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
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

        .status button:hover {
            background-color: #145dbf;
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

        .logout-button {
            padding: 15px 20px;
            text-decoration: none;
            color: #1877f2;
            font-weight: bold;
        }

        .logout-button:hover {
            background-color: #f0f2f5;
        }

        .friends-heading {
            color: blue;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="search-bar">
        <input type="text" placeholder="Search for people...">
    </div>

    <div class="profile-header">
        <div class="cover-photo"></div>
        <img src=" alt=" Profile Picture" class="profile-picture">
        <h1><?php echo "$name" ?></h1>
    </div>

    <div class="nav-bar">
        <a href="timeline.php">Timeline</a>
        <a href="about.php">About</a>
        <a href="friends.php">Friends</a>
        <a href="#photos">Photos</a>
        <a href="settings.php">Settings</a>
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
                        echo "<p>" . $arr[$i][1] . "</p>";
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
