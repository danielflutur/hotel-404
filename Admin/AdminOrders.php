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
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="AdminOrders.css">
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
            <li><a href="../Admin/AdminRooms.php"><i class="fas fa-bed"></i>Rooms</a></li>
            <li><a href="../Admin/AdminOrders.php"><i class="fas fa-shopping-basket"></i>Orders</a></li>
            <li><a href="../Admin/AdminManageAccounts.php"><i class="fas fa-users"></i>Manage accounts</a></li>
            <li><a href="../Admin/mailing/index.php"><i class="fas fa-angle-right"></i><i class="fas fa-users"></i>Send emails</a></li>
            <li><a href="../index.php?logout='1'&active='1'"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
        </ul>
        <div class="menu">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
      
    <div class="orders">
        <table>
            <tr style="color: white;">
                <th>Id</th>
                <th>Customer(username)</th>
                <th>Room Num.</th>
                <th>Type</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
            <!-- aici vine php ul de la tabela cu comenzile -->
            <?php 

                    error_reporting(0);
                    include("connection.php");
                    $query = "SELECT * FROM bill";
                    $data = mysqli_query($con,$query);
                    $total = mysqli_num_rows($data);

                    if($total != 0)
                    {
                        while($result=mysqli_fetch_assoc($data))
                        {
                            echo "
                            <tr>
                                <td>".$result['id_bill']."</td>
                                <td>".$result['username']."</td>
                                <td>".$result['roomNumber']."</td>
                                <td>".$result['room_type']."</td>
                                <td>".$result['ci_date']."</td>
                                <td>".$result['co_date']."</td>
                                <td>".$result['price']."</td>
                                <td>".$result['status']."</td>
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
    <!-- go up button -->
    <div class="group" style="display: none;">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!-- go up button end -->
    <script type="text/javascript">
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <script src="menu.js"></script>
</body>
</body>

</html>