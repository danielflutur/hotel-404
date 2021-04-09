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
    <link rel="stylesheet" href="orders.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Document</title>
</head>

<body>
    <nav>
    <div class="left">
      <ul>
        <li><a href="../index.php">
          <i class="far fa-building"></i> Waypoint hotel</a></li>
    </div>
    <div class="right">
      <ul>
        <li>
          <?php
            if (isset($_SESSION['username']))
            {
              echo "<p style='margin-right: 15px; font-size: 20px; cursor:pointer; color:#0082E6;'>";
              echo $_SESSION['username'];
                echo " <i class='fas fa-user-alt' style='font-size: 30px;''></i><i class='fas fa-chevron-down'></i></i></p>
                <div class='dropdown'>
                <ul>
                  
                  <li><a href='myOrders.php'><i class='fas fa-angle-right'></i><i class='fas fa-shopping-basket'></i> Orders</a></li>
                  <li><a href='../Rooms/rooms.php'>
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
  <script src="nav.js"></script>
 
  <div class="py-5" style="transform: translateY(10%);">
    <div class="container">
      <br>
      <h1 class="">Your Orders <hr style="width: 25%;"></h1>
    </div>
  </div>
  <?php
    include("../connection.php");
    if (isset($_SESSION['username']))
    {
      $us=$_SESSION['username'];
      $cd=date("Y-m-d H:i:s");
      $query="SELECT * FROM bill WHERE username='$us' and status='reserved' or status='check-in' or status='check-out'";
      $data = mysqli_query($con,$query);
      while($result=mysqli_fetch_assoc($data))
      { 
        echo "<div class='py-1' style='transform: translateY(10%);'>
          <div class='container'>
            <div class='row'>";
          if($result['room_type']=='single')
          {
            echo "<div class='col-md-6 mb-5'> <img class='img-fluid d-block shadow-lg' src='../img/single.jpg'>
              </div>";
          }
          else if($result['room_type']=='double')
          {
            echo "<div class='col-md-6 mb-5'> <img class='img-fluid d-block shadow-lg' src='../img/double.jpg'>
              </div>";
          }
          else
          {
            echo "<div class='col-md-6 mb-5'> <img class='img-fluid d-block shadow-lg' src='../img/triple.jpg'>
              </div>";
          }
          echo "<div class='col-md-6 border-left'>
                <h3 class='mt-3 text-left'>Room type:".$result['room_type']."</h3>
                <h3 class='mt-3 text-left'>Check-in date:".$result['ci_date']."</h3>
                <h3 class='text-left'>Check-out date:".$result['co_date']."</h3>
                <h3 class='text-left'>Price:".$result['price']."€/night</h3>";
                $cf=$result['ci_date'];
                $od=$result['co_date'];
          if($result['status']=='reserved' && $cf > $cd)
          {
            echo "
                <a class='btn w-25 mb-5' href='checkin.php?id=$result[id_bill]&rn=$result[roomNumber]' >Check-in</a>";
          }
          else if($result['status']=='check-in')
          {
            echo "
                <a class='btn w-25 mb-5' href='checkout.php?id=$result[id_bill]&rn=$result[roomNumber]' >Check-out</a>";
          }
          else
          {
            echo "<button class='btn w-25 mb-5' onclick='old_record()' >Check-in</button>";
          }
                
          if($cf > $cd)
          {
                echo "<a class='btn w-25 mb-5' href='delete.php?id=$result[id_bill]&rn=$result[roomNumber]' >Cancel</a>";
          }
          else
          {
              echo "<button class='btn w-25 mb-5' onclick='old_record()' >Cancel</button>";
          }
             echo" </div>
            </div>
          </div>
        </div>";
      }
    }
  ?>
      <div class="col-md-12 parallax"></div>

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
  <script>
    function old_record()
    {
      alert("Outdated record!");
    }
  </script>
    
    <script src="parallaxie.js"></script>
    <script>
        $('.parralax').parallaxie();
        </script>
</body>
</html>
