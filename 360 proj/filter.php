<?php 
    if (isset($_POST['action']))
	{   
        $tag=$_POST['action'];
        $host = "localhost";
        $database = "360project";
        $user = "webuser";
        $password0 = "P@ssw0rd";
        $connection = mysqli_connect($host, $user, $password0, $database);
        $row = mysqli_fetch_assoc($results);
        if($error != null)
        {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
        }
        else
        {
            //good connection, so do you thing
            $sql="SELECT content,img,date,username FROM post WHERE tag='$tag' ORDER BY DESC;";
            $results = mysqli_query($connection, $sql);
            //and fetch requsults
            while($row = mysqli_fetch_assoc($results)){
                if($row != null){
                    $name = $row['username'];
                    $date = $row['date'];
                    $con  = $row['content'];
                    $tag = $row['tag'];
                    echo ' 
                    <div class="postBlock">
                    <div class="post">
                        <div class="postHeader">
                            <div class="author">
                                <p>'.$name.'</p>
                            </div>
                            <div class="postTime">
                                <p>&middot; '.$date.'</p>
                            </div>
                            <div class="postTag">
                                <p class="idp">    '.$tag.'</p>
                            </div>
                        </div>
                        <div class="content">
                            <p>'.$con.'</p>
                        </div>
                        <div class="image">
                            <img class="img" src="img/1.gif">
                        </div>
                        <div class="commentBlock">
                            <div class="commentIcon">
                                <img width="20pt" height="20pt" src="img/commentIcon.png">
                            </div>
                            <div class="comments">
                                <p>Comments</p>
                            </div>
                        </div>
                    </div>
                </div>';
                }
}
mysqli_free_result($results);
mysqli_close($connection); 
}
  }
?>