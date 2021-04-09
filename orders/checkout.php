<?php

    include("../connection.php");
    error_reporting(0);

    $id=$_GET['id'];
    $rn=$_GET['rn'];
    $query= "UPDATE rooms SET status='check-out' WHERE roomNumber='$rn'";
    $query2= "UPDATE bill SET status='check-out' WHERE id_bill='$id'";

    $data=mysqli_query($con,$query);
    $data2=mysqli_query($con,$query2);

    if($data)
    {
        echo '<meta http-equiv="refresh" content="0; URL=../orders/myOrders.php">';
        echo 'Update';
    }
    else
    {
        echo "Failed to update record";
    }

?>


