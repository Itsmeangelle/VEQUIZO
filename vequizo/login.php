<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__. "/database.php";

    $sql = sprintf("SELECT * FROM user
            WHERE email = '%s'",
            $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    session_start();

    $user = $result->fetch_assoc();

    if ($user) {
       if ( $_POST["password"] == $user["password"]){

        session_start();

        $_SESSION["user_id"] = $user["id"];

        header("Location: instrumentshowcase.html");

       } 
    }

    $is_invalid = true;  
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <script src="scipt.js"></script>
</head>
<body>
    <header>
        <nav>  
           <a href="http://127.0.0.1:5500/home.html" class="aimage"><img src="data:image/png;base64,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" alt="" class="a-image"></a>
            <ul>
                <li><a href="http://127.0.0.1:5500/home.html">Home</a></li>
                <li><a href="http://127.0.0.1/vequizo/register.php">Register</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <?php
            if($is_invalid){
                echo 'INVALID login';
            }
        ?>
        <form action="" method="post">
        <h1>LOGIN</h1>
        <div class="">Email</div>
        <input id="input-username" name="email" type="username" placeholder="USERNAME">
        <div class="">Password</div>
        <input id="input-password" type="password" name="password" placeholder="PASSWORD">
        <div class="forgot">
        <span class="password"><a href="#">Forgot Password?</a></span>
    </div>
        <div class="check">
            <input type="checkbox" checked="checked" name="remember"> Remember me
    </div>
        <div class="laysa">
        <button onclick="enter()">Login</button>  
    </div>  
        <div class="signin">
        <p>Don't have an account?</p>
        </form>
    </div>
    </div>
</body>
</html>