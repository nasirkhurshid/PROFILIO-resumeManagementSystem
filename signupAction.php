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
    if(isset($_POST)){
        if(isset($_POST['user'])){
            $user = $_POST['user'];
        }
        else{
            redirect_up();
        }
        if(isset($_POST['pass1'])){
            $pass1 = $_POST['pass1'];
        }
        else{
            redirect_up();
        }
        if(isset($_POST['pass2'])){
            $pass2 = $_POST['pass2'];
            if($pass1 != $pass2){
                redirect_up();
            }
        }
        else{
            redirect_up();
        }
    }
    else{
        redirect_up();
    }
    if($user=="" || $pass1=="" || $pass2==""){
        redirect_up();
    }
    $conn = DB_S.":host=".DB_H.";dbname=".DB_N;
    try{
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "INSERT INTO users (username,password) VALUES (:user, :pass)";
        $stmt = $pdo->prepare($sql);
        $user = filter_var($user,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass1 = filter_var($pass1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':pass', $pass1);
        $res = $stmt->execute();
        if($res){
            $id = $pdo->lastInsertId();
            $_SESSION['user'] = $id;        //setting session against user when user has only signed up
            redirect_addUser();
        }
        else{
            redirect_up();
        }
    }
    catch(PDOException $e){
        die("Server Error");
    }

?>