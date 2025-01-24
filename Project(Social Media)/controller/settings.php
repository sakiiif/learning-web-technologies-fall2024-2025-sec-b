<?php
session_start();
require_once('../model/usermodel.php');
$email = $_COOKIE['email'];
$user_id = get_user_id($email);
$cur_pass = cur_password($user_id);
//var_dump($cur_pass);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input'); 
    $data = json_decode($input, true); 

    if (isset($data['current_password']) && isset($data['new_password'])) {
        $current_password = htmlspecialchars($data['current_password']);
        if ($cur_pass !== $current_password) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Current password doesn\'t match',
            ]);
            exit;
        } else {
            $new_password = htmlspecialchars($data['new_password']);
            if (change_password($user_id, $new_password)) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Password change successful',
                ]);
                exit;
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to change password',
                ]);
                exit;
            }
        }
    }
    if(isset($data['first_name']))
    {
        $fname = htmlspecialchars($data['first_name']);
        $status=change_first_name($user_id, $fname);
        if($status)
        {
            echo json_encode([
                'status' => 'success',
                'message' => 'first name change successful',
            ]);
            exit;
        }
        else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to change first name',
            ]);
            exit;
        }
    }
    if(isset($data['last_name']))
    {
        $lname = htmlspecialchars($data['last_name']);
        $status=change_last_name($user_id, $lname);
        if($status)
        {
            echo json_encode([
                'status' => 'success',
                'message' => 'first name change successful',
            ]);
            exit;
        }
        else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Failed to change first name',
            ]);
            exit;
        }
    }
}
/*
if (isset($_POST['change_first_name'])) {
    $first_name = $_POST['first_name'];
    change_first_name($user_id, $first_name);
    echo "success";

}

if (isset($_POST['change_last_name'])) {
    $last_name = $_POST['last_name'];
    change_last_name($user_id, $last_name);
    echo "success";
}
*/
if (isset($_POST['change_email'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    change_email($user_id, $email);
    $email = $_SESSION['email'];
    setcookie("email", $email, time() + (3600), "/");
    echo "success";
}

?>

