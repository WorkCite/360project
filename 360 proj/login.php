<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    $_SESSION['username']=null;
    if(isset( $_POST["spassword"])){
        $spassword = $_POST["spassword"];
        $semail = $_POST["semail"];
        $susername = $_POST["susername"];
        $sp=md5($spassword);
    }
    else if(isset( $_POST["lpassword"])){
    $lemail = $_POST["lemail"];
    $lpassword = $_POST["lpassword"];
    $lp=md5($lpassword);
    }
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
        if(isset($lpassword)){
        $sql = "select * from users where email='$lemail';";
        $results = mysqli_query($connection, $sql);
        //and fetch requsults
        $row = mysqli_fetch_assoc($results);
        if($row !=null){
            if($row['password']==$lp){
                $_SESSION['username'] = $row['username'];
                $_SESSION['isLogin']=true;
                echo "<script> {window.alert('Login success, go back to home page after 3s.');location.href='home.php'} </script>";
                
            }
            else{
                echo "<script> {window.alert('Username and password do not match.');location.href='home.php} </script>";
            }
        }
        
        mysqli_close($connection);
    }else if(isset($spassword)){
        $sql1 = "select * from users where email like '$email';";
        $sql2 = "select * from users where username like '$username';";
        $results1 = mysqli_query($connection, $sql1);
        $results2 = mysqli_query($connection, $sql2);

        //and fetch requsults
        if((mysqli_fetch_assoc($results1))!=null||(mysqli_fetch_assoc($results2))!=null)
        {
        echo "<script> {window.alert('User already exists with this name and/or email');} </script>";
        }
        if((mysqli_fetch_assoc($results1))==null&&(mysqli_fetch_assoc($results2))==null){
            $sql3 = "insert into users(username,email, password) VALUES ('$susername','$semail','$sp');";
            mysqli_query($connection, $sql3);
            $_SESSION['username'] = $susername;
            $_SESSION['isLogin']=true;
            echo "<script> {window.alert('Sign up success, go back to home page after 3s.');location.href='home.php} </script>";
        }
        mysqli_free_result($results1);
        mysqli_free_result($results2);
        mysqli_close($connection);
    }
    
}

?>
<head>
    <meta charset="utf-8">

    <title>Login - Signup</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/login.css">

</head>

<body>
    
    <div class="loginwindow" id="loginmodel">
        <div class="form-container sign-up-container">
            <form method="post" action="" id="signupForm">
                <h1>Sign up</h1>
                <div class="social-container">
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                </div>
                <span>Use Email</span>
                <input type="text" placeholder="username" name="susername" id="susername">
                <input type="email" placeholder="email" name="semail" id="semail">
                <input type="password" placeholder="password" name="spassword" id="spassword">
                <button onclick="form.submit()">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="post" action="" id="loginForm">
                <h1>Login</h1>
                <div class="social-container">
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                </div>
                <span>Already have account?</span>
                <input type="email" placeholder="email" name="lemail">
                <input type="password" placeholder="password" name="lpassword">
                <a href="#">Forget Password?</a>
                <button onclick="form.submit()">Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Already have account?</h1>
                    <p>Please use your account to login</p>
                    <button class="ghost" id="signIn">Login</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Do not have an account?</h1>
                    <p>Sign up right now!</p>
                    <button class="ghost" id="signUp">Sign up</button>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer">
            <p><a href="home.php">Home</a> |
                <a href="#">Search</a>
            </p>
        </div>
        <div class="copyright">
        <p>Copyright © WorkCite Github student group</p>
        </div>
    </footer>
    <script src="js/login.js"></script>
</body>

</html>