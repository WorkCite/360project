<?php
    session_start();
    $_SESSION['numposts']=null;
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

        //sql error
        //$sql = "SELECT * from users where username = '".$_SESSION['user']."'";
        $sql = 'SELECT p.content, p.img, p.date FROM post as p,user as u WHERE p.username = u.username;';

        $results = mysqli_query($connection, $sql);
        
        while($row = mysqli_fetch_assoc($results)){
          if($row != null){
            echo $row;
            $numpost +=1;
            echo '<a href="'.$rlink.'"> Return to user entry </a>';
          }
          // need to send $numpost to admin.php table column number of posts, can be done by Session
          $_SESSION['numposts']=$numpost;
        }
        
        
        mysqli_close($connection);
    }


    ?>