<?php 
include('cnx.php');

$sql = "SELECT * FROM user_info WHERE first_name LIKE '%" . $_POST['name'] . "%'";
$array = $cnx->query($sql);

foreach ($array as $key) {
?>
    <div id="user">
        <img width="50" height="50" src="uploads\<?php echo $key['image']; ?>" id="pic" />
        &nbsp;
        <span><?php echo $key['first_name'] . ' ' . $key['last_name']; ?></span>
       
        <button onclick="redirectToProfile('<?php echo $key['user_id']; ?>')">View Profile</button>
    </div>
<?php
}
?>
<script>
    function redirectToProfile(userId) {
      
        if (userId) {
            window.location.href = 'viewprofile.php?user_id=' + userId;
        } else {
            alert('Invalid user ID');
        }
    }
</script>