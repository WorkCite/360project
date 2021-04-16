<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
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
    $nw = $_POST["new"];
  }
  if (empty($_POST["repeat"])) {
    $Err2 = "Email and password not found";
  } else {
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

</html>