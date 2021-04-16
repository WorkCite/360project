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
        if (isset($_POST["username"])){
            $username = $_POST["username"];}

        $sql = "DELETE FROM users where username='$username';";
        
        $results = mysqli_query($connection, $sql);

        if ($results){
        echo "<p>User is being deleted</p>";
        echo '<a href="'.$rlink.'"> Return to user entry </a>';
        
        }else{
            
            echo "<p> $username account can't be deleted</p>";
            echo '<a href="'.$rlink.'"> Return to user entry </a>';
            
        }

        
        
        mysqli_close($connection);
    }


    ?>