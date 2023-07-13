<?php           //file for displaying all the users which have registered themselves
    session_start();
    require_once("config.inc.php");
    require_once("redirection.php");
    if(isset($_SESSION['user'])){
        redirect_addUser();
    }
    if(isset($_SESSION['id'])){
        require_once("secheader.php");
    }
    else{
        require_once("mainheader.php");
    }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles2.css">
    <style>
        .listDiv{
            padding: .7%;
            border-radius:20px;
            background-color: rgba(20, 162, 159, .5);
            margin: 0 1% 1% 0;
            box-shadow: 2px 2px 2px rgba(46, 100, 87, .5) inset, 2px 2px 2px rgba(46, 100, 87, .5);
        }
        h4{
            font-variant: small-caps;
        }
        h4, h6{
            text-align:center;
        }
    </style>
    <title>Show Users</title>
</head>

<body>


<?php
    $conn = DB_S.":host=".DB_H.";dbname=".DB_N;
    try{
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM users";
        $pdo = $pdo->query($sql);
        $pdo2 = new PDO($conn,DB_U,DB_P);
?>
<hr>
<div class="container d-flex flex-wrap">
<?php
        $count = 0;
        while($rec = $pdo->fetch()){            //fetching all the users from database and displaying them
            $count++;
            $id=$rec['id'];
            $sql = "SELECT * FROM basics WHERE id=:id";
            $stmt = $pdo2->prepare($sql);
            $stmt->bindValue(':id',$id);
            $stmt->execute();
            $rec2=$stmt->fetch();
            echo "<div class=\"listDiv\">
                    <div>
                        <div class=\"row d-flex justify-content-center m-1\"><img src=\"{$rec2['path']}\" id=\"img\" class=\"col-12 rounded-circle w-50\"></div>
                        <h4>{$rec2['name']}</h4>
                        <h6>({$rec['username']})</h6>
                        <a href=\"showUser.php?id={$rec['id']}\" class=\"row d-flex justify-content-center\">View Profile</a>
                    </div>
                </div>";
        }
        if($count==0){          //if there is no user registered
            echo "<h4>No users to show :')</h4>";
        }
?>
</div>
<?php
    }
    catch(PDOException $e){
        die("Server Error");
    }
    require_once("footer.php")
?>

</body>

</html>