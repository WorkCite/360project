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

?>
    <head>
        <link rel="stylesheet" href="./css/admin.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/admin.js"></script>
        <title>Admin control</title>
    </head>

<body>
<<<<<<< HEAD
    <header>
=======
    
    <!--<header>

>>>>>>> b66767358178a0833d6ef7b14286aadf120009da
        <div class="header">
            <form class="search">
                <img class="searchIcon" src="./img/search_icon.png">
                <input type="search" placeholder="Search" class="searchBox">
<<<<<<< HEAD
            </form>     
        <a class="active" href="login.php">Admin</a>
        <a class="home" href="home.php">Home</a>
=======
            </form>
        
        
    </div>-->
    </header> 
    <div class="adduser">
    <form method="post" action="signup.php">
        <input   type="text" placeholder="username" name="username" id="username">
        <input   type="email" placeholder="email" name="email" id="email">
        <input   type="password" placeholder="password" name="password" id="password">
        
        <button  onclick="form.submit()">Add User</button>
    </form>
>>>>>>> b66767358178a0833d6ef7b14286aadf120009da
    </div>

    <?php
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
        
        $sql = "select username from users;";
        $results = mysqli_query($connection, $sql);
        //and fetch requsults
        echo  "<div class='table'>";
        echo "<table>";
        echo "<tr><th>User</th><th>Number of Posts</th><th>Delete User</th></tr>";
        
        while($row = mysqli_fetch_assoc($results)){
            foreach($row as $e){
               
                echo "<tr><td> " .$e. "</td><td> 0 </td><td><button id='userna'> &#10003; </button></td></tr>";
               
           }    
        }
        echo "</table>";
        echo "</div>";

        echo "<br/>";
        echo "<button class='add'>Add User</button>";
        mysqli_close($connection);
    }


    ?>
    
</body>

</html>