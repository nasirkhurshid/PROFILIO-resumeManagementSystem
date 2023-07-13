<?php           //file for displaying profiles of all users or users other than the logged in user
    session_start();
    require_once("redirection.php");
    require_once("config.inc.php");
    if(isset($_SESSION['user'])){
        redirect_addUser();
    }
    if(isset($_SESSION['id'])){
        require_once("secheader.php");
    }
    else{
        require_once("mainheader.php");
    }
    if(isset($_GET['id'])){             //getting id from GET to display the data accordingly
        $id = $_GET['id'];
        if($id==""){
            header("Location: showUsers.php", true, 301);
            die();
        }
    }
    else{
        header("Location: showUsers.php", true, 301);
        die();
    }
    $conn = DB_S.":host=".DB_H.";dbname=".DB_N;
    try{
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM basics WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $id = filter_var($id,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $rec = $stmt->fetch();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles2.css">
    <style>
        table{
            text-align: center;
            width: 100%;
        }
        tr:nth-child(odd){
            background-color: rgba(0,243,255,.2);
        }
        tr:first-child{
            background-color: rgba(0,243,255,.5);
            color: var(--color);
        }
        tr:last-child{
            background-color: rgba(0,243,255,.1);
            color: var(--color);
        }
        td{
            width: 33%;
        }
    </style>
    <title><?php echo $rec['name']?></title>
</head>
<body>
    <div class="row d-flex justify-content-center"><img src="<?php echo $rec['path']?>" alt="profile" class="col-12 w-25 rounded-circle"></div>
    <h1><?php echo $rec['name']?></h1><hr>

    <h2>Profile</h2>
    <p><?php echo $rec['profile']?></p>

    <h2>Objectives</h2>
    <p><?php echo $rec['objectives']?></p>

    <?php
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM education WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
    ?>

    <h2>Education</h2>
    <table>
        <tr>
            <th>Qualification</th>
            <th>Division</th>
            <th>Institution</th>
        </tr>
        <?php
            while($rec = $stmt->fetch()){
                echo "<tr><td>{$rec['deg']}</td><td>{$rec['divi']}</td><td>{$rec['ins']}</td></tr>";
            }
        ?>
    </table>

    <?php
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM skills WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
    ?>
    <h2>Skills And Experience</h2>
    <table>
        <tr>
            <th>Skill</th>
            <th>Experience</th>
        </tr>
        <?php
            while($rec = $stmt->fetch()){
                echo "<tr><td>{$rec['skill']}</td><td>{$rec['exp']}</td></tr>";
            }
        ?>
    </table>

    <?php
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM languages WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
    ?>
    <h2>Languages</h2>
    <ul>
        <?php
            while($rec = $stmt->fetch()){
                if($rec['lang']!=""){
                    echo "<li>{$rec['lang']}</li>";
                }
            }
        ?>
    </ul>
    
    <?php
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM hobbies WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
    ?>
    <h2>Hobbies And Interests</h2>
    <ul>
        <?php
            while($rec = $stmt->fetch()){
                if($rec['hob']!=""){
                    echo "<li>{$rec['hob']}</li>";
                }
            }
        ?>
    </ul>

    <?php
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM contact WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $rec = $stmt->fetch();
    ?>
    <h2>Contact</h2>
    <dl>
        <dt>Mobile :-</dt>
        <dd>&emsp;&emsp;&emsp; <?php echo $rec['mobile']?></dd>
        <dt>Email :-</dt>
        <dd>&emsp;&emsp;&emsp; <?php echo $rec['email']?></dd>
        <?php
            if($rec['facebook']!=""){
                echo "<dt>Facebook :-</dt>\n";
                echo "<dd>&emsp;&emsp;&emsp;{$rec['facebook']}</dd>";
            }
            if($rec['twitter']!=""){
                echo "<dt>Facebook :-</dt>\n";
                echo "<dd>&emsp;&emsp;&emsp; {$rec['twitter']}</dd>";
            } 
        ?>
    </dl>

    <?php
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM reference WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
    ?>
    <h2>References</h2>
    <table>
        <tr>
            <th>Reference</th>
            <th>Contact</th>
        </tr>
        <?php
            while($rec = $stmt->fetch()){
                echo "<tr><td>{$rec['ref']}</td><td>{$rec['con']}</td></tr>";
            }
        ?>
    </table>
<?php
    }
    catch(PDOException $e){
        die("Server Error");
    }
    require_once("footer.php");
?> 
</body>
</html>