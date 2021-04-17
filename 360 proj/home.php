<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if ($_SESSION == null) {
    $_SESSION['isLogin'] = null;
    $_SESSION['isAdmin'] = null;
} else if ($_SESSION != null) {
    echo "<script>console.log('session not null');</script>";
}
if ($_SESSION['isLogin'] != null) {
    $username = $_SESSION['username'];
    echo "<script>console.log('login');</script>";
    echo "<script>console.log('$username'+'0');</script>";
}


?>

<head>
    <?xml version="1.0" encoding="utf-8"?>
    <link rel="stylesheet" href="./css/home.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
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
                        .css('display', 'unset');
                    close.css('display', 'inline-block');
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
        <div class = "innerComment">
            <button name="csubmit" type="submit"class="openComment">Comment</button>
        </div>
        <div class="commentlist">
            <?php 

            //$pid = $_SESSION['postid'];
            //$pid = $_SESSION['postid'];
            //echo "<script>console.log('pid'+'$pid');</script>";
            //$q = intval($_POST['q']);
            //echo "<script>console.log('pid: '+'$q');</script>";
            $host = "localhost";
            $database = "360project";
            $user = "webuser";
            $password0 = "P@ssw0rd";
            $connection = mysqli_connect($host, $user, $password0, $database);
            $error = mysqli_connect_error();
            $comcontent = null;
            if($error != null)
                {
                $output = "<p>Unable to connect to database!</p>";
                exit($output);
                }
                else
                {
                    //good connection, so do you thing
                    $sql = "select content, date from comment;";
                    $results = mysqli_query($connection, $sql);
                    //and fetch requsults
                    while( $row = mysqli_fetch_assoc($results)){
                        if($row != null){
                            echo "<div class='eachcomment'>";
                            echo "<p style='display: inline-block'>".$row['content']."</p>";
                            echo "<p style='display: inline-block'>".$row['date']."</p>";
                            echo "<hr>";
                            echo "</div>";
                        }
                    }
                    
                    mysqli_close($connection);
                    
                }
            ?>
        </div>
    </div>
</div>
<?php 
$postcom = false;
if (isset($_POST['innerSubmit'])) {
    $host = "localhost";
    $database = "360project";
    $user = "webuser";
    $password = "P@ssw0rd";
    $temppid = $_SESSION['postid'];
    $connection = mysqli_connect($host, $user, $password, $database);

    $error = mysqli_connect_error();
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        die($error);
    } else {

        //  content
        if (isset($_POST['commentInput'])) {
            $contentcom = $_POST['commentInput'];
        }

        // date
        date_default_timezone_set('America/Los_Angeles');
        $datecom = date('Y-m-d h:i:s a');

        // username
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        } else {
            $username = 'test';
        }
        $sqlcom = "INSERT INTO comment(commentid,content,date,username,postid) VALUES (0,'$contentcom','$datecom','$username','$temppid');";//只能传实时

        $resultcom = mysqli_query($connection, $sqlcom);
        if ($resultcom) {
            echo 'Posted successfully!';
            $postcom = true;
        } else {
            echo 'Posted unsuccessfully!';
        }
        mysqli_close($connection);
    }
}
?>
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
            <textarea placeholder="Add description" oninvalid="this.setCustomValidity('Enter your description')" oninput="this.setCustomValidity('')" class="inputContent" name="inputContent" required></textarea>
            <div class="uploadedImageBlock">
                <span class="closeImage">&times;</span>
                <img class="uploadedImage" name="uploadedImage">
            </div>
        </div>
        <div class="formButton">
            <input type="submit" class="postButton" name="psubmit">
            <label class="fileToUpload" for="fileToUpload"><img width="30pt" height="30pt" src="img/attachmentIcon3.png"></label>
            <input onChange="readURL(this);" type="file" accept=".JPEG,.PNG,.GIF,.TIFF,.PDF" name="fileToUpload" id="fileToUpload">
        </div>
    </div>
</form>

