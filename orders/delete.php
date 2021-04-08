<?php

	include("../connection.php");
	error_reporting(0);

	$id=$_GET['id'];
	$rn=$_GET['rn'];
	$query= "UPDATE bill SET status='canceled' WHERE id_bill='$id'";
	$query2="UPDATE rooms SET status='canceled' WHERE roomNumber='$rn'";
	$data=mysqli_query($con,$query);
	$data2=mysqli_query($con,$query2);
	if($data && $data2)
	{
		echo '<meta http-equiv="refresh" content="0; URL=../orders/myOrders.php">';
	}
	else
	{
		echo "Failed to delete record";
	}

?>