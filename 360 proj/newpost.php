<!DOCTYPE html>
<html>
<?php
if(isset($_POST['inputContent'])){
  $content = $_POST['inputContent'];
}

date_default_timezone_set('Canada/Vancouver');
$date = date('Y-m-d H:i:s');
echo $date;

?>