<?php
/* ini_set("display_errors","On");
error_reporting(E_ALL); */
$posted = false;
if (isset($_POST['psubmit'])) {
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
        if (isset($_POST['inputContent'])) {
            $content = $_POST['inputContent'];
        }

        // date
        date_default_timezone_set('America/Los_Angeles');
        $date = date('Y-m-d h:i:s a');

        // img
        if (isset($_POST['submit'])) {
            $form_data = $_FILES['fileToUpload']['tmp_name'];
            // img binary data
            $img = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
        } else {
            $img = null;
        }
        // username
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
        } else {
            $username = 'test';
        }
        $sql = "INSERT INTO post(postid,content,img,date,username) VALUES (0,'$content','$img','$date','$username');";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo "<script> {window.alert('Post successfully.');location.href='home.php'} </script>";
            $posted = true;
        } else {
            echo "<script> {window.alert('Post unsuccessfully.');location.href='home.php'} </script>";
        }
        /*$sqlp = "SELECT postid FROM post WHERE content = '$content' AND username = '$username';";
        $resultp = mysqli_query($connection, $sqlp);
        $rowp = mysqli_fetch_assoc($resultp);
        if($rowp != null){
         $_SESSION['postid'] = $rowp['postid'];
         echo "<script>console.log('".$_SESSION['postid']."');</script>";
        }*/
        mysqli_close($connection);
    }
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
            if (isset($username)) {
                echo "<script>console.log('$username');</script>";
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
            } else {
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
                <div class="col"> <img class="allimg" src="img/picture.png"></div>
                <div class="col"> <img class="allimg" src="img/picture.png"></div>
                <div class="col"> <img class="allimg" src="img/picture.png"></div>
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
                    <?php
                    if ($posted) {
                        date_default_timezone_set('America/Los_Angeles');
                        $postedTime = date('Y-m-d h:i:s a');
                        $diff = abs(strtotime($postedTime) - strtotime($date));
                        $years   = floor($diff / (365 * 60 * 60 * 24));
                        $months  = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                        $days    = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                        $hours   = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24) / (60 * 60));
                        $minutes  = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60) / 60);
                        $seconds = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24 - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minuts * 60));
                        /*echo '<div class="postBlock">
                        <div class="post">
                            <div class="postHeader">
                                <div class="authorIcon">
                                    <img width="20pt" height="20pt">
                                </div>
                                <div class="author"><p>' . $username . '</p></div>
                                <div class="postTime"><p>&middot; ';*/
                        if ($years >= 1) {
                            echo $years;
                        }
                        if ($years < 1 && $months >= 1) {
                            echo $months;
                        }
                        if ($months < 1 && $days >= 1) {
                            echo $days;
                        }
                        if ($days < 1 && $hours >= 1) {
                            echo $hours;
                        }
                        if ($hours < 1 && $minutes >= 1) {
                            echo $minutes;
                        }
                        if ($minutes < 1 && $seconds >= 1) {
                            echo $seconds;
                        }
                        /* pull $img from DB and $img should be converted to src */
                        /* TODO 
                        echo 'ago</p>
                    </div>
                        </div>
                            <div class="content">
                                <p>' . $content . '</p>
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
            </div>';*/
                    }
                    ?>
                    <?php 
                    //$pid = $_SESSION['postid'];
                    //echo "<script>console.log('pid'+'$pid');</script>";
                    $host = "localhost";
                    $database = "360project";
                    $user = "webuser";
                    $password0 = "P@ssw0rd";
                    $connection = mysqli_connect($host, $user, $password0, $database);
                    $error = mysqli_connect_error();
                    $pname = null;
                    $pcon = null;
                    $pdate = null;
                    $ptempid = null;
                    $_SESSION['postid']=null;
                    if($error != null)
                        {
                        $output = "<p>Unable to connect to database!</p>";
                        exit($output);
                        }
                        else
                        {
                            //good connection, so do you thing
                            $psql = "SELECT*FROM post;";
                            $presults = mysqli_query($connection, $psql);
                            //and fetch requsults
                            while($prow = mysqli_fetch_assoc($presults)){
                                if($prow != null){
                                    $pname = $prow['username'];
                                    $pdate = $prow['date'];
                                    $pcon  = $prow['content'];
                                    $ptempid = $prow['postid'];
                                    $_SESSION['postid'] = $ptempid;
                                    echo ' 
                                    <div class="postBlock">
                                    <div class="post">
                                        <div class="postHeader">
                                            <div class="authorIcon">
                                                <img width="20pt" height="20pt">
                                            </div>
                                            <div class="author">
                                                <p>'.$pname.'</p>
                                            </div>
                                            <div class="postTime">
                                                <p>&middot; '.$pdate.'</p>
                                            </div>
                                            <div class="postTime">
                                                <p class="idp">'.$ptempid.'</p>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <p>'.$pcon.'</p>
                                        </div>
                                        <div class="image">
                                        <img class="allimg" src="img/picture.png">
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
                            mysqli_free_result($presults);
                            mysqli_close($connection); 
                        }
                    ?>
                    <!--post model
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
                    </div>-->
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
                <a href="#">
                    <p>1 zzw</p>
                </a>
                <a href="#">
                    <p>2 wrc</p>
                </a>
                <a href="#">
                    <p>3 yyht</p>
                </a>
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