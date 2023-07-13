<?php
    session_start();
    require_once("redirection.php");
    require_once("config.inc.php");
    //redirections depending upon user's state
    if(isset($_SESSION['id'])){
        redirect_show();
    }
    else if(isset($_SESSION['user'])){
        redirect_addUser();
    }
    if(isset($_COOKIE['id'])){
        redirect_show();
    }
    if(isset($_POST)){          //checking if user has entered data through form
        if(isset($_POST['user'])){
            $user = $_POST['user'];
        }
        else{
            redirect_in();          //redirection if user has not entered username (data)
        }
        if(isset($_POST['pass'])){
            $pass = $_POST['pass'];
        }
        else{
            redirect_in();
        }
        if(isset($_POST['rem'])){
            $rem = $_POST['rem'];
        }
        else{
            $rem = "off";
        }
    }
    else{
        redirect_in();
    }
    if($user=="" || $pass==""){     //if username or password are empty
        redirect_in();
    }
    $conn = DB_S.":host=".DB_H.";dbname=".DB_N;
    try{ 
        //fetching data for validating the login whether username and password match or not
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM users WHERE username=:user AND password=:pass";
        $stmt = $pdo->prepare($sql);
        $user = filter_var($user,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pass = filter_var($pass,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':pass', $pass);
        $res = $stmt->execute();
        if($res){
            if($rec = $stmt->fetch()){
                if($user == $rec['username'] && $pass == $rec['password']){
                    $id = $rec['id'];
                    if($rem=="on"){         //if user requests to remain signed in then saving cookie with random string to keep him/her signed in
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomString = '';
                        for ($i = 0; $i < 10; $i++) {
                            $index = rand(0, strlen($characters) - 1);
                            $randomString .= $characters[$index];
                        }
                        $pdo = new PDO($conn,DB_U,DB_P);
                        $sql = "UPDATE users SET random='$randomString' WHERE username='$user'";        //updating random string every time a user signs in again (after signout)
                        $pdo->exec($sql);
                        setcookie('id',$id,time()+60*60*24*7);
                        setcookie('random',$randomString,time()+60*60*24*7);
                    }
                    $_SESSION['id'] = $id;
                    redirect_show();
                }
                else{
                    header("Location:invalid.php",true, 301);
                    die();
                }
            }
            else{
                header("Location:invalid.php",true, 301);
                die();
            }
        }
        else{
            redirect_in();
        }
    }
    catch(PDOException $e){
        die("Server Error");
    }

?>