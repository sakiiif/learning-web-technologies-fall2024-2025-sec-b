<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table >
        <th>profile</th>
        <tr>
            <td>ID</td>
            <td>
                <?php
                session_start();
                echo $_SESSION['user']['id'];
                ?>
            </td>
        </tr>
        <tr>
            <td>name</td>
            <td>
            <?php
                echo $_SESSION['user']['name'];
                ?>
            </td>
        </tr>
        <tr>
            <td>user type</td>
            <td>
            <?php
                echo $_SESSION['user']['user_type'];
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <a href="home.php">go home</a>
            </td>
        </tr>
    </table>
</body>
</html>
