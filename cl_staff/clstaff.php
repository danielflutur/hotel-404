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
    <link rel="stylesheet" href="clstaff.css">
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
            <li><a href="clstaff.php"><i class="fas fa-angle-right"></i><i class="fas fa-bed"></i>Rooms</a></li>
            <li><a href="clstaff_account.php"><i class="far fa-user-circle"></i>Manage account</a></li>
            <li><a href="../index.php?logout='1'&active='1'"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
        </ul>
        </ul>
        <div class="menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <h1>ROOMS</h1>
    <div class="clstaff">
        <table>
            <tr style="color: white;">
                <th>Id</th>
                <th>Status</th>
                <th colspan="2">Options</th>
            </tr>
            
            <!-- aici vine php ul de la tabela cu camere -->
            <?php 

                    error_reporting(0);
                    include("../connection.php");
                    $query = "SELECT * FROM rooms";
                    $data = mysqli_query($con,$query);
                    $total = mysqli_num_rows($data);

                    if($total != 0 )
                    {
                        while($result=mysqli_fetch_assoc($data) )
                        {
                            echo "
                            <tr>
                                <td>".$result['roomNumber']."</td>
                                <td>".$result['status1']."</td>";
                            if($result['status1']=='empty')
                            {
                            
                            echo "<td><a href='room_status.php?roomNumber=$result[roomNumber]'><button class='button' style='background-color:green ;padding: 5px 20px;  width:20%; cursor: pointer'>Cleaned</button></a></td>                                 
                            </tr>
                            ";
                            }
                            else if($result['status1']=='cleaning')
                            {
    
                                
                                echo "<td><a href='actualizare2.php?roomNumber=$result[roomNumber]'><button class='button' style='background-color:red ;padding: 5px 20px;  width:20%; cursor: pointer'>EXIT</button></a></td>  </tr>";
                            }

                        }
                    }
                    else
                    {
                        echo "No records found";
                    }
                ?>


        </table>
    </div>
    <div class="goup" style="display: none;">
        <i class="fas fa-arrow-up"></i>
    </div>
    <script src="menu.js"></script>
</body>
</html>