<?php 

    session_start();
    
    if (!isset($_SESSION['username']) )
    {
        //$_SESSION['msg'] = "You have to log in first";
        header('location: ../login.php');
    }
    if (isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header("location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="clstaff account.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="name">
            <h4>Waypoint Hotel</h4>
            <?php 
                echo "<h6><i class='far fa-user-circle'></i>".$_SESSION['username']."</h6>"; 
            ?>
        </div>
        <ul class="links">
            <li><a href="clstaff.php"><i class="fas fa-bed"></i>Rooms</a></li>
            <li><a href="clstaff_account.php"><i class="far fa-user-circle"></i>Manage account</a></li>
            <li><a href="../index.php?logout='1'&active='1'"><i class="fas fa-angle-right"></i><i class="fas fa-sign-out-alt"></i>Log out</a></li>
        </ul>
        <div class="menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <h1>Change your password</h1>
    <form class="change" action="">
        <table style="width: 80%; height: 100%; border-bottom: 1px solid grey; border-top: 1px solid;">
            <tr>
                <td colspan="2" style="font-size: 30px; background-color: #0082e6; color: white;">Change password</td>
            </tr>
            <tr style="background-color: transparent; width: 100%; height: 30px;"></tr>
            <tr style="background-color: transparent;">
                <td>Logged in as</td>
                <td><input style="background-color: transparent; border: none; border-bottom: 2px solid;" type="text" id="email" value="<?php echo $_SESSION['username']; ?>" disabled></td>
            </tr>
            <tr style="background-color: transparent;">
                <td>Old password</td>
                <td><input type="text" id="old_pass" name="old_passw" required></td>
            </tr>
            <tr style="background-color: transparent;">
                <td>New password</td>
                <td><input type="text" id="new_pass" name="passw" placeholder="New password" required></td>
            </tr>
            <tr style="background-color: transparent; height: 80px;">
                <td colspan="2"><button type="submit" name="submit">Change</button></td>
            </tr>
            <?php
                include("connection.php");
                if(isset($_GET['submit']))
                {
                    $ops=$_GET['old_passw'];
                    $ps=$_GET['passw'];
                    $us=$_SESSION['username'];
                    if($ops != "" && $ps != "")
                    {   
                        $query1 = "SELECT * FROM login where username='$us'";
                        $data1 = mysqli_query($con,$query);
                        if($result=mysqli_fetch_assoc($data1))
                        {
                            $pw=$result['password'];
                            if($ops==$pw)
                            {
                                $query="UPDATE login SET password='$ps' WHERE username='$us'";
                                $data=mysqli_query($con, $query);
                                echo '<meta http-equiv="refresh" content="0; URL=../cl_staff/clstaff_account.php">';
                            }
                            else
                            {
                                echo "<script>alert(Wrong old password!)</script>";
                                echo '<meta http-equiv="refresh" content="0; URL=../cl_staff/clstaff_account.php">';
                            }
                        }
                        
                    }
                    else
                    {
                        echo "<script>alert(Complete all fields!)</script>";
                        echo '<meta http-equiv="refresh" content="0; URL=../cl_staff/clstaff_account.php">';
                    }
                }
            ?>
        </table>
    </form>
    <div class="goup" style="display: none;">
        <i class="fas fa-arrow-up"></i>
    </div>
    <script src="menu.js"></script>
</body>
</html>