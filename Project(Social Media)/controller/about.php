<?php

session_start();
require_once('../model/usermodel.php');
$email = $_COOKIE['email'];
$user_id = get_user_id($email);
if ( $_SERVER['REQUEST_METHOD'] === 'POST' )
{
    $input = file_get_contents('php://input'); //**** 

  $data = json_decode($input, true);
  if ( isset($data['dob']) && isset($data['city']) && isset($data['bio']) && isset($data['address']) && isset($data['relationship']) && isset($data['country']) && isset($data['edu']) ) 
  {
    $dob = htmlspecialchars($data['dob']); 
    $city = htmlspecialchars($data['city']); 
    $bio = htmlspecialchars($data['bio']); 
    $address = htmlspecialchars($data['address']); 
    $relationship = htmlspecialchars($data['relationship']); 
    $country = htmlspecialchars($data['country']); 
    $edu = htmlspecialchars($data['edu']); 
    
    $status=update_about($user_id,$dob,$city,$bio,$address,$relationship,$country,$edu);
    if($status)
    {
        echo json_encode([
            'status' => 'success',
            'message' => 'About updated successful',
        ]);
        exit;
    }
    else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to update about',
        ]);
        exit;
    }
  }
}
?>
