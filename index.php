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
	<title>Waypoint hotel</title>
	<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
	<link href="index.css" rel="stylesheet">
	<link rel="stylesheet" href="navbar.css">
	<link rel="stylesheet" href="css/all.min.css">
</head>


<body>
	<nav>
		<div class="left">
			<ul>
				<li><a href="index.php">
						<i class="far fa-building"></i> Waypoint hotel</a></li>
			</ul>
		</div>
		<div class="right">
			<ul>
				<li>
					<?php
						if (isset($_SESSION['username']))
						{

							echo "<p style='margin-right: 15px; font-size: 20px; cursor:pointer; color:white;'>";
							echo $_SESSION['username'];
   							echo " <i class='fas fa-user-alt' style='font-size: 30px;''></i><i class='fas fa-chevron-down'></i></i></p>
   							<div class='dropdown'>
								<ul >
									
									<li><a href='orders/myOrders.php'><i class='fas fa-shopping-basket'></i> Orders</a></li>
									<li><a href='Rooms/rooms.php'>
										<i class='fas fa-bed'></i> Rooms</a></li>
									<li><a href='index.php?logout='1''><i class='fas fa-sign-out-alt'></i>Logout</a></li>
								</ul>
							</div>";}
						else
						{
							echo "<p style='margin-right: 15px; font-size: 20px;''><a href='login.php'>Login<i class='fas fa-user-alt' style='font-size: 30px;''></i></a></p>";
						}
					?>
				</li>
			</ul>
		</div>
	</nav>
	<script src="nav.js"></script>
	<!-- ////////////////////////////-->

	<div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
		<ol class="carousel-indicators">
			<li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
			<li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
			<li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active first-slide">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="animated fadeIn" style="animation-delay: 1s">Waypoint hotel
						<hr class="h-rule">
					</h5>
					<p class="animated fadeInUp" style="animation-delay: 2s">Our Hotels & Resorts remain stylish,
						modern, forward thinking global leader of hospitality and we help make traveling easier with our
						smart design, innovative restaurant concepts, unique activities, nature and authentic
						hospitality.</p>
					
				</div>
			</div>
			<div class="carousel-item second-slide">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="animated fadeInUp" style="animation-delay: 1s">Restaurant
						<hr class="h-rule">
					</h5>
					<p class="animated fadeInUp" style="animation-delay: 2s">The hotel offers a stunning array of
						culinary delights from our award winning chef’s. Whether you visit as a hotel guest, conference
						delegate or joining us with friends or family for an Afternoon Tea, you’ll find our contemporary
						restaurants and lounge area to be the perfect place to relax</p>
					
				</div>
			</div>
			<div class="carousel-item third-slide">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="animated zoomIn" style="animation-delay: 1s">Activities
						<hr class="h-rule">
					</h5>
					<p class="animated fadeInLeft" style="animation-delay: 2s">We provide a bunch of different offers
						that may be of an interest to your. At our hotels we will find you any type of entertainment
						taking into account your wishes.</p>
					
				</div>
			</div>
		</div><a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button"><span
				aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a>
		<a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button"><span
				aria-hidden="true" class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
	</div>

	<div class="py-5 wrapper1">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-3"> <img class="img-fluid d-block" src="img/1.jpg" width="1500">
					<h3 class="pt-2 text-center">Location&nbsp;</h3>
					<p class="mt-2 mb-0">&emsp; <span id="first-letter">T</span>
						he Waypoint Hotel is the right choice for visitors who are searching for a combination of charm
						and a convenient position from where to explore surroundings. The Waypoint hotels is located in
						the
						heart of the historic center of Florence in an extremely characteristic, quite and lively area
						within short walk distance to all sites and is surrounded by the extraordinary beauty of
						churches, buildings, shops and monuments. The Waypoint hotel is part of a lovingly restored 1800
						palace.</p>
				</div>
				<div class="col-md-6 p-3"> <img class="img-fluid d-block" src="img/2.jpg" width="1500">
					<h3 class="pt-2 text-center">Facilities&nbsp;</h3>
					<p class="mt-2 mb-0">&emsp; <span id="first-letter">Y</span>our comfort is our first and most
						important priority. That’s why our staff offers the most intuitive and unobtrusive service
						you’ll find anywhere, and our amenities package is designed to ensure you have everything you
						need to rest easy and stay well. It’s our mission to make sure you want for nothing, so if
						there’s anything you need, just ask. Enjoy continental breakfast, a light lunch or high tea,
						plus snacks, canapés and unlimited alcoholic and non-alcoholic beverages from 6am to 6pm.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="py-5 wrapper-camere">
		<div class="container">
			<div class="row">
				<div class="mx-auto col-md-8 text-center text-wrapper">
					<h1 style="font-size: 70px;">Take one of our rooms
						<hr style="border: none; border-bottom: 2px solid black;">
					</h1>
					<p class="mb-4" style="font-size: 30px; font-weight: 500;">The best is yet to come!</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-6 p-3">
					<div class="card" onclick="acces_room1()" style="cursor: pointer;"> <img class="card-img-top" src="img/p-1.jpg" alt="Card image cap"
							style="box-shadow: 0px 0px 35px 3px rgba(0,0,0,0.6);">
						<div class="card-body">
							<h5 class="card-title"> <b>Single room</b> </h5>
							<p class="card-text">A single room is a room intended for one person to stay in. Choose from
								twin or single rooms, all of which are comfortable. Each guest has her own single room,
								or shares a double room.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-6 p-3">
					<div class="card" onclick="acces_room2()" style="cursor: pointer;"> <img class="card-img-top" src="img/p-2.jpg" alt="Card image cap"
							style="box-shadow: 0px 0px 35px 3px rgba(0,0,0,0.6);">
						<div class="card-body">
							<h5 class="card-title"> <b>Double room</b> </h5>
							<p class="card-text">The comfort twin room has a size of 17.5 m². In addition to the two
								comfy beds, you will have plenty of room to relax. With a book, a movie or a drink from
								the lounge, for example.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-6 p-3">
					<div class="card" onclick="acces_room3()" style="cursor: pointer;"> <img class="card-img-top" src="img/p-3.jpg" alt="Card image cap"
							style="box-shadow: 0px 0px 35px 3px rgba(0,0,0,0.6);">
						<div class="card-body">
							<h5 class="card-title"> <b>Triple room</b> </h5>
							<p class="card-text">These rooms designed with open-concept living area are very bright and
								spacious – they come with three beds. The interior is made with a warm palette tons of
								walls and furniture.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="py-3 wrapper-pareri">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-3">
					<div class="card">
						<div class="card-body p-4" style="box-shadow: 0px 10px 280px -36px rgba(0,0,0,0.3)">
							<p class="mb-3">The rooms were clean, very comfortable, and the staff was amazing. They went over and beyond to help make our stay enjoyable. I highly recommend this hotel for anyone visiting downtown</p>
							<div class="row">
								<div class="col-lg-2 col-3"> <img class="img-fluid d-block rounded-circle"
										src="img/femeie1.jpg"> </div>
								<div class="col-lg-10 col-9 d-flex align-items-center">
									<p class="my-2">J. W. Kenzie</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="ml-auto col-md-6 p-3">
					<div class="card">
						<div class="card-body p-4" style="box-shadow: 0px 10px 280px -36px rgba(0,0,0,0.3)">
							<p class="mb-3">I have stayed at dozen of hotels in Florence. This was on the top of the list of best stays/experiences ever. Staff was very hospitable and there for every need of mine. Thank you so much.</p>
							<div class="row">
								<div class="col-lg-2 col-3"> <img class="img-fluid d-block rounded-circle"
										src="img/barbat1.jpg"> </div>
								<div class="col-lg-10 col-9 d-flex align-items-center">
									<p class="my-2">G. W. Austin</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="py-5 wrapper-final">
		<div class="container">
			<div class="row">
				<div class="text-center mx-auto col-md-12">
					<h1>Take a look</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 p-3"> <img class="img-fluid d-block" id="reflection" src="img/cover-final1.jpg">
				</div>
				<div class="col-md-6 p-3"> <img class="img-fluid d-block" id="reflection" src="img/cover-final2.jpg">
				</div>
			</div>
			<div class="row">

				<div class="col-md-12 p-3 glow"> <img class="img-fluid d-block" id="reflection-final"
						src="img/cover-final3.jpg"> </div>

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
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p class="mt-2 mb-0">© All rights reserved. Website developed by Error 404 team.</p>
				</div>
			</div>
		</div>
	</div>

	<script>
		function acces_room1()
		{
			
				window.location.href="Rooms/Room1/room1.php";
			
		}
		function acces_room2()
		{
			
			
				window.location.href='Rooms/Room2/room2.php';
			
		}
		function acces_room3()
		{
			
			
				window.location.href='Rooms/Room3/room3.php';
			
			
		}

	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js">
	</script>

	<script>
		$('.carousel').carousel({
			interval: 10000
		})
	</script>
</body>

</html>