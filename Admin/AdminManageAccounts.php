<?php 

    session_start();
    
    if (!isset($_SESSION['username']) )
    {
        //$_SESSION['msg'] = "You have to log in first";
        header('location: ../login.php');
    }
    if (!isset($_SESSION['username']))
    {
        $ac=true;
    }
    else
    {
        $ac=false;
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
    <!-- <meta http-equiv="refresh" content="5"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdminManageAccounts.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <title>HotelName -Admin- Rooms</title>
</head>

<body>
     <nav>
        <div class="name">
            <h4>Waypoint Hotel</h4>
            <?php 
                echo "<h6>".$_SESSION['username']."</h6>"; 
            ?>
        </div>
        <ul class="links">
            <li class="button"><a href="../Admin/AdminRooms.php">Rooms</a></li>
            <li><a href="../Admin/AdminOrders.php">Orders</a></li>
            <li><a href="../Admin/AdminManageAccounts.php">Manage accounts</a></li>
            <li><a href="../index.php?logout='1'&active='1'">Log out</a></li>
        </ul>
        <div class="menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <header>
        <div class="admin">
            <table>
                <tr style="color: white;">
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th colspan="2">Options</th>
                </tr>
                
                <!-- aici vine php ul de la tabela cu camere -->
                <?php 

                    error_reporting(0);
                    include("connection.php");
                    $query = "SELECT * FROM login";
                    $data = mysqli_query($con,$query);
                    $total = mysqli_num_rows($data);

                    if($total != 0)
                    {
                        while($result=mysqli_fetch_assoc($data))
                        {
                            echo "
                            <tr>
                                <td>".$result['id_user']."</td>
                                <td>".$result['username']."</td>
                                <td>".$result['email']."</td>
                                <td>".$result['role']."</td>
                                <td><a href= 'edit_accounts.php?us=$result[username]&em=$result[email]&rl=$result[role]'><button class='button' style='background-color:green; padding: 5px 20px;cursor: pointer'>UPDATE</button></a></td>
                                <td><a href='delete_account.php?id=$result[id]'><button class='button' style='background-color:red;padding: 5px 20px;cursor: pointer' onclick='return delete_warning()'>DELETE</button></a></td>
                               
                            </tr>
                            ";

                        }
                    }
                    else
                    {
                        echo "No records found";
                    }

                ?>

            </table>
        </div>
        <form class="add" action="" method="POST">
            <table style="width: 80%; height: 64vh; border-bottom: 1px solid grey; border-top: 1px solid;">
                <tr>
                    <td colspan="2" style="font-size: 30px; background-color: #0082e6; color: white;">Add an account</td>
                </tr>
                <tr style="background-color: transparent; width: 100%; height: 30px;"></tr>
                <tr>
                    <td>Id</td>
                    <td><input type="text" id="id" placeholder="Id" name="id" required></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" id="username" placeholder="Username" name="username" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" id="email" placeholder="Enter your email" name="email" required></td>
                </tr>
                <tr >
                    <td>Password</td>
                    <td><input type="text" id="pass" placeholder="Password" name="passw" required></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="text" id="confpass" placeholder="Password" name="con_passw" required></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td><input type="text" id="user_role" placeholder="Role" name="role" required></td>
                </tr>
                <tr style="background-color: transparent; height: 80px;">
                    <td colspan="2"><button type="submit" id="sublim-btn" name="submit">ADD</button></td>
                </tr>
                
                <!-- aici vine php de la register form -->
                <?php 
                    if(isset($_POST['submit']))
                    {
                        $id=$_POST['id'];
                        $us=$_POST['username'];
                        $em=$_POST['email'];
                        $ps=$_POST['passw'];
                        $cp=$_POST['con_passw'];
                        $rl=$_POST['role'];
                        if($ps != $cp)
                        {
                        	echo '<script type="text/javascript">';
							echo ' alert("Passwords do not match.")';  
							echo '</script>';
                        }
                        $query= mysqli_query($con, "SELECT * FROM login WHERE username='$us'");
                        if(mysqli_num_rows($query)>0)
                        {
                        	echo '<script type="text/javascript">';
							echo ' alert("username is already used")';  
							echo '</script>';
                        }
                        else
                        {
                            if($us != "" && $em != "" && $ps != "" && $cp != "" && $rl != "" &&  $ps == $cp)
                            {
                                $query="INSERT INTO login (`id_user`, `username`, `email`, `password`, `con_pass`, `role`)VALUES ('$id','$us','$em','$ps','$cp','$rl')";
                                $data=mysqli_query($con, $query);
                                echo '<meta http-equiv="refresh" content="0; URL=../Admin/AdminManageAccounts.php">';
                            }
                        }
                    }
                 ?>
            </table>
        </form>
    </header>

    <div class="group" style="display: none;">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script src="menu.js"></script>
</body>

</html>
