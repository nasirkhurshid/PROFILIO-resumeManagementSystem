<?php           //deleting all cookies and sessions when user signs out
    session_start();
    session_unset();
    session_destroy();
    setcookie('id',"",-1);
    unset($_COOKIE['id']);
    setcookie('random',"",-1);
    unset($_COOKIE['random']);
    header("Location:index.php", true, 301);
    die();
?>