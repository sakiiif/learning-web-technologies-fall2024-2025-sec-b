<?php

session_start();
require_once('../model/usermodel.php');
$email = $_COOKIE['email'];
$user_id = get_user_id($email);
if ( $_SERVER['REQUEST_METHOD'] === 'POST' )
{
    
    // Decode the JSON data
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
   
    if (!empty($data['dob']) && !empty($data['city']) && !empty($data['bio']) && !empty($data['address']) && !empty($data['relationship']) && !empty($data['country']) && !empty($data['edu'])) 
    {
        $dob =  htmlspecialchars($data['dob']);
        $city = htmlspecialchars($data['city']);
        $bio = htmlspecialchars($data['bio']);
        $address = htmlspecialchars($data['address']);
        $relationship =  htmlspecialchars($data['relationship']);
        $country =  htmlspecialchars($data['country']);
        $edu =  htmlspecialchars($data['edu']);
    
        
        $status=update_about($user_id,$dob,$city,$bio,$address,$relationship,$country,$edu);
        if($status)
        {
            
            echo json_encode([
                'status' => 'success',
                'message' => 'updated successfuly',
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
    else {
        echo json_encode(['status' => 'error', 'message' => 'Incomplete data']);
        exit;
    }
}

$about=show_about_info($user_id);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>
    <link rel="stylesheet" href="../view/about.css">
</head>
<body>
    <a href="profile.php">Back</a>

     <h2>About Information</h2>
        <p id="dob_info"><strong>Date of Birth:</strong> <?php echo htmlspecialchars($about[0][0]); ?></p>
        <p id="city_info"><strong>City:</strong> <?php echo htmlspecialchars($about[0][1]); ?></p>
        <p id="bio_info"><strong>Bio:</strong> <?php echo htmlspecialchars($about[0][2]); ?></p>
        <p id="address_info"><strong>Address:</strong> <?php echo htmlspecialchars($about[0][3]); ?></p>
        <p id="relationship_info"><strong>Relationship Status:</strong> <?php echo htmlspecialchars($about[0][4]); ?></p>
        <p id="country_info"><strong>Country:</strong> <?php echo htmlspecialchars($about[0][5]); ?></p>
        <p id="edu_info"><strong>Education:</strong> <?php echo htmlspecialchars($about[0][6]); ?></p>

    <h5 id="response"></h5>
    <form id="about_form">
    <input type="text" id="dob" name="dob" placeholder="Date Of Birth DD-MM-YYYY"><br><br>
    <input type="text" id="city" name="city" placeholder="City"><br><br>
    <input type="text" id="bio" name="bio" placeholder="Bio"><br><br>
    <input type="text" id="address" name="address" placeholder="Address"><br><br>
    <input type="text" id="relationship" name="relationship" placeholder="Relationship"><br><br>
    <input type="text" id="country" name="country" placeholder="Country"><br><br>
    <input type="text" id="edu" name="edu" placeholder="Education"><br><br>
    <button type="submit" name="submit">Update</button>
</form>

    <script src="../view/about_form.js"></script>
</body>
</html>