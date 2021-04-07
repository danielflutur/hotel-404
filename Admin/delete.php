<?php

	include("connection.php");
	error_reporting(0);

	$roomNo=$_GET['rn'];
	$query= "DELETE FROM rooms WHERE roomNumber='$roomNo'";

	$data=mysqli_query($con,$query);

	if($data)
	{
		echo '<meta http-equiv="refresh" content="0; URL=../Admin/AdminRooms.php">';
	}
	else
	{
		echo "Failed to delete record";
	}

?>