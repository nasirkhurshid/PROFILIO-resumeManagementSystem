<?php
    session_start();
    require_once("redirection.php");
    require_once("config.inc.php");
    
    if(isset($_SESSION['id'])){
        redirect_show();
    }
    else if(isset($_SESSION['user'])){
        redirect_addUser();
    }
    if(isset($_COOKIE['id'])){
        redirect_show();
    }
    
    if (!isset($_GET['user']))
        redirect_up();
    $user = $_GET['user'];
    $conn = DB_S.':host='.DB_H.';dbname='.DB_N;
    try {
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = 'SELECT * FROM users WHERE username=:user';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':user',$user);
        $stmt->execute();
        if ($rec = $stmt->fetch()) {
            if($rec['username']==$user){
                echo "true";
            } else {
                echo "false";
            }
        }
        else {
            echo "false";
        }
    } catch (PDOException $e) {
        die("Server Error");
    }    
?>