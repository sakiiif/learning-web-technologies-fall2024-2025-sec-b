<?php


function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'webbook');
    return $conn;
}

function isunique($user_id)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="SELECT * FROM user_info WHERE user_id = '$user_id'";
    if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) 
    {
        return false;
    }
    else 
    {
        return true;
    }
    mysqli_close($conn); 
}
function isunique_email($email)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="SELECT * FROM user_info WHERE email = '$email'";
    if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) 
    {
        return false;
    }
    else 
    {
        return true;
    }
    mysqli_close($conn); 
}

function addUser($first_name, $last_name, $user_id, $gender, $email, $password) {
    
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $check_sql = "SELECT * FROM user_info WHERE user_id = '$user_id'";

   
        $sql = "INSERT INTO user_info (first_name, last_name, user_id, gender, email, password) 
                VALUES ('$first_name', '$last_name', '$user_id', '$gender', '$email', '$password')";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    

    mysqli_close($conn);
}

function login($email, $password){
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "select * from user_info where email='{$email}' and password='{$password}'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count ==1){
        return true;
    }else{
        return false;
    }
    mysqli_close($conn);
} 


function get_first_name($email)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $sql = "SELECT first_name FROM user_info WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['first_name'];
    } else {
        return null;
    }

    $conn->close();

}

function first_name_($user_id)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $sql = "SELECT first_name FROM user_info WHERE user_id = '$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['first_name'];
    } else {
        return null;
    }

    $conn->close();

}

function get_last_name($email)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $sql = "SELECT last_name FROM user_info WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['last_name'];
    } else {
        return null;
    }

    $conn->close();
}
function last_name_($user_id)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $sql = "SELECT last_name FROM user_info WHERE user_id = '$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['last_name'];
    } else {
        return null;
    }

    $conn->close();
}

function get_user_id($email)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    

    $sql = "SELECT user_id FROM user_info WHERE email = '$email'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['user_id'];
    } else {
        return null;
    }

    $conn->close();
}

function post_status($user_id,$status,$photo)
 {
    
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO statuses (user_id, status, time, photo_url) 
        VALUES ('$user_id', '$status', NOW(),'$photo')";
        
    if (mysqli_query($conn, $sql)) {
            return true;
    } else {
            return false;
    }
    

    mysqli_close($conn);
   
       
}

function show_status($user_id) 
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT id, status,time,photo_url FROM statuses WHERE user_id = $user_id";
    $result = $conn->query($sql);
    $arr=[];
    while ($row = $result->fetch_assoc()) 
    {
        $arr[]= array($row['id'], $row['status'],$row['time'],$row['photo_url']);
    }
    if(count($arr)>0)
    {
        usort($arr, function ($a, $b) { return $a[0] - $b[0];  });
        return $arr;
    }


}


function show_all_status()
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT id, user_id, status,time,photo_url FROM statuses";
    $result = $conn->query($sql);
    $arr=[];
    while ($row = $result->fetch_assoc()) 
    {
        $arr[]= array($row['id'],$row['user_id'], $row['status'],$row['time'],$row['photo_url']);
    }
    if(count($arr)>0)
    {
        return $arr;
    }
}


function delete_status($id)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "DELETE FROM statuses WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Post deleted successfully.";
    } else {
        echo "Error deleting post: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function show_all_user($user_id)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT user_id, first_name,last_name FROM user_info WHERE user_id != $user_id";
    $result = $conn->query($sql);
    $arr=[];
    while ($row = $result->fetch_assoc()) 
    {
        $arr[]= array($row['user_id'], $row['first_name'],$row['last_name']);
    }
    if(count($arr)>0)
    {
        return $arr;
    }
}

function friend_request($user_id,$user_id_of_friend)
 {
    
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $x=1;
        $sql = "INSERT INTO friends (user_id, friend_user_id,request) 
                VALUES ('$user_id', '$user_id_of_friend', $x )";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    

    mysqli_close($conn);
}

