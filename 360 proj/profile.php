<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if($_SESSION==null){
$_SESSION['isLogin']=null;
$_SESSION['isAdmin']=null;
}
else if($_SESSION!=null){
    echo "<script>console.log('session not null');</script>";}
if($_SESSION['isLogin']!=null){
    $username = $_SESSION['username'];
    //$email = $_SESSION['email'];
    echo "<script>console.log('login');</script>";
    echo "<script>console.log('$username'+'0' );</script>";
}
?>
<?php 
$uname = null;
$email = null;
$host = "localhost";
$database = "360project";
$user = "webuser";
$password0 = "P@ssw0rd";
$numimg = null;
$numpost = null;
$postimg = array();
$connection = mysqli_connect($host, $user, $password0, $database);
$error = mysqli_connect_error();
$tn = null;
if($error != null)
    {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
    }
    else
    {
        //good connection, so do you thing
        $sql = "select username, email from users where username = '$username';";
        $results = mysqli_query($connection, $sql);
        //and fetch requsults
        $row = mysqli_fetch_assoc($results);
        if($row != null){
            $uname = $row['username'];
            $email = $row['email'];
        }
       /* $sql1 = "select img from post where username = '$tname' ;";
        $results1 = mysqli_query($connection, $sql1);
        $row1 = mysqli_fetch_assoc($results1);
        if($row1 != null){
            for ($i=0; $i<sizeof($row1); $i++)
                {
                    echo "<script>console.log('$i');</script>";
                        array_push($postimg,$row1[$i]);
                        $numimg+=1;
                        echo "<script>console.log('$numimg');</script>";
                        echo "<script>console.log(".$row1[$i].");</script>";
                    
                }
        }*/
        $sql2 = "select * from post;";
        $results2 = mysqli_query($connection, $sql2);
        //and fetch requsults
        while($row2 = mysqli_fetch_assoc($results2)){
        if($row2 != null){
            $temp = $row2['postid'];
           echo "<script>console.log('co: '+".$row2['postid'].");</script>";
           //echo "<script>console.log($row2['postid']);</script>";
           //echo "<script>console.log($row2['postid']);</script>";
           $numpost +=1;
        }}
        /*$sql3 = "select img from post;";
        $results3 = mysqli_query($connection, $sql3);
        //and fetch requsults
        $row3 = mysqli_fetch_assoc($results3);
        if($row3 != null){
            $numimg = count($row3);
            $temp = $row3['postid'];
           echo "<script>console.log('co: '+$temp);</script>";
           //echo "<script>console.log($row2['postid']);</script>";
           //echo "<script>console.log($row2['postid']);</script>";
        }*/
        mysqli_close($connection);
        
    }
?>
<head>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/profile.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/prfile.js"></script>
    <title>My Discussion Forum Website</title>
</head>

<body>
    <!--about php-->
<?php 
$post = false;
if (isset($_POST['aboutbtn'])) {
    $host = "localhost";
    $database = "360project";
    $user = "webuser";
    $password = "P@ssw0rd";

    $connection = mysqli_connect($host, $user, $password, $database);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        die($error);
    } else {

        //  content
        if (isset($_POST['aboutInput'])) {
            $content = $_POST['aboutInput'];
        }
        $sqlcom = "INSERT INTO user(content) VALUES ('$content') WHERE username = '$username';";
        $resultcom = mysqli_query($connection, $sqlcom);
        if ($resultcom) {
            echo 'Posted successfully!';
            $post = true;
        } else {
            echo 'Posted unsuccessfully!';
        }
        mysqli_close($connection);
    }
}
?>
<header>
        <div class="header">
            <form class="search">
                <img class="searchIcon" src="./img/search_icon.png">
                <input type="search" placeholder="Search" class="searchBox">
            </form>
            <?php 
                if(isset($username)){
                    echo "<script>console.log('$username');</script>";
                    echo "
                    <div class='dropdown'>
                        <button class='username' name='username'>Welcome, $username!</button>
                        <div class='dropdown-content'>
                            <a href='profile.php'>Profile</a>
                            <a href='#'>Posts</a>
                            <a href='login.php'>Logout</a>
                        </div>
                    </div>";
                }
                else{
                    echo "<script>console.log('1username not get');</script>";
                    echo "<a class='active' href='login.php'>Login/Signup</a>";
                }
            ?>
            <a class="home" href="home.php">Home</a>
        </div>
    </header>
    <container class="grid">
            <div class="item1">
                <img class="i1-img" src="./img/user1.png">
            </div>
            <div class="item2">
            <?php 
                if(isset($username)){
                    echo "<script>console.log('$uname');</script>";
                    echo "<script>console.log('$email');</script>";
                    echo "
                    <h1>$username</h1>
                    <p>$email</p>
                    ";
                }
            ?>
            </div>
            <div class="item0"> 
            </div>
            <div class="item3">
                <button class="i3-but">Edit profile</button>
            </div>
            <div class="item3-5">
            </div>
            <div class="item4">
            <?php 
                echo "<h3>".$numpost."</h3>";
            ?>
                <p>Photos</p>
            </div>
            <div class="item5">
            <?php 
                echo "<h3>".$numpost."</h3>";
            ?>
                <p>Posts</p>
            </div>
            <div class="item6">
                <h2 style="margin-left: 10%;">About</h2>
                <div class="intro"> 
                    <p style="padding: 5px;">Introduce yourself to everyone!</p>
                </div>
            </div>
            <div class="item7">
                <h2 style="margin-left: 10%;">Recent Photo</h2>
                <div class="i7-content"> 
                    <img class="postimg" src="./img/picture.png">
                    <img class="postimg" src="./img/picture.png">
                    <img class="postimg" src="./img/picture.png">
                    <img class="postimg" src="./img/picture.png">
                    <?php 
                   /* if($postimg != null){
                        for ($i=0; $i<sizeof($postimg); $i++)
                            {
                                if($postimg[$i] != null)
                                echo "<img class='postimg' src=".$postimg[i].">;";
                            }
                    }*/
                    ?>
                </div>
            </div>
    </container>
    <footer>
        <div class="sub-footer">
            <p><a href="home.html">Home</a> |
                <a href="#">Search</a>
            </p>
        </div>
        <div class="copyright">
        <p>Copyright Â© WorkCite Github student group</p>
        </div>
    </footer>
</body>

</html>