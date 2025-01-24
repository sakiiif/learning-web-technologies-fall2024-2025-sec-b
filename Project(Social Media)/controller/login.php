<?php
session_start();
require_once('../model/usermodel.php');
/*if (isset($_POST['signup'])) {
    header("location: signup.php");
}*/

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

      $input = file_get_contents('php://input'); //**** 
    
      $data = json_decode($input, true);
    
      if (isset($data['email']) && isset($data['password']) ) {

            $email = htmlspecialchars($data['email']); // Sanitize input
            $password = htmlspecialchars($data['password']); // Sanitize input

            $status = login($email, $password);
            if ($status) {
                setcookie("email", $email, time() + (3600), "/");

                echo json_encode([
                    'status' => 'success',
                    'message' => 'Login Succesful!',
                  ]);
                  exit;

            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Email and password did not match!',
                  ]);
                  exit;
            }
        } 
        else {
          echo json_encode([
              'status' => 'error',
              'message' => 'Invalid input. Please provide all fields.',
          ]);
          exit;
        }
    } 

?>
