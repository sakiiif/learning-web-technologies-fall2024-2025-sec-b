<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['submit_name']))
    {
        $name=trim($_POST['name']);
        if(empty($name)) 
        {
            echo "Name cannot be empty.";
        } elseif(!preg_match("/^[a-zA-Z][a-zA-Z .-]*$/", $name))
        {
            echo "Name must start with a letter and contain only letters, periods, or dashes.";
        } elseif(count(explode(" ", $name)) < 2) 
        {
            echo "Name must contain at least two words.";
        }
        else echo $name . " is valid name";
    }
    else if(isset($_POST['submit_email']))
    {
        $email = trim($_POST['email']);
        if (empty($email)) 
        {
            echo " Email cannot be empty.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            echo "Invalid email format.";
        }
        else echo $email . " is valid email";

    }
    elseif(isset($_POST['submit_dob']))
    {
        if(isset($_POST['dd']) && isset($_POST['mm']) && isset($_POST['yyyy']))
        {
            $day = trim($_POST['dd']);
            $month = trim($_POST['mm']);
            $year = trim($_POST['yyyy']);

            if (empty($day) || empty($month) || empty($year))
            {
                echo " All date of birth fields (day, month, year) must be filled.";
            } elseif (!ctype_digit($day) || !ctype_digit($month) || !ctype_digit($year)) 
            {
                echo " Day, month, and year must be valid numbers.";
            } elseif ($day < 1 || $day > 31) 
            {
                echo " Day must be between 1 and 31.";
            } elseif ($month < 1 || $month > 12) 
            {
                echo "Month must be between 1 and 12.";
            } elseif ($year < 1953 || $year > 1998) 
            {
                echo " Year must be between 1953 and 1998.";
            }
            else echo"valid date";
            
        }
    }
    
    elseif(isset($_POST['submit_degree']))
    {
        if(isset($_POST['degree']))
        {
            $_SESSION['degree']=$_POST['degree'];
            if(count($_SESSION['degree'])<2)
            {
                echo"select 2 degrees at least";
            }
        }
        else echo"select 2 degrees at least";
        
    }
    elseif(isset($_POST['submit_blood_group']))
    {
        $_SESSION['blood_group']=$_POST['blood_group'];
        if(empty($_SESSION['blood_group']))
        {
            echo"select a Blood Group";
        }
    }
    elseif(!isset($_POST['gender']))
    {
        echo"select 1 gender";
    }
    
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lab3.2</title>
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
            <option value=""></option>
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

