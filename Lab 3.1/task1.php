<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['submit_name']))
    {
        session_unset();
        $_SESSION['name']=$_POST['name'];
        header("Location: handler.php");
    }
    else if(isset($_POST['submit_email']))
    {
        session_unset();
        $_SESSION['email']=$_POST['email'];
        header("Location: handler.php");
    }
    elseif(isset($_POST['submit_dob']))
    {
        if(isset($_POST['dd']) && isset($_POST['mm']) && isset($_POST['yyyy']))
        {
            session_unset();
            $_SESSION['dd']=$_POST['dd'];
            $_SESSION['mm']=$_POST['mm'];
            $_SESSION['yyyy']=$_POST['yyyy'];
            header("Location: handler.php");
            
        }
    }
    elseif(isset($_POST['gender']))
    {
        session_unset();
        $_SESSION['gender']=$_POST['gender'];
        header("Location: handler.php");

    }
    elseif(isset($_POST['submit_degree']))
    {
        session_unset();
        $_SESSION['degree']=$_POST['degree'];
        header("Location: handler.php");
    }
    elseif(isset($_POST['submit_blood_group']))
    {
        session_unset();
        $_SESSION['blood_group']=$_POST['blood_group'];
        header("Location: handler.php");
    }
    
}
if(isset($_SESSION['name']))
{
    echo "last entered name: " . $_SESSION['name'];
    echo "<br>";
}
if(isset($_SESSION['email']))
{
    echo "last entered email: " . $_SESSION['email'];
    echo "<br>";
}
if(isset($_SESSION['dd']) && isset($_SESSION['mm']) && isset($_SESSION['yyyy']))
{
    echo "last entered Date of birth: " . $_SESSION['dd'] . "/" . $_SESSION['mm'] . "/" . $_SESSION['yyyy'];
    echo "<br>";
}if(isset($_SESSION['gender']))
{
    echo "last entered gender: " . $_SESSION['gender'];
    echo "<br>";
}
if(isset($_SESSION['degree']))
{
     echo "last entered degrees: <br>";
    for($i=0;$i<count($_SESSION['degree']);$i++)
    {
        echo $_SESSION['degree'][$i] . "<br>";
    }
    echo "<br>";
}
if(isset($_SESSION['blood_group']))
{
    echo "last entered Blood Group: " . $_SESSION['blood_group'];
    echo "<br>";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab3.1</title>
</head>
<body>
    <form method="POST" action="">
        <label for="name">NAME</label><br>
        <input type="text" name="name"><br>
        <button tupe="submit" name="submit_name">Submit</button>
    </form>
    <form method="POST" action="">
        <label for="email">Email</label><br>
        <input type="text" name="email"><br>
        <button tupe="submit" name="submit_email">Submit</button>
    </form>
    <form method="POST" action="">
        
        <table>
            <th>DATE OF BIRTH</th>
            <tr>
                <td>
                    <label for="dd">dd</label><br>
                    <input type="text" name="dd"><br>
                </td>
                <td>
                    <label for="mm">mm</label><br>
                    <input type="text" name="mm"><br>
                </td>
                <td>
                    <label for="yyyy">yyyy</label><br>
                    <input type="text" name="yyyy"><br>  
                </td>
            </tr>
        </table>

        <button tupe="submit" name="submit_dob">Submit</button>
    </form>
    <form action="" method="POST">
        <table>
            <th>GENDER</th>
            <tr>
                <td>
                    <label for="male">Male</label>
                    <input type="radio" name="gender" value="Male">
                </td>
                <td>
                    <label for="female">Female</label>
                    <input type="radio" name="gender" value="Female">
                </td>
                <td>
                    <label for="other">Other</label>
                    <input type="radio" name="gender" value="Other">
                </td>
            </tr>
        </table>
        
        <button tupe="submit" name="submit_gender">Submit</button>
    </form>
    <form action="" method="POST">
        <table>
            <th>DEGREE</th>
            <tr>
                <td>
                    <label for="ssc">SSC</label>
                    <input type="checkbox" name="degree[]" value="SSC">
                </td>
                <td>
                    <label for="hsc">HSC</label>
                    <input type="checkbox" name="degree[]" value="HSC">
                </td>
                <td>
                    <label for="BSc">BSc</label>
                    <input type="checkbox" name="degree[]" value="BSc">
                </td>
                <td>
                    <label for="MSc">MSc</label>
                    <input type="checkbox" name="degree[]" value="MSc">
                </td>
            </tr>
        </table>
        <button type="submit" name="submit_degree">Submit</button>
    </form>
    <form action="" method="POST">
        <label for="blood_group" name="blood_group">BLOOD GROUP</label><br>
        <select name="blood_group" id="blood_group">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select><br>
        <button type="Submit" name="submit_blood_group">Submit</button>
    </form>

</body>
</html>

