<?php
session_start();
include("connection.php");


$message = "";
$role="";
$_SESSION['success'] = "";
if(isset($_POST["btnLogin"]))
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    $query = "SELECT * FROM login WHERE username= '$username' AND email= '$email' AND password= '$password'";
    $result = mysqli_query($con, $query);

    if (empty($username)) {
        header("Location: login.php?error=User Name is required");
        exit();
    }else if(empty($password)){
        header("Location: login.php?error=Password is required");
        exit();
    }else if(empty($email)){
        header("Location: login.php?error=Email is required");
        exit();
    }
    if(mysqli_num_rows($result))
    {
        while($row = mysqli_fetch_assoc($result))
        {
            if($row["role"] == "admin")
            {
                $_SESSION['AdminUser'] = $row["Username"];
                $_SESSION['username'] = $username;
                header('Location: Admin/AdminRooms.php');

            }
            if($row["role"] == "guest")
            {
                $_SESSION['User'] = $row["Username"];
                $_SESSION['username'] = $username;
                header('Location: index.php');
            }
            if($row["role"] == "cleaner")
            {
                $_SESSION['username'] = $username;
                echo "Cleaners";
            }
        
        }
        
    }
    else 
    {
        header('Location: login.php?error=Incorect username or password');
        exit();
    }

}
?>
