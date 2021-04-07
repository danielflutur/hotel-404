<?php 

    session_start();
    
    if (!isset($_SESSION['username']) )
    {
        //$_SESSION['msg'] = "You have to log in first";
        header('location: ../../login.php');
    }
    if (isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header("location: ../../index.php");
    }

?>
<?php include 'sendemail.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Contact Form</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/css/all.min.css">
</head>

<body>
  <nav>
    
    <div class="name">
            <h4>Waypoint Hotel</h4>
            <?php 
                echo "<h6><i class='far fa-user-circle'></i>".$_SESSION['username']."</h6>"; 
            ?>
        </div>
        <ul class="links">
            <li><a href="../../Admin/AdminRooms.php"><i class="fas fa-bed"></i>Rooms</a></li>
            <li><a href="../../Admin/AdminOrders.php"><i class="fas fa-shopping-basket"></i>Orders</a></li>
            <li><a href="../../Admin/AdminManageAccounts.php"><i class="fas fa-users"></i>Manage accounts</a></li>
            <li><a href="../../Admin/mailing/index.php"><i class="fas fa-angle-right"></i><i class="fas fa-users"></i>Send emails</a></li>
            <li><a href="../../index.php?logout='1'&active='1'"><i class="fas fa-sign-out-alt"></i>Log out</a></li>
        </ul>
    <div class="menu">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </nav>
  
  <!--alert messages start-->
  <?php echo $alert; ?>
  <!--alert messages end-->

  <!--contact section start-->
  <header>
    <div class="contact-section">
      <div class="contact-form">
        <h2>Talk to hotel customers</h2>
        <form class="contact" action="" method="post">
          <input type="text" name="name" class="text-box" placeholder="Your Name" required>
          <input type="text" id="email" name="email" class="text-box" placeholder="To all clients" disabled>
          <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
          <input type="submit" name="submit" class="send-btn" value="Send">
        </form>
      </div>
    </div>
  </header>
  <!--contact section end-->

  <div class="group" style="display: none;">
    <i class="fas fa-arrow-up"></i>
</div>
  <script type="text/javascript">
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <script src="menu.js"></script>
</body>

</html>