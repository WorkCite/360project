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
    echo "<script>console.log('login');</script>";
    echo "<script>console.log('$username'+'0');</script>";
}


?>
<head>
    <link rel="stylesheet" href="./css/home.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
    <script type="text/javascript" src="js/home2.js"></script>
    <script language="javascript" type="text/javascript">
        function readURL(input) {
                var close = $('.closeImage');
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.uploadedImage')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200)
                        .css('display','unset'); 
                    close.css('display','inline-block');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <title>My Discussion Forum Website</title>
</head>
<!-- block modal -->
<div class="modal" title="Basic dialog">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="paragraph">
        </div>
    </div>
</div>

<!-- newpost form -->
<form class="newpost-form" method="POST" action="" enctype="multipart/form-data">
    <div class="mainform">
        <div class="formheader">
            <span class="closeform">&times;</span>
        </div>
        <div class="formlayout">
            <!--             <div class="titleBlock">
                <label class="title">Title</label>
                <input class="inputTitle" type="text"></br>
            </div> -->
                <textarea placeHolder="type your content"class="inputContent" name="inputContent"></textarea>
                <div class="uploadedImageBlock">
                    <span class="closeImage">&times;</span>
                   <img class="uploadedImage" name="uploadedImage">
                </div>
        </div>
        <div class="formButton">
            <input type="submit" class="postButton">
            <label class="fileToUpload" for="fileToUpload"><img width="30pt" height="30pt" src="img/attachmentIcon3.png"></label>
            <input onChange="readURL(this);" type="file" accept=".JPEG,.PNG,.GIF,.TIFF,.PDF" name="fileToUpload" id="fileToUpload">
        </div>
    </div>
</form>
<?php
$host = "localhost";
$database = "360project";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  die($error);
}else{
//  content
if(isset($_POST['inputContent'])){
  $content = $_POST['inputContent'];
}
// date
date_default_timezone_set('America/Los_Angeles');
$date = date('Y-m-d h:i:s a');

// img
if(isset($_POST['fileToUpload'])){
  $img = $_POST['fileToUpload'];
}


// username
if(isset($_POST['username'])){
  $username = $_POST['username'];
}else{
  $username = 'test';
}

$sql="INSERT INTO post(postid,content,img,date,username) VALUES (0,'$content','$img','$date','$username');";
$result = mysqli_query($connection, $sql);

if($result){
  echo 'Posted successfully!';
  mysqli_free_result($result);

}else{
  echo 'Posted unsuccessfully!';
  mysqli_free_result($result);

}
mysqli_close($connection);

}
?>

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
                    </div>
                    <a class='newpost'>New Post</a>";
                }
                else{
                    echo "<script>console.log('1username not get');</script>";
                    echo "<a class='active' href='login.php'>Login/Signup</a>";
                }
            ?>
            <a class="home" href="home.php">Home</a>
        </div>
    </header>

    <div class="center">
        <div class="row">
            <div class="sub-header">
                <h1>Trending</h1>
            </div>
            <div class="group">
                <div class="col"> <img  src="img/1.gif"></div>
                <div class="col"> <img  src="img/1.gif"></div>
                <div class="col"> <img  src="img/1.gif"></div>
            </div>
        </div>
        <div class="sub-header">
            <h1>Posts</h1>
        </div>
        <div id="myBtnContainer">
            <button class="btn " onclick="filterSelection('all')"> Show all</button>
            <button class="btn " onclick="filterSelection('music')"> Music</button>
            <button class="btn " onclick="filterSelection('sports')"> Sports</button>
            <button class="btn " onclick="filterSelection('art')"> Art</button>
            <button class="btn " onclick="filterSelection('game')"> Game</button>
          </div>
        <div class="popularposts">
            <div class="left">
                <!-- series of blocks -->
                <div class="posts">
                    <!-- single block -->
                    <div class="postBlock">
                        <div class="post">
                            <div class="postHeader">
                                <div class="authorIcon">
                                    <img width="20pt" height="20pt">
                                </div>
                                <div class="author">
                                    <p>Author</p>
                                </div>
                                <div class="postTime">
                                    <p>&middot; Posted (time)</p>
                                </div>
                            </div>
                            <div class="content">
                                <p>This is a post.</p>
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
                    </div>
                    <div class="postBlock">
                        <div class="post">
                            <div class="postHeader">
                                <div class="authorIcon">
                                    <img width="20pt" height="20pt">
                                </div>
                                <div class="author">
                                    <p>Author2</p>
                                </div>
                                <div class="postTime">
                                    <p>&middot; Posted (time)</p>
                                </div>
                            </div>
                            <div class="content">
                                <p>This is a post2.</p>
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
                    </div>
                    <div class="postBlock">
                        <div class="post">
                            <div class="postHeader">
                                <div class="authorIcon">
                                    <img width="20pt" height="20pt">
                                </div>
                                <div class="author">
                                    <p>Author3</p>
                                </div>
                                <div class="postTime">
                                    <p>&middot; Posted (time)</p>
                                </div>
                            </div>
                            <div class="content">
                                <p>This is a post3.</p>
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
                    </div>
                    <!--                     <div class="post">
                        <div class="postTitle">
                            <h2>post1</h2>
                        </div>
                        <img class="img" src="img/1.gif">
                    </div>
                    <div class="post">
                        <div class="postTitle">
                            <h2>post1</h2>
                        </div>
                        <img class="img" src="img/1.gif">
                    </div>
                    <div class="post">
                        <div class="postTitle">
                            <h2>post1</h2>
                        </div>
                        <img class="img" src="img/1.gif">
                    </div> -->
                </div>
            </div>
            <div class="right">
                <div class="sub-header">
                    <h2>Top view posts</h2>
                </div>
                <a href="#"><p>1 zzw</p></a>
                <a href="#"><p>2 wrc</p></a>
                <a href="#"><p>3 yyht</p></a>
            </div>
        </div>
    </div>

    <footer>
        <div class="copyright">
            <p>Copyright © WorkCite Github student group</p>
        </div>
    </footer>
</body>

</html>