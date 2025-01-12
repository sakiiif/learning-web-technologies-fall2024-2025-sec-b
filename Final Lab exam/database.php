<?php


function getConnection(){
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'shop');
    return $conn;
}

function register($name, $contact ,$username ,$password)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }


   
     $sql = "INSERT INTO user_info (name, contact, username, password) 
                VALUES ('$name', '$contact', '$username', '$password')";
        
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            return false;
        }
    

    mysqli_close($conn);

}
function login($username, $password){
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "select * from user_info where username='{$username}' and password='{$password}' and user_type='admin'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count ==1){
        return true;
    }else{
        return false;
    }
    mysqli_close($conn);
} 


function show()
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $user_type='employee';
    $sql = "SELECT id, name,contact FROM user_info WHERE user_type = '$user_type'";
    $result = $conn->query($sql);
    $arr=[];
    while ($row = $result->fetch_assoc()) 
    {
        $arr[]= array($row['id'], $row['name'],$row['contact']);
    }
    if(count($arr)>0)
    {
        return $arr;
    }


}

function delete($id)
{
    $conn=getConnection();
    if(!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "DELETE FROM user_info WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "Post deleted successfully.";
    } else {
        echo "Error deleting post: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
