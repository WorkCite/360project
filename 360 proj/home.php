<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/home.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
    <script type="text/javascript" src="js/home2.js"></script>

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
<form class="newpost-form">
    <div class="mainform">
        <div class="formheader">
            <span class="closeform">&times;</span>
        </div>
        <div class="formlayout">
            <div class="titleBlock">
                <label class="title">Title</label>
                <input class="inputTitle" type="text"></br>
            </div>
            <textarea class="inputContent" placeholder="type your content"></textarea>
        </div>
            <div>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Submit" name="submit">
            </div>
    </div>
</form>

<body>
    <header>
        <div class="header">
            <form class="search">
                <img class="searchIcon" src="./img/search_icon.png">
                <input type="search" placeholder="Search" class="searchBox">
            </form>
            <a class="active" href="login.php">Login/Signup</a>
            <a class="newpost">New Post</a>
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
            <h1>Popular Posts</h1>
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
        <div class="footer">
            <p><a class="home" href="home.php">Home</a> 
            </p>
        </div>
        <br/><br/>
        <div class="copyright">
            <p>Copyright © WorkCite Github student group</p>
        </div>
    </footer>
</body>

</html>