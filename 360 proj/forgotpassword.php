<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$_SESSION['email'] =null;

?>
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="./css/forgotpassword.css">
  <title>ForgotPassword</title>
</head>

<body>
  <form method="POST"class="reset">
<!--     <label class="address">Your email address:</label>
 -->    <input name="email" required placeholder="Your email address" oninvalid="this.setCustomValidity('Enter your email address')" oninput="this.setCustomValidity('')" type="text"></br>
    <button name="button" type="submit">Confirm</button>
  </form>
</body>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'config/PHPMailer-master/src/Exception.php';
require 'config/PHPMailer-master/src/PHPMailer.php';
require 'config/PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);
if (isset($_POST['email'])) {
  $_SESSION['email'] =$_POST['email'];


  $link = 'http://localhost/360project/360%20proj/reset.php';

  try {
    //Server
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'wrc9817@gmail.com';                     //SMTP username
    $mail->Password   = '13163338455';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipient
    $mail->setFrom('wrc9817@gmail.com', 'Eric');
    $mail->addAddress($_SESSION['email']);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Reset password link';
    $mail->Body    = 'Hi,</br><p>Click the link below to reset your password</p></br><a href="' . $link . '">'.$link.'</a>';
/*     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 */    $mail->send();
    echo '<script>console.log("Message has been sent")</script>';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>

</html>