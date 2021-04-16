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

            
        $sql = "SELECT post.content, post.img, post.date FROM post,user where post.username = user.username;";

        $results = mysqli_query($connection, $sql);
        
        if (true){
        echo $results;
        echo '<a href="'.$rlink.'"> Return to user entry </a>';
        //mysqli_free_result($results);
        }

        
        mysqli_close($connection);
    }


    ?>