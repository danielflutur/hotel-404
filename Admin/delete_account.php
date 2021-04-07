<?php

	include("connection.php");
	error_reporting(0);

	$us=$_GET['us'];
	$query= "DELETE FROM login WHERE username='$us'";

	$data=mysqli_query($con,$query);

	if($data)
	{
		echo '<meta http-equiv="refresh" content="0; URL=../Admin/AdminManageAccounts.php">';
	}
	else
	{
		echo "Failed to delete record";
	}

?>