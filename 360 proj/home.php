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
        var xmlHttp;  
		function createXMLHttpRequest(){ 
			if(window.ActiveXObject){  
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");  
			}  
			else if(window.XMLHttpRequest){  
				xmlHttp = new XMLHttpRequest();  
			}  
		}  
        function foo(n){  
			createXMLHttpRequest();  
			var url="filter.php";  
			xmlHttp.open("POST",url,true); 
			xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlHttp.onreadystatechange = callback;  
			xmlHttp.send("action=" + n.value); 
		}
        function callback(){  
			if(xmlHttp.readyState == 4){  
				if(xmlHttp.status == 200){  
					alert(xmlHttp.responseText);
          location.reload();   
				}  
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
        <div class="innerComment">
            <button name="submit" type="submit" class="openComment">Comment</button>
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
                    $sql = "select content, date, username from comment;";
                    $results = mysqli_query($connection, $sql);
                    //and fetch requsults
                    while( $row = mysqli_fetch_assoc($results)){
                        if($row != null){
                            echo "<div class='eachcomment'>";
                            echo "<p style='display: inline-block'>".$row['username']."</p>";
                            echo "<p style='display: inline-block; margin-left:20px'>".$row['date']."</p>";
                            echo "<p>".$row['content']."</p>";
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
            <select name="tags">
                <option name="noption"value="" disabled selected hidden>Select Your Tag</option>
                <option value="Music">Music</option>
                <option value="Sports">Sports</option>
                <option value="Art">Art</option>
                <option value="Game">Game</option>
                <option value="None">None</option>

            </select>
            <textarea placeholder="Add description" oninvalid="this.setCustomValidity('Enter your description')" oninput="this.setCustomValidity('')" class="inputContent" name="inputContent" required></textarea>
            <div class="uploadedImageBlock">
                <span class="closeImage">&times;</span>
                <img class="uploadedImage" name="uploadedImage">
            </div>
        </div>
        <div class="formButton">
            <input type="submit" class="postButton" name="submit">
            <label class="fileToUpload" for="fileToUpload"><img width="30pt" height="30pt" src="img/attachmentIcon3.png"></label>
            <input onChange="readURL(this);" type="file" accept=".JPEG,.PNG,.GIF,.TIFF,.PDF" name="fileToUpload" id="fileToUpload">
        </div>
    </div>
</form>

<?php
/* ini_set("display_errors","On");
error_reporting(E_ALL); */
$posted = false;
if (isset($_POST['submit'])) {
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
        // tag
        if(isset($_POST['tags'])){
            $tag = $_POST['tags'];
        }
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
        $sql = "INSERT INTO post(postid,content,img,date,username,tag) VALUES (0,'$content','$img','$date','$username','$tag');";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            echo "<script> {window.alert('Post successfully.');location.href='home.php'} </script>";
            $posted = true;
        } else {
            echo "<script> {window.alert('Post unsuccessfully.');location.href='home.php'} </script>";
        }
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
                <div class="col"> <img class="postimg" src="./img/picture.png"></div>
                <div class="col"> <img class="postimg" src="./img/picture.png"></div>
                <div class="col"> <img class="postimg" src="./img/picture.png"></div>
            </div>
        </div>
        <div class="sub-header">
            <h1>Posts</h1>
        </div>
        <div id="myBtnContainer">
            <button class="btn" name="none"value="none"onclick="foo(this)"> Show all</button>
            <button class="btn" name="music"value="music"onclick="foo(this)"> Music</button>
            <button class="btn" name="sports"value="sports"onclick="foo(this)"> Sports</button>
            <button class="btn" name="art"value="art"onclick="foo(this)"> Art</button>
            <button class="btn" name="game"value="game" onclick="foo(this)"> Game</button>
        </div>
        <div class="popularposts">
            <div class="left">
                <!-- series of blocks -->
                <div class="posts">
                    <!-- single block -->
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
                    $type =$_SESSION['type'];
                    if($error != null)
                        {
                        $output = "<p>Unable to connect to database!</p>";
                        exit($output);
                        }
                        else
                        {
                            //good connection, so do you thing
                            $psql = "SELECT*FROM post WHERE tag = ".$type."ORDER BY DESC;";
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
                                        <img class="postimg" src="img/picture.png">
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
                   <!-- <div class="postBlock">
                        <div class="post">
                            <div class="postHeader">
                                <div class="author">
                                    <p>Author</p>
                                </div>
                                <div class="postTime">
                                    <p>&middot; Posted (time) ago</p>
                                </div>
                                <div class="postTag">
                                    <p class="idp">   tag</p>
                                </div>
                            </div>
                            <div class="content">
                                <p>This is a post.</p>
                            </div>
                            <div class="image">
                            <img class="postimg" src="./img/picture.png">
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
                                <div class="author">
                                    <p>Author2</p>
                                </div>
                                <div class="postTime">
                                    <p>&middot; Posted (time) ago</p>
                                </div>
                                <div class="postTag">
                                    <p class="idp">   tag</p>
                                </div>
                            </div>
                            <div class="content">
                                <p>This is a post2.</p>
                            </div>
                            <div class="image">
                            <img class="postimg" src="./img/picture.png">
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
                            <img class="postimg" src="./img/picture.png">
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