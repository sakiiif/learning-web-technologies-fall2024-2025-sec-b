<?php
session_start();
require_once('usermodel.php');
$email = $_COOKIE['email'];
$user_id = get_user_id($email);
$arr = show_all_user($user_id);
$arr2 = already_sent_friend_request($user_id);



$new_arr = [];//people you may know
if ($arr2 !== NULL) {
    $arr2 = array_unique($arr2);
    for ($i = 0; $i < count($arr); $i++)//all users - already sent friend req
    {
        if (!in_array($arr[$i][0], $arr2)) {
            $new_arr[] = $arr[$i];
        }
    }

} else {
    $new_arr = $arr;
}


$arr3 = get_friend_request($user_id);
if ($arr3 !== NULL) {
    $arr3 = unique_arr($arr3);

}





if (isset($_POST['friend_request'])) {
    $user_id_of_friend = $_POST['friend_user_id'];//jake friend request pathabo
    friend_request($user_id, $user_id_of_friend);
    header("Location: " . $_SERVER['PHP_SELF']);

}
if (isset($_POST['accept_friend_request'])) {
    $user_id_of_friend = $_POST['friend_user_id'];
    update_accepted($user_id, $user_id_of_friend);
    header("Location: " . $_SERVER['PHP_SELF']);

}
if (isset($_POST['reject_friend_request'])) {
    $user_id_of_friend = $_POST['friend_user_id'];
    update_rejected($user_id, $user_id_of_friend);
    header("Location: " . $_SERVER['PHP_SELF']);

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            text-align: center;
        }

        h1 {
            background-color: #6200ea;
            color: white;
            margin: 0;
            padding: 1rem 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: white;
            margin: 10px auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 200px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .friend-request-btn {
            background-color: #6200ea;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #6200ea;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <a href="profile.php" class="back-btn">Back</a>
    <h1>People You May Know</h1>
    <ul>
        <?php
        if (!empty($new_arr)) {
            for ($i = 0; $i < count($new_arr); $i++) {
                if (isset($new_arr[$i][0])) {
                    echo '<li>';
                    echo '<div class="friend-info">' . $new_arr[$i][1] . ' ' . $new_arr[$i][2] . '</div>';
                    echo '<form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="friend_user_id" value="' . $new_arr[$i][0] . '">
                            <button type="submit" name="friend_request" class="friend-request-btn">Send Friend Request</button>
                        </form>';
                    echo '</li>';

                }
            }
        }
        ?>

    </ul>
    <h1>friend requests</h1>
    <?php
    //$arr3=array_unique($arr3);
    if (!empty($arr3)) {
        for ($i = 0; $i < count($arr3); $i++) {

            echo '<li>';
            echo '<div class="friend-info">' . $arr3[$i][1] . ' ' . $arr3[$i][2] . '</div>';
            echo '<form action="" method="POST" style="display:inline;">
                        <input type="hidden" name="friend_user_id" value="' . $arr3[$i][0] . '">
                        <button type="submit" name="accept_friend_request" class="friend-request-btn">Accept Friend Request</button><br><br>
                        <button type="submit" name="reject_friend_request" class="friend-request-btn">Reject Friend Request</button>
                    </form>';
            echo '</li>';
        }


    }
    ?>

</body>

</html>
