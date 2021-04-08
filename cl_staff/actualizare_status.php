<?php

    include("../connection.php");
    error_reporting(0);

    $roomNumber=$_GET['roomNumber'];
    $query= "UPDATE rooms SET status1='cleaning' WHERE roomNumber='$roomNumber'";

    $data=mysqli_query($con,$query);

    if($data)
    {
        echo '<meta http-equiv="refresh" content="0; URL=../cl_staff/clstaff.php">';
    }
    else
    {
        echo "Failed to update record";
    }

?>
