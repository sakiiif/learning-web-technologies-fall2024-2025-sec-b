<?php
session_start();
require_once('../model/usermodel.php');
$email = $_COOKIE['email'];
$user_id = get_user_id($email);
$first = get_first_name($email);
$last = get_last_name($email);
$name = $first . " " . $last;
$arr = show_status($user_id);

if (isset($_POST['post'])) {


    $status = $_POST['status'];
    $photo = $_POST['photo'];
    
    post_status($user_id, $status, $photo);
    header("Location: " . $_SERVER['PHP_SELF']);
     exit();
    

}
if (isset($_POST['delete'])) {
    delete_status($_POST['id']);
    header("Location: " . $_SERVER['PHP_SELF']);

}
$arr1 = show_friends($user_id);//friends array holds user_id name
if ($arr1 !== NULL)
{
    $arr1 = unique_arr($arr1);
}
    

$arr1[] = [$user_id, $first, $last];
$all_status_arr = show_all_status();
//var_dump($all_status_arr);
$friend_status = [];

for ($i = 0; $i < count($arr1); $i++) {
    for ($j = 0; $j < count($all_status_arr); $j++) {
        if ($arr1[$i][0] == $all_status_arr[$j][1]) {
            $friend_status[] = $all_status_arr[$j];
        }
    }
}
usort($friend_status, function ($a, $b) {
    return $a[0] <=> $b[0]; });




if (isset($_POST['view_profile_btn'])) {
    $friend_user_id = $_POST['friend_user_id'];
    $_SESSION['friend_user_id'] = $friend_user_id;
    header('location: viewprofile.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST')//for comment
 {

    $input = file_get_contents('php://input'); //**** 

    $data = json_decode($input, true);

    if( isset($data['comment_text']) && isset($data['post_id']) ) { ///****#
        $comment_text= htmlspecialchars($data['comment_text']); // Sanitize input
        $post_id = htmlspecialchars($data['post_id']); 
        $now = date('Y-m-d H:i:s');

        post_comment($user_id, $post_id, $comment_text);

        echo json_encode([
            'status' => 'success',
            'message' => 'Comment successful!',
            'comment' => $comment_text,
            'name' => $name,
            'time' => $now,
          ]);
          exit;
    }

}
if (isset($_POST['share'])) {
    $post_id = $_POST['post_id'];
    $kar_post=get_user_id_by_post_id($post_id);
    $status_=get_status($post_id);

    $photo_=get_photo($post_id);
    $user_id = get_user_id($email);
    
    post_status($user_id, $status_, $photo_);
    header("Location: " . $_SERVER['PHP_SELF']);
     exit();

}

if (isset($_POST['delete_comment'])) {
    
    delete_comment($_POST['comment_id']);
    header("Location: " . $_SERVER['PHP_SELF']);

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>WebBook</title>
    <link rel="stylesheet" href="../view/timeline.css">
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
    <div class="header">
        <h1>WebBook</h1>
        <div class="search-box">
            <input type="text" placeholder="Search for People">
        </div>
        <a href="profile.php">
            <div class="profile-icon">
                <h4>
                    <?php
                    $s = substr($first, 0, 1);
                    $ss = substr($last, 0, 1);
                    echo "$s $ss";
                    ?>
                </h4>
            </div>
        </a>
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
            <form action="" method="POST">
                <textarea rows="3" name="status" placeholder="What's on your mind?"></textarea>
                <input type="file" name="photo" accept="image/*">
                <button name="post" class="post-button">Post</button>
            </form>

            <?php

            $n = count($friend_status);
            for ($i = $n - 1; $i >= 0; $i--) {

                echo '<div class="post">';
                $user_id_kar = $friend_status[$i][1];
                $first = first_name_($user_id_kar);
                $last = last_name_($user_id_kar);
                $name = $first . " " . $last;
                echo "<h2>$name</h2>";
                if($friend_status[$i][4]!=NULL)
                 {
                    echo '<img src="../Asset/'. $friend_status[$i][4] . '" width="350" height="200">';
                 }
                if($friend_status[$i][2]!=NULL)
                 {
                    echo "<p>" . $friend_status[$i][2] . "</p>";
                 }
                echo '<div class="timestamp">Posted on ' . $friend_status[$i][3] . '</div>';
                if ($user_id_kar == $user_id) {
                    echo '
                            <form action="" method="POST" style="display: inline;">
                                 <input type="hidden" name="id" value="' . $friend_status[$i][0] . '">
                                <button name="edit">Edit</button>
                            </form>
                            <form action="" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="' . $friend_status[$i][0] . '">
                                <button name="delete">Delete</button>
                            </form>';
                }
                echo '<br><br>';


                echo '<div class="comments">';
                $post_id = $friend_status[$i][0];
                $comments = get_comment($post_id);
                echo'<h5>comments</h5>';
                if (!empty($comments)) {

                    echo '<div class="post">';
                    $nn = count($comments);
                ?>
                <h6 id="nam" style="font-weight: bold;"></h6>
                <p id="com"></p>
                <h5 id="somoy"> </h5>
                <?php
                    for ($j = $nn - 1; $j >= 0; $j--) {

                        
                        $user_id_kar = $comments[$j][1];
                        $first = first_name_($user_id_kar);
                        $last = last_name_($user_id_kar);
                        $name = $first . " " . $last;
                        echo "<h6>$name</h6>";
                        echo "<p>" . $comments[$j][5] . "</p>";
                        echo '<h5>' . $comments[$j][4] . '</h5>';
                        if ($user_id_kar == $user_id) {
                            echo '  <form action="" method="POST" style="display: inline;">
                                    <input type="hidden" name="comment_id" value="' . $comments[$j][0] . '">
                                        <button name="delete_comment">Delete</button>
                                    </form>';
                        }
                    }
                }
                echo '</div>';
                echo '<form action="" method="POST" id="comment_form" style="margin-top:">
                       <textarea name="comment_text" id="comment_text" placeholder="Write a comment..."></textarea>
                       <input type="hidden" name="post_id" id="post_id" value="' . $friend_status[$i][0] . '">
                       <button type="submit" id="submit" name="comment">Comment</button>
                       <button type="share" id="share" name="share">Share</button>
                     </form>';
               

                echo '</div>';
                echo '<br><br>';
            }


            ?>
        </div>
    </div>
    <script src="comment.js"></script>
</body>

</html>