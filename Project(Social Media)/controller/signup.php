
<?php

session_start();
require_once('../model/usermodel.php');
/*if (isset($_POST['login'])) {
  header("location: ../login.php");
}*/

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
// Get the raw POST data
  $input = file_get_contents('php://input'); //**** 

    // Decode the JSON data
  $data = json_decode($input, true);

    // Check if the required fields are present
  if (isset($data['first_name']) && isset($data['last_name']) && isset($data['gender']) && isset($data['email']) && isset($data['password']) && isset($data['confirm_password']) ) {
        $first_name = htmlspecialchars($data['first_name']); // Sanitize input
        $last_name = htmlspecialchars($data['last_name']); // Sanitize input
        $gender = htmlspecialchars($data['gender']); // Sanitize input
        $email = htmlspecialchars($data['email']); // Sanitize input
        $password = htmlspecialchars($data['password']); // Sanitize input
        $confirm_password = htmlspecialchars($data['confirm_password']); // Sanitize input

        // Perform any additional processing (e.g., saving to a database)
        // For demonstration purposes, we return a success message

        $user_id = rand(1, 100000000);
        while (!isunique($user_id)) {
          $user_id = rand(1, 100000000);
        }

        if (!isunique_email($email)) {
          //echo "This Email is already registered";
          echo json_encode([
            'status' => 'error',
            'message' => 'This Email is already registered! Provide a new one.',
          ]);
          exit;
        }
        else {
          $status = addUser($first_name, $last_name, $user_id, $gender, $email, $password);
          if ($status) {
            echo json_encode([
              'status' => 'success',
              'message' => "Registration Successful!",
            ]);
            exit;
            } 
            else {
              echo json_encode([
                'status' => 'error',
                'message' => 'Some Error occured! Try agin..',
              ]);
              exit;
            }
        }
    } 
    else {
        // If required fields are missing, return an error response
      echo json_encode([
          'status' => 'error',
          'message' => 'Invalid input. Please provide all fields.',
      ]);
      exit;
    }
} 
?>