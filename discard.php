<?php               //this file will be required when user only signs up but does not enter other details for profile
session_start();
require_once("redirection.php");
require_once("config.inc.php");
if(isset($_SESSION['user'])){
    $conn = DB_S.":host=".DB_H.";dbname=".DB_N;
    $id = $_SESSION['user'];
    try{                        //deleting data that was inserting during sign up
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "DELETE FROM users WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $rec = $stmt->fetch();
        header("Location: signout.php", true, 301);
        die();
    }
    catch (PDOException $e){
        die("Server Error");
    }

}
else if(isset($_SESSION['id']) || isset($_COOKIE['id'])){       //redirection for signed in user
    redirect_show();
}
else{
    redirect_index();
}
?>