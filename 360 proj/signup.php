<!DOCTYPE html>
<html>
<?php
    $username =$_POST["username"];
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
        $sql1 = "select * from users where email like '$email';";
        $sql2 = "select * from users where username like '$username';";
        $results1 = mysqli_query($connection, $sql1);
        $results2 = mysqli_query($connection, $sql2);

        //and fetch requsults
        if((mysqli_fetch_assoc($results1))!=null||(mysqli_fetch_assoc($results2))!=null)
        {
        echo "User already exists with this name and/or email";
    }
    if((mysqli_fetch_assoc($results1))==null&&(mysqli_fetch_assoc($results2))==null){
        $sql3 = "insert into users(username,email, password) VALUES ('$username','$email','$p');";
        mysqli_query($connection, $sql3);
        echo $sql3.'<br>';
        echo $username.'<br>';
        echo $password;

    }
        mysqli_free_result($results1);
        mysqli_free_result($results2);
        mysqli_close($connection);
    }


?>
</html>