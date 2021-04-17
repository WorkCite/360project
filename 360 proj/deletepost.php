<?php 
    if (isset($_POST['action']))
	{   
        $id=$_POST['action'];
        $sql="DELETE FROM post WHERE postid=$id;";
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
            $results = mysqli_query($connection, $sql);
            if($results){
                echo "Post: $id has been deleted";
            }
        }

	}
	


    ?>