function already_sent_friend_request($user_id)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT friend_user_id FROM friends WHERE user_id = $user_id ";
    $result = $conn->query($sql);
    $arr=[];
    while ($row = $result->fetch_assoc()) 
    {
        $arr[]= $row['friend_user_id'];
    }
    if(count($arr)>0)
    {
        return $arr;
    }

}
function get_friend_request($user_id)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT 
            f.user_id, 
            ui.first_name, 
            ui.last_name 
        FROM 
            friends f
        JOIN 
            user_info ui ON f.user_id = ui.user_id
        WHERE 
            f.friend_user_id = $user_id 
            AND request=1";



    $result = $conn->query($sql);
    $arr=[];
    while ($row = $result->fetch_assoc()) 
    {
        $arr[]= array($row['user_id'], $row['first_name'],$row['last_name']);
    }
    if(count($arr)>0)
    {
        return $arr;
    }

 }

 function unique_arr($arr)
  {
    $unique_arr = [];
    $seen = [];

    foreach ($arr as $item) {
        if (!in_array($item[0], $seen)) {
            $seen[] = $item[0];  
            $unique_arr[] = $item; 
        }
    }

    return $unique_arr;
}

 function update_accepted($user_id,$user_id_of_friend)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

        $sql = "UPDATE friends 
        SET accepted = 1, request = 0 
        WHERE (user_id = $user_id_of_friend AND friend_user_id = $user_id) ";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    

    mysqli_close($conn);
 }

 function update_rejected($user_id,$user_id_of_friend)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

        $sql = "UPDATE friends 
        SET rejected = 1, request = 0 
        WHERE (user_id = $user_id_of_friend AND friend_user_id = $user_id) ";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    

    mysqli_close($conn);  
 }

 function show_friends($user_id)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT ui.user_id, ui.first_name, ui.last_name
    FROM (
    SELECT friend_user_id AS user_id
    FROM friends
    WHERE user_id = $user_id AND accepted = 1
    UNION
    SELECT user_id
    FROM friends
    WHERE friend_user_id = $user_id AND accepted = 1
    ) AS friends_list
    JOIN user_info ui ON friends_list.user_id = ui.user_id;";
    
    $result = $conn->query($sql);
    $arr=[];
    while ($row = $result->fetch_assoc()) 
    {
        $arr[]= array($row['user_id'], $row['first_name'],$row['last_name']);
    }
    if(count($arr)>0)
    {
        return $arr;
    }
    


 }





 function cur_password($user_id)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="SELECT password FROM user_info WHERE user_id = $user_id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        return $row['password'];
    }

    
 }

 function change_password($user_id,$new_password)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="UPDATE user_info SET password = '$new_password'  WHERE user_id = $user_id";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        return false;
    }
 }
 function change_first_name($user_id,$first_name)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="UPDATE user_info SET first_name = '$first_name' WHERE user_id = $user_id";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        return false;
    }
 }

 function change_last_name($user_id,$last_name)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="UPDATE user_info SET last_name = '$last_name' WHERE user_id = $user_id";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        return false;
    }
 }

 function change_email($user_id,$email)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="UPDATE user_info SET email = '$email' WHERE user_id = $user_id";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        
        return true;

    } else {
        mysqli_close($conn);
        return false;
    }
 }
 function post_comment($user_id, $post_id, $comment_text)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "INSERT INTO comments (post_id, user_id, comment_text , time) 
    VALUES ('$post_id', '$user_id', '$comment_text', NOW())";

    if (mysqli_query($conn, $sql)) {
    return true;
    } else {
    return false;
    }


    mysqli_close($conn);


 }

 function get_comment($post_id)
 {
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT 
    c.id, 
    c.user_id, 
    u.first_name, 
    u.last_name, 
    c.time,
    c.comment_text
    FROM 
        comments c
    JOIN 
        user_info u ON c.user_id = u.user_id
    WHERE 
        c.post_id = $post_id";


    $result = $conn->query($sql);
    $arr=[];
    while ($row = $result->fetch_assoc()) 
    {
        $arr[]= array($row['id'], $row['user_id'],$row['first_name'],$row['last_name'],$row['time'],$row['comment_text']);
    }
    if(count($arr)>0)
    {
        return $arr;
    }


 }

 function delete_comment($id)
 {
     $conn=getConnection();
     if(!$conn)
     {
         die("Connection failed: " . mysqli_connect_error());
     }
     $sql = "DELETE FROM comments WHERE id = $id";
     if (mysqli_query($conn, $sql)) {
         echo "deleted successfully.";
     } else {
         echo "Error deleting post: " . mysqli_error($conn);
     }
 
     mysqli_close($conn);
 }


 function get_user_id_by_post_id($post_id)
 {
    $conn=getConnection();
     if(!$conn)
     {
         die("Connection failed: " . mysqli_connect_error());
     }
     $sql="SELECT user_id from statuses where id=$post_id";
     if ($result) {
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        return $row['user_id']; 
    } else {
        mysqli_close($conn);
        return null; 
    }
 }
 function get_status($post_id)
 {
    $conn=getConnection();
     if(!$conn)
     {
         die("Connection failed: " . mysqli_connect_error());
     }
     $sql="SELECT status from statuses where id=$post_id";
     $result = mysqli_query($conn, $sql);
     if ($result) {
         $row = mysqli_fetch_assoc($result);
         mysqli_close($conn);
         return $row['status'];
     } else {
         mysqli_close($conn);
         return null; 
     }
 }
 function get_photo($post_id)
 {
    $conn=getConnection();
     if(!$conn)
     {
         die("Connection failed: " . mysqli_connect_error());
     }
     $sql="SELECT photo_url from statuses where id=$post_id";
     $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        return $row['photo_url'];
    } else {
        mysqli_close($conn);
        return null; 
    }
}

