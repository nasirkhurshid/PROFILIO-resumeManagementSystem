<?php           //functions for redirecting to different pages
    function redirect_addUser(){
        header("Location: addUser.php", true, 301);
        die();
    }
    function redirect_index(){
        header("Location: index.php", true, 301);
        die();
    }
    function redirect_in(){
        header("Location: signin.php", true, 301);
        die();
    }
    function redirect_up(){
        header("Location: signup.php", true, 301);
        die();
    }
    function redirect_show(){
        header("Location: show.php", true, 301);
        die();
    }
    function redirect_updateUser(){
        header("Location: update.php", true, 301);
        die();
    }
?>