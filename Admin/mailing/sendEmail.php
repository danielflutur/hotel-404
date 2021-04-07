<?php

$conn=mysqli_connect("localhost", "root", "", "hotel_db");

use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email=$_POST['email'];
  $message = $_POST['message'];
  $mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hhotel262@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'hotel123*'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('hhotel262@gmail.com'); // Gmail address which you used as SMTP server
    $sql="SELECT * FROM login WHERE send_mail=1";
$res=mysqli_query($conn, $sql);
if(mysqli_num_rows($res)>0)
{
	$mail->addReplyTo("hhotel262@gmail.com");
	while($x=mysqli_fetch_assoc($res))
	{
		$mail->addAddress($x['email']);
	}

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name<br>Message: $message </h3>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
 } } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
