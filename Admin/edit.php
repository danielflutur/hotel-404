<?php

    include("connection.php");
    error_reporting(0);
    $rn=$_GET['rn'];
    $ty=$_GET['ty'];
    $pr=$_GET['pr'];
    $st=$_GET['st'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>HotelName -Admin- Edit room</title>
</head>
<body>
    <form class="edit" action="" method="GET">
        <table>
            <tr>
                <td style="font-size: 30px;" colspan="2">Update room</td>
            </tr>
            <tr>
                <td>Room Number</td>
                <td><input type="text" id="room_number" value="<?php echo "$rn" ?>" name="roomNumber1"  required></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><input type="text" id="room_type" value="<?php echo "$ty" ?>" name="type1" required></td>
            </tr>
            <tr>
                <td>Price in €/night</td>
                <td><input type="text" id="room_price" value="<?php echo "$pr" ?>" name="price1" required></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><input type="text" id="status" value="<?php echo "$st" ?>" name="status1" required></td>
            </tr>
            <tr style="background-color: transparent; height: 60px;">
                <td colspan="2"><button type="submit" name="submit">UPDATE</button></td>
            </tr>

            <!-- cod php -->
            <?php
                include("connection.php");
                if(isset($_GET['submit']))
                {
                    $rn1=$_GET['roomNumber1'];
                    $ty1=$_GET['type1'];
                    $pr1=$_GET['price1'];
                    $st1=$_GET['status1'];
                    if($rn1 != "" && $ty1 != "" && $pr1 != "" && $st1 != "")
                    {                
                        $query="UPDATE rooms SET roomNumber='$rn1', type='$ty1', price='$pr1', status='$st1' WHERE roomNumber='$rn1'";
                        $data=mysqli_query($con, $query);
                        echo '<meta http-equiv="refresh" content="0; URL=../Admin/AdminRooms.php">';
                    }
                }
            ?>

        </table>
    </form>
</body>
</html>