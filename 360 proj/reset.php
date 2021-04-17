<!DOCTYPE html>
<html>
<?php
session_start();
if ($_SESSION != null) {
$email = $_SESSION['email'];
}
?>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="./css/reset.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script language="JavaScript" type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/reset.css">
  <title>ResetPassword</title>
  <script language="javascript" type="text/javascript">
    function onChange() {
      var newp = $('.new');
      var repeat = $('.repeat');
      if (newp.val() != repeat.val()) {
        repeat.css('border', 'red');
      } else {
        repeat.css('border', 'black 2px');
      }
    }
  </script>
</head>
<?php
$Err1 = '';
$Err2 = '';
if (isset($_POST['button'])) { //check if form was submitted

  if (empty($_POST["new"])) {
    $Err1 = "Enter an email";
  } else {
    // new
    $nw = $_POST["new"];
  }
  if (empty($_POST["repeat"])) {
    $Err2 = "Email and password not found";
  } else {
    // repeat
    $rp = $_POST["repeat"];
  }
  if ($nw != $rp) {
    $Err1 = 'Password do not match';
    $Err2 = 'Password do not match';
  }
}
?>

<body>
  <form method="POST" class="reset">
    <label class="address">New Password:</label>
    <input name="new" required placeholder="12345678" onChange='onChange();' oninvalid="this.setCustomValidity('Enter your email address')" oninput="this.setCustomValidity('')" type="text">
    <p class="help-block"><?php echo $Err1; ?></p>
    <label class="address">Confirm New Password:</label>
    <input name="repeat" required placeholder="12345678" onChange='onChange();' oninvalid="this.setCustomValidity('Enter your email address')" oninput="this.setCustomValidity('')" type="text">
    <p class="help-block"><?php echo $Err2; ?></p>
    <button name="button" type="submit">Confirm</button>
  </form>
</body>
<?php
if(isset($_POST['button'])){
$host = "localhost";
$database = "360project";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    die($error);
} else {
  if($rp!=$nw){
    echo "<script> {window.alert('Entered passwords do not match. Please try again.');} </script>";
  }else{
    $temp = md5($nw);
    $sql = "UPDATE users SET password = '$temp' WHERE email = '$email';";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo '<script>console.log("Updated successfully!")</script>';
        echo "<script> {window.alert('Your password has been reset, go back to login page.');location.href='login.php'} </script>";
    } else {
        echo '<script>console.log("Updated unsuccessfully!")</script>';
    }
    mysqli_close($connection);
     $_SESSION['email']=null;
   }
  }
}
?>
</html>