<?php

    include("connection.php");
    error_reporting(0);
    $us=$_GET['us'];
    $em=$_GET['em'];
    $rl=$_GET['rl'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit2.css">
    <title>HotelName -Admin- Edit accounts</title>
</head>

<body>
    <form class="edit" action="">
        <table>
            
            <tr>
                <td style="font-size: 30px;" colspan="2">Update account</td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" id="Username" value="<?php echo "$us" ?>" name="username1" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" id="Email" value="<?php echo "$em" ?>" name="email1" required></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><select style="width: 80%; height: 25px;" name="role" value="<?php echo "$cl" ?>" id="class">
                        <option value="class>" disabled>Select class</option>
                        <option value="admin" id="admin">Admin</option>
                        <option value="guest" id="guest">Guest</option>
                        <option value="cleaner" id="Cleaning staff">Cleaner</option>
                    </select></td>
            </tr>
            <tr style="background-color: transparent; height: 80px;">
                <td colspan="2"><button type="submit" name="submit">UPDATE</button></td>
            </tr>

            <!-- cod php -->
            
            <?php
                include("connection.php");
                if(isset($_GET['submit']))
                {
                    $us1=$_GET['username1'];
                    $em1=$_GET['email1'];
                    $rl1=$_GET['role1'];
                    if($us1 != "" && $em1 != "" && $rl1 != "")
                    {                
                        $query="UPDATE login SET username='$us1', email='$em1', role='$rl1' WHERE username='$us1'";
                        $data=mysqli_query($con, $query);
                        echo '<meta http-equiv="refresh" content="0; URL=../Admin/AdminManageAccounts.php">';
                    }
                    else
                        {echo "Not working";}
                }
            ?>


        </table>
    </form>
</body>

</html>