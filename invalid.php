<?php           //if a login is invalid
    session_start();
    require_once("redirection.php");
    if(isset($_SESSION['id']) || isset($_COOKIE['id'])){        //redirections for signed in or signed up user
        redirect_show();
    }
    else if(isset($_SESSION['user'])){
        redirect_addUser();
    }
?><head>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="styles1.css">
</head>
<h1>Invalid Login</h1>
<button><a href="signin.php" style="color:black">Sign In</a></button>
<button><a href="signup.php" style="color:black">Sign Up</a></button>