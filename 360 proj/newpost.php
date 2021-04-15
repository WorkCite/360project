<!DOCTYPE html>
<html>
<?php
$host = "localhost";
$database = "360project";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  die($error);
}else{
//  content
if(isset($_POST['inputContent'])){
  $content = $_POST['inputContent'];
}
// date
date_default_timezone_set('America/Los_Angeles');
$date = date('Y-m-d h:i:s a');

//test
/* echo $date;
 */

// img
if(isset($_POST['fileToUpload'])){
  $img = $_POST['fileToUpload'];
}

//test
/* echo $img;
$img2 = null; */

// username
if(isset($_POST['username'])){
  $username = $_POST['username'];
}else{
  $username = 'test';
}

// test
/* echo $username."----------------- ";
 */

$sql="INSERT INTO post(postid,content,img,date,username) VALUES (0,'$content','$img','$date','$username');";
$result = mysqli_query($connection, $sql);

/* echo $result;
 */

if($result){
  echo 'Posted successfully!';
  mysqli_free_result($result);

}else{
  echo 'Posted unsuccessfully!';
  mysqli_free_result($result);

}
mysqli_close($connection);

}
?>