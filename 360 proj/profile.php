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
        $sql = "select username, email from users where username = '$username';";
        $results = mysqli_query($connection, $sql);
        //and fetch requsults
        $row = mysqli_fetch_assoc($results);
        if($row !=null){
            $uname = $row['username'];
            $email = $row['email'];
        }
        
        mysqli_close($connection);
        
    }
?>
<head>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/profile.css">
    <title>My Discussion Forum Website</title>
</head>

<body>
<header>
        <div class="header">
            <form class="search">
                <img class="searchIcon" src="./img/search_icon.png">
                <input type="search" placeholder="Search" class="searchBox">
            </form>
            <?php 
                if(isset($username)){
                    echo "<script>console.log($username);</script>";
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
                    echo "<script>console.log($uname);</script>";
                    echo "<script>console.log($email);</script>";
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
                <h3>Number</h3>
                <p>Photos</p>
            </div>
            <div class="item5">
                <h3>Number</h3>
                <p>Posts</p>
            </div>
            <div class="item6">
                <h2 style="margin-left: 10%;">About</h2>
                <div class="intro"> 
                    <p style="padding: 5px;">Text messaging, or texting, is the act of composing and sending electronic messages, typically consisting of alphabetic and numeric characters, between two or more users of mobile devices, desktops/laptops, or other type of compatible computer. Text messages may be sent over a cellular network, or may also be sent via an Internet connection.</p>
                </div>
            </div>
            <div class="item7">
                <h2 style="margin-left: 10%;">Recent Photo</h2>
                <div class="i7-content">
                    <img src="./img/1.gif">
                    <img src="./img/1.gif">
                    <img src="./img/1.gif">
                    <img src="./img/1.gif">
                </div>
            </div>
            <div class="item8">
                <h2 style="margin-left: 10%;">Post</h2>

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