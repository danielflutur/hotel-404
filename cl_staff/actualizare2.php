<?php

    include("../connection.php");
    error_reporting(0);

    $roomNumber=$_GET['roomNumber'];
    $query= "UPDATE rooms SET status1='empty' WHERE roomNumber='$roomNumber'";

    $data=mysqli_query($con,$query);

    if($data)
    {
        echo '<meta http-equiv="refresh" content="0; URL=../cl_staff/clstaff.php">';
        echo 'Update';
    }
    else
    {
        echo "Failed to update record";
    }

?>
