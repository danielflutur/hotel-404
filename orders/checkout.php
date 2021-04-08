<?php

    include("../connection.php");
    error_reporting(0);

    $id=$_GET['id'];
    $query= "UPDATE bill SET status='check-out' WHERE id_bill='$id'";

    $data=mysqli_query($con,$query);

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