function get_photo_by_user_id($user_id)
 {
    $conn=getConnection();
     if(!$conn)
     {
         die("Connection failed: " . mysqli_connect_error());
     }
     $sql="SELECT photo_url from statuses where user_id=$user_id AND photo_url IS NOT NULL";
     $result = mysqli_query($conn, $sql);
     $arr=[];
     while ($row = $result->fetch_assoc()) 
     {
         $arr[]= array($row['photo_url']);
     }
     if(count($arr)>0)
     {
         return $arr;
     }
}

function update_profile_picture($user_id,$profile_pic)
{
    $conn=getConnection();
     if(!$conn)
     {
         die("Connection failed: " . mysqli_connect_error());
     }
     $sql="UPDATE user_info SET image = '$profile_pic' WHERE user_id = $user_id";
     $result = mysqli_query($conn, $sql);
     if($result)return true;
     else return false;
     mysqli_close($conn);
}


function show_profile_pic($user_id)
{
    $conn=getConnection();
     if(!$conn)
     {
         die("Connection failed: " . mysqli_connect_error());
     }
     $sql="SELECT image from user_info where user_id=$user_id";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_assoc($result);
        return $row['image'];
    } else {
        return null; 
    }
     
}

function update_about($user_id,$dob,$city,$bio,$address,$relationship,$country,$edu)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql="UPDATE user_info SET dob = '$dob', 
    city = '$city', 
    bio = '$bio', 
    address = '$address', 
    relationship = '$relationship', 
    country = '$country', 
    edu = '$edu'
    WHERE user_id = $user_id ";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
     if ($result) {
        return true;
    } else {
        return false;
    }
}

function show_about_info($user_id)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

   $sql= "SELECT dob, city, bio, address, relationship, country, edu FROM user_info WHERE user_id = $user_id";
   $result = mysqli_query($conn, $sql);
   $arr=[];
   while ($row = $result->fetch_assoc()) 
   {
       $arr[]= array($row['dob'], $row['city'],$row['bio'],$row['address'],$row['relationship'],$row['country'], $row['edu']);
   }
   if(count($arr)>0)
   {
       return $arr;
   }

}


?>