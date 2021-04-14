<!DOCTYPE html>
<html>
<?php
    $password = $_POST["password"];
    $email = $_POST["email"];
    $p=md5($password);
    $host = "localhost";
    $database = "360project";
    $user = "webuser";
    $password0 = "P@ssw0rd";
    $connection = mysqli_connect($host, $user, $password0, $database);
    $error = mysqli_connect_error();
if($error != null)
    {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
    }
    else
    {
        //good connection, so do you thing
        $sql = "select * from users where email='$email';";
        $results = mysqli_query($connection, $sql);
        //and fetch requsults
        $row = mysqli_fetch_assoc($results);
        if($row !=null){
            if($row['password']==$p){
                echo $row['password']."<br>";
                echo "Username and password are valid";
            }
            else{
                echo $row['password']."<br>";
                echo "Username is unvalid.";
            }
        }
        
        mysqli_close($connection);
    }


?>
</html>