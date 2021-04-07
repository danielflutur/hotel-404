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
    <link rel="stylesheet" href="AdminRooms.css">
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
                    <th>RoomNumber</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th colspan="2">Options</th>
                </tr>

                <!-- aici vine php ul de la tabela cu camere -->
                <?php 

                    error_reporting(0);
                    include("connection.php");
                    $query = "SELECT * FROM rooms";
                    $data = mysqli_query($con,$query);
                    $total = mysqli_num_rows($data);

                    if($total != 0)
                    {
                        while($result=mysqli_fetch_assoc($data))
                        {
                            echo "
                            <tr>
                                <td>".$result['roomNumber']."</td>
                                <td>".$result['type']."</td>
                                <td>".$result['price']."</td>
                                <td>".$result['status']."</td>
                                <td><a href='edit.php?rn=$result[roomNumber]&ty=$result[type]&pr=$result[price]&st=$result[status]'><button class='button' style='background-color:green; padding: 5px 20px;cursor: pointer'>UPDATE</button></a></td>
                                <td><a href='delete.php?rn=$result[roomNumber]'><button class='button' style='background-color:red;padding: 5px 20px;cursor: pointer' onclick='return delete_warning()'>DELETE</button></a></td>
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
            <table style="width: 80%; height: 48vh; border-bottom: 1px solid grey; border-top: 1px solid;">
                <tr>
                    <td colspan="2" style="font-size: 30px; background-color: #0082e6; color: white;">Add a room</td>
                </tr>
                <tr style="background-color: transparent;">
                    <td>Room Number</td>
                    <td><input type="text" id="room_number" placeholder="Room number" name="roomNumber" required></td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td><input type="text" id="room_type" placeholder="Room type" name="type" required></td>
                </tr>
                <tr style="background-color: transparent;">
                    <td>Price in €/night</td>
                    <td><input type="text" id="room_price" placeholder="Price in €" name="price" required></td>
                </tr>
                <tr style="background-color: transparent; height: 80px;">
                    <td colspan="2"><button type="submit" name="submit">ADD</button></td>
                </tr>
                <!--aici vine php de la register form-->
                <?php 
                    if(isset($_POST['submit']))
                    {
                        $rn=$_POST['roomNumber'];
                        $ty=$_POST['type'];
                        $pr=$_POST['price'];
                        $st="available";
                        if($rn != "" && $ty != "" && $pr != "" && $st != "")
                        {
                            $query="INSERT INTO rooms VALUES ('$rn','$ty','$pr','$st')";
                            $data=mysqli_query($con, $query);
                            echo '<meta http-equiv="refresh" content="0; URL=../Admin/AdminRooms.php">';
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
    <script>
        function delete_warning() 
        {
            return confirm('Are you sure you want to delete this room?');
        }
    </script>
</body>

</html>