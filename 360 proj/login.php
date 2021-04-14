﻿<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Login - Signup</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/login.css">

</head>

<body>
    
    <div class="dowebok" id="dowebok">
        <div class="form-container sign-up-container">
            <form method="post" action="signup.php" id="signupForm">
                <h1>Sign up</h1>
                <div class="social-container">
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                </div>
                <span>Use Email</span>
                <input type="text" placeholder="username" name="username" id="username">
                <input type="email" placeholder="email" name="email" id="email">
                <input type="password" placeholder="password" name="password" id="password">
                <button onclick="form.submit()">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="post" action="verifylogin.php" id="loginForm">
                <h1>Login</h1>
                <div class="social-container">
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                    <a href="#" class="social"></a>
                </div>
                <span>Already have account?</span>
                <input type="email" placeholder="email" name="email">
                <input type="password" placeholder="password" name="password">
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