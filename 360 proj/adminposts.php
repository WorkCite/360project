<?php
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
        if (isset($_SERVER['HTTP_REFERER']))
          $rlink = $_SERVER['HTTP_REFERER'];

            
        $sql = "SELECT * FROM post where username = '$username' OR email = '$email';";

        $results = mysqli_query($connection, $sql);

        if ($row = mysqli_fetch_assoc($results)){
        echo "<p>User already exists with this name and/or email</p>";
        echo '<a href="'.$rlink.'"> Return to user entry </a>';
        }else{
            $sql1 = "INSERT INTO users (username, email, password) values ('$username','$email',md5('$password'));";
            $results1 = mysqli_query($connection, $sql1);
            if($results1==True){
                echo "<p> $username account has been created</p>";
                echo '<a href="'.$rlink.'"> Return to user entry </a>';
            }
            
        }

        mysqli_free_result($results);
        mysqli_close($connection);
    }


    ?>