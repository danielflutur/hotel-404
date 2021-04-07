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
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="picker.css">
  <title>Document</title>
</head>

<body class="cover">

  <body>
    <nav>
      <div class="left">
        <ul>
          <li><a href="../../index.php">
            <i class="far fa-building"></i> Waypoint hotel</a>
          </li>
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
                <ul>
                  
                  <li><a href='../../orders/myOrders.php'><i class='fas fa-shopping-basket'></i> Orders</a></li>
                  <li><a href='../rooms.php'>
              <i class='fas fa-bed'></i> Rooms</a></li>
                  <li><a href='../../index.php?logout='1''><i class='fas fa-sign-out-alt'></i>Logout</a></li>
                </ul>
              </div>";}
            else
            {
              echo "<p style='margin-right: 15px; font-size: 20px;''><a href='../../login.php'>Login<i class='fas fa-user-alt' style='font-size: 30px;''></i></a></p>";
            }
          ?>
        </li>
      </ul>
    </div>
    </nav>
    <script src="nav.js"></script>
    <br>
    <div class="cover">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="display-4 mt-5">Double room</h1>
          </div>
        </div>
        <div class="row">
          <div class="p-0 col-12">
            <img class="img-fluid d-block cover" src="img/double.jpg" width="100%">
          </div>
        </div>
      </div>
    </div>

    <div class="py-5 text-center gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-8 order-2 order-lg-1"> <img class="img-fluid d-block rounded" src="img/bucatarie.jpg"> </div>
          <div class="col-lg-2 col-4 d-flex flex-column justify-content-between order-3 order-lg-2">
            <img class="img-fluid d-block rounded" src="img/toilet.jpg">
            <img class="img-fluid d-block rounded" src="img/bath.jpg">
          </div>
          <div class="px-md-5 p-3 d-flex flex-column justify-content-center col-lg-6 order-1 order-lg-3">
            <i class="d-block fa fa-circle fa-3x mb-2 text-muted"></i>
            <h1 contenteditable="true">Room description</h1>
            <p class="lead">
              The comfort twin room has a size of 17.5 m². In addition to the two
                comfy beds, you will have plenty of room to relax. With a book, a movie or a drink from
                the lounge, for example.
            </p>
            <div class="form-group"><label>Double Room</label></div>
          </div>
        </div>
      </div>
    </div>
    <form>
    <div class="py-5 checks">
      <div class="container">
        <div class="row">
          <div class="col-md-4 offset-md-2">
            <div class="form-group">
              <div class="form-group">
                <label class="m-0">Check-in</label>
                <input type="datetime-local" class="form-control" id="ci_date"  name="ci_date" required />
              </div>
              <div class="form-group mt-1 pt-2">
                <label class="m-0">Check-out</label>
                <input type="datetime-local" class="form-control" id="co_date"  name="co_date" required />
              </div>
            </div>
          </div>
          <div class="col-md-4">
              <?php
                include("../../connection.php");
                $query = "SELECT * FROM rooms WHERE type='double' AND status='available'";
                $data = mysqli_query($con,$query);
                $total = mysqli_num_rows($data);
                if($total != 0)
                {
                  echo "
                    <div class='form-group' style='transform: translateY(+5px);'>
                      <label class='m-0'>Available Room</label><br>";
                  if($result=mysqli_fetch_assoc($data))
                  {
                      echo "<input type='text' value='". $result['roomNumber']."'class=form-control' id='form6' name='room_nr' required>
                    </div>
                    <div class='form-group' style='transform: translateY(+25px);'>
                      <label class='m-0'>Price</label><br>
                      <input type='text' value='". $result['price']."'class=form-control' id='form6' name='price' required>
                    </div>";
                  
                  }
                } 
                else
                {
                  echo "No rooms available!";
                }
              ?>
          </div>
        </div>
      </div>
    </div>
    <div class="py-5 submit">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <button class="btn btn-outline-primary w-50 button" type="submit" name="submit">Confirm</button>
          </div>
        </div>
      </div>
    </div>
  </form>
    <?php
      include("../../connection.php");
      
      if(isset($_GET['submit']))
      {
        if (isset($_SESSION['username']))
        {
            $us=$_SESSION['username'];
            $rn=$_GET['room_nr'];
            $pr=$_GET['price'];
            $ci=$_GET['ci_date'];
            $co=$_GET['co_date'];
            $ty="double";
            $st="reserved";
            if($us != "" && $rn != "" && $pr != "" && $ci != "" && $co != "")      
            {      
                $query="INSERT INTO bill (`id_bill`, `username`, `roomNumber`, `room_type`, `ci_date`, `co_date`, `price`, `status`) VALUES ('','$us','$rn','$ty','$ci','$co' ,'$pr','$st')";
                $query1="UPDATE rooms SET status='$st' WHERE roomNumber='$rn'";
                $data=mysqli_query($con, $query);
                $data1=mysqli_query($con, $query1);
                echo '<meta http-equiv="refresh" content="0; URL=../../orders/myOrders.php">';
              }
              else
            {
              echo "<script>alert('No rooms available!')</script>";
              echo '<meta http-equiv="refresh" content="0; URL=room2.php">';
            }
            
        }
        else
        {
          echo "<script>alert('Login first!')</script>";
          echo '<meta http-equiv="refresh" content="0; URL=room2.php">';
        }
      }
      
    ?>

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
              <div class="col-md-12 d-flex align-items-center justify-content-md-between justify-content-center my-2">
                <a href="#">
                  <i class="d-block fa fa-facebook-official text-muted fa-lg mx-2"></i>
                </a> <a href="#">
                  <i class="d-block fa fa-instagram text-muted fa-lg mx-2"></i>
                </a> <a href="#">
                  <i class="d-block fa fa-twitter text-muted fa-lg ml-2"></i>
                </a>
              </div>
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
  </body>


  <script>
    $(document).ready(function () {
      var date_input = $('input[name="date"]'); //our date input has the name "date"
      var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      })
    })
  </script>
</body>

</html>