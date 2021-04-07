<?php
	session_start();
	if (!isset($_SESSION['username']) && isset($_GET['active']))
	{
    	$_SESSION['msg'] = "You have to log in first";
    	header('location: login.php');
	}
   	if (!isset($_SESSION['username']))
   	{
   		$ac=true;
   	}
   	else
   	{
   		$ac=false;
   	}
	if (isset($_GET['logout']))
	{
    	session_destroy();
    	unset($_SESSION['username']);
    	header("location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" href="navbar.css">
	<link rel="stylesheet" href="css/all.min.css">
    <title>Document</title>
</head>
<body>
    <nav>
		<div class="left">
			<ul>
				<li><a href="../index.php">
					<i class="far fa-building"></i> Hotel name</a></li>
		</div>
		<div class="right">
			<ul>
				<li>
					<?php
						if (isset($_SESSION['username']))
						{
							echo "<p style='margin-right: 15px; font-size: 20px; cursor:pointer;'>";
							echo $_SESSION['username'];	
   							echo " <i class='fas fa-user-alt' style='font-size: 30px;''></i><i class='fas fa-chevron-down'></i></i></p>
   							<div class='dropdown'>
								<ul>
									<li><a href='#' ><i class='fas fa-user-alt'></i> Profile</a></li>
									<li><a href='../orders/myOrders.php'><i class='fas fa-shopping-basket'></i> Orders</a></li>
									<li><a href='rooms.php'>
										<i class='fas fa-bed'></i> Rooms</a></li>
									<li><a href='../index.php?logout='1''><i class='fas fa-sign-out-alt'></i>Logout</a></li>
								</ul>
							</div>";}
						else
						{
							echo "<p style='margin-right: 15px; font-size: 20px;''><a href='../login.php'>Login<i class='fas fa-user-alt' style='font-size: 30px;''></i></a></p>";
						}
					?>
				</li>
			</ul>
		</div>
	</nav>
	


    <div class="py-3" >
        <div class="container pt-5">
          <div class="row my-4 d-flex justify-content-center">
            <div class="col-md-6"><img class="img-fluid d-block shadow" src="img/single.jpg"></div>
            <div class="col-md-6 ml-auto border-left-0 border-right border-dark">
              <h1 class="">Single</h1>
              <p class="lead camere">Some details about the room like price and features</p>
			  <a class="btn btn-outline-secondary" href="Room1/room1.php">View more details</a>
            </div>
          </div>
          <div class="row my-4 d-flex justify-content-center">
            <div class="col-md-6"><img class="img-fluid d-block shadow" src="img/double.jpg"></div>
            <div class="col-md-6 ml-auto border-left border-dark">
              <h1 class="">Double</h1>
              <p class="lead">Some details about the room like price and features</p>
			  <a class="btn btn-outline-secondary" href="Room2/room2.php">View more details</a>
            </div>
          </div>
          <div class="row my-4 d-flex justify-content-center">
            <div class="col-md-6"><img class="img-fluid d-block shadow-lg" src="img/triple.jpg"></div>
            <div class="col-md-6 ml-auto border-left-0 border-right border-dark">
              <h1 class="">Triple</h1>
              <p class="lead camere">Some details about the room like price and features</p>
			  <a class="btn btn-outline-secondary" href="Room3/room3.php">View more details</a>
            </div>
          </div>
        </div>
      </div>
        
      </div>
  
    <div class="py-3 footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center d-md-flex align-items-center"> <i
						class="d-block fa fa-stop-circle fa-2x mr-md-5 text-dark"></i>
					<ul class="nav mx-md-auto d-flex justify-content-center">
						<li class="nav-item"> <a class="nav-link active text-dark" href="#">Adress: 0832183128</a> </li>
						<li class="nav-item"> <a class="nav-link text-dark" href="#">Adress: Str. Traian Vuia</a> </li>
					</ul>
					<div class="row">
						<div
							class="col-md-12 d-flex align-items-center justify-content-md-between justify-content-center my-2">
							<a href="#">
								<i class="d-block fa fa-facebook-official text-muted fa-lg mx-2"></i>
							</a> <a href="#">
								<i class="d-block fa fa-instagram text-muted fa-lg mx-2"></i>
							</a> <a href="#">
								<i class="d-block fa fa-twitter text-muted fa-lg ml-2"></i>
							</a> </div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p class="mt-2 mb-0">© All rights reserved. Website developed by Error 404 team.</p>
				</div>
			</div>
		</div>
	</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
	</script>
	<script src="nav.js"></script>

</body>
</html>