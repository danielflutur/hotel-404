<?php

	include("../connection.php");
	error_reporting(0);

	$id=$_GET['id'];
	$query= "DELETE FROM bill WHERE id_bill='$id'";

	$data=mysqli_query($con,$query);

	if($data)
	{
		echo '<meta http-equiv="refresh" content="0; URL=../orders/myOrders.php">';
	}
	else
	{
		echo "Failed to delete record";
	}

?>