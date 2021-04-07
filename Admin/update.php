<?php

	include("connection.php");
	error_reporting(0);
	$id=$_GET['id'];
	$cl=$_GET['cl'];
	$em=$_GET['em'];
	$ps=$_GET['ps'];
?>

<html>
<head>
<title>
</title>

<style>
	table
	{
		color:white;
		border-radius:20px; 
	}
	#button
	{
		background-color: green;
		color:white;
		height: 32px;
		width: 125px;
		border-radius: 25px;
		font-size: 16px;
	}

	body
	{
		background: linear-gradient(red,blue);
	}
</style>
</head>

<body>
	<br><br><br><br><br><br><br>

	<form action ="" method="GET">
	<table border="0" bgcolor="black" align="center" cellspacing="20">
	<tr>
                    <td>Id</td>
                    <td><input type="text" value="<?php echo "$id" ?>" id="user_id" placeholder="Id number" name="id" required></td>
                </tr>
    
                    <td>Class</td>
                    <td><select name="classification" id="class"
                    	value="<?php echo "$cl" ?>">
                        <option value="Class">Select class</option>
                        <option value="admin">Admin</option>
                        <option value="clstaff">Cleaning staff</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" id="email" value="<?php echo "$em" ?>" placeholder="Enter your email" name="email" required></td>
                </tr>
                    <td>Password</td>
                    <td><input type="text" id="pass" value="<?php echo "$ps" ?>"  placeholder="Password" name="passw" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" id="button" name="submit" value="Update Details"></a></td>
                </tr>
</table>
</form>
</body>
</html>



 <?php



	include("connection.php");
    error_reporting(0);
if($_GET['submit'])
{
	$id=$_GET['id'];
	$classification=$_GET['classification'];
	$email=$_GET['email'];
	$passw=$_GET['passw'];
	$query="UPDATE account SET id='$id', class='$classification', email='$email', password='$passw' WHERE id='$id' ";
	$data= mysqli_query($conn,$query);

	if($data)
	{
		echo "<script>alert('Record updated')</script>";
		?>
		 <META http-equiv="refresh" content="0; URL=../Admin/AdminManageAccounts.php">
		 <?php 
	}
	else
	{
		echo "failed";
	}
}
?>