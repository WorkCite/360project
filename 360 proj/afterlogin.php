<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/afterlogin.css">
    <title>My Discussion Forum Website</title>
</head>

<body>
    <header>
        <div class="header">
            <form class="search">
                <img class="searchIcon" src="./img/search_icon.png">
                <input type="search" placeholder="Search" class="searchBox">
            </form>
            <div class="dropdown">
                <button class="dropbtn">Username</button>
                <div class="dropdown-content">
                <a href="#">Profile</a>
                <a href="#">Posts</a>
                <a href="#">Logout</a>
                </div>
                </div>
                
        <a class="newpost" href="newpost.php">New Post</a>
        <a class="home" href="home.php">Home</a>
    </div>
    </header>
    <div class="center">
        <div class="row">
            <div class ="sub-header">
                <h1>Trending</h1>
            </div>
            <div class="group">
            <div class="col">p1</div>
            <div class="col">p2</div>
            <div class="col">p3</div>
            <div class="col">p4</div>
            <div class="col">p5</div>
            </div>
        </div>
        <div class ="sub-header">
            <h1>Popular Posts</h1>
            </div>
        <div class="popularposts">
            <div class="left">
                <div class="posts">
                <img class="img" src="img/1.gif">
                <img class="img" src="img/1.gif">
                <img class="img" src="img/1.gif">
                <img class="img" src="img/1.gif">
                <img class="img" src="img/1.gif">
                </div>
            </div>
            <div class="right">
                <div class ="sub-header">
                <h2>Top view posts</h2>
                </div>
                <p>1 zzw</p>
                <p>2 wrc</p>
                <p>3 yyht</p>
            </div>
        </div>
    </div>
    <footer>
        <div class="sub-footer">
            <p><a href="home.php">Home</a> |
                <a href="#">Search</a>
            </p>
        </div>
        <div class="copyright">
        <p>Copyright © WorkCite Github student group</p>
        </div>
    </footer>
</body>

</html>