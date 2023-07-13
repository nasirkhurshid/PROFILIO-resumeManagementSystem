<?php           //same as addUser.php (Sorry for bad documentation!)
    session_start();
    require_once("redirection.php");
    require_once("config.inc.php");
    if(!isset($_SESSION['id'])){
        redirect_in();
    }
    else if (isset($_SESSION['user'])){
        redirect_addUser();
    }
    else{
        require_once("secheader.php");
    }
    $conn = DB_S.":host=".DB_H.";dbname=".DB_N;
    try{
        $id = $_SESSION['id'];
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM basics WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $basics = $stmt->fetch();

        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM education WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $rec = $stmt->fetch();
        $deg1 = $rec['deg'];
        $divi1 = $rec['divi'];
        $ins1 = $rec['ins'];
        $rec = $stmt->fetch();
        if($rec){
            $deg2 = $rec['deg'];    
            $divi2 = $rec['divi'];  
            $ins2 = $rec['ins'];
        }    
        else{
            $deg2 = "";
            $divi2 = "";
            $ins2 = "";
        }    
        $rec = $stmt->fetch();
        if($rec){
            $deg3 = $rec['deg'];    
            $divi3 = $rec['divi'];  
            $ins3 = $rec['ins'];
        }    
        else{
            $deg3 = "";
            $divi3 = "";
            $ins3 = "";
        }
        
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM skills WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $rec = $stmt->fetch();
        $skill1 = $rec['skill'];
        $exp1 = $rec['exp'];
        $rec = $stmt->fetch();
        if($rec){
            $skill2 = $rec['skill'];    
            $exp2 = $rec['exp'];
        }    
        else{
            $skill2 = "";
            $exp2 = "";
        }    
        $rec = $stmt->fetch();
        if($rec){
            $skill3 = $rec['skill'];    
            $exp3 = $rec['exp'];
        }    
        else{
            $skill3 = "";
            $exp3 = "";
        } 
        
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM languages WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $rec = $stmt->fetch();
        $lang1 = $rec['lang'];
        $rec = $stmt->fetch();
        if($rec)
            $lang2 = $rec['lang'];
        else
            $lang2 = "";
        $rec = $stmt->fetch();
        if($rec)
            $lang3 = $rec['lang'];
        else
            $lang3 = "";
        
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM hobbies WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $rec = $stmt->fetch();
        $hob1 = $rec['hob'];
        $rec = $stmt->fetch();
        if($rec)
            $hob2 = $rec['hob'];
        else
            $hob2 = "";
        $rec = $stmt->fetch();
        if($rec)
            $hob3 = $rec['hob'];
        else
            $hob3 = "";
        
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM contact WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $con = $stmt->fetch();
        
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM reference WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $rec = $stmt->fetch();
        $ref1 = $rec['ref'];
        $con1 = $rec['con'];
        $rec = $stmt->fetch();
        if($rec){
            $ref2 = $rec['ref'];    
            $con2 = $rec['con'];
        }    
        else{
            $ref2 = "";
            $con2 = "";
        }    
        $rec = $stmt->fetch();
        if($rec){
            $ref3 = $rec['ref'];    
            $con3 = $rec['con'];
        }    
        else{
            $ref3 = "";
            $con3 = "";
        }
    }
    catch (PDOException $e){
        die("Server Error");
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style3.css">
    <title>Update User</title>
</head>
<body>
    <h1>Enter Your New Details</h1>
    <hr>
    <span class="error"></span>
    
    <form action="updateAction.php" method="POST" enctype="multipart/form-data">
        <fieldset class="row"><legend>Basic Info.</legend>
            <small><i>*All fields are required!</i></small>
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label><small class="error"><i>&emsp;&emsp;&emsp;Enter a valid name (Alphabets only)</i></small>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $basics['name']?>">
            </div>
            <div class="col-12">
                <label for="profile" class="form-label">Profile</label><small class="error"><i>&emsp;&emsp;&emsp;Profile cannot be empty</i></small>
                <input type="text" class="form-control" id="profile" name="profile" placeholder="Write something about yourself" value="<?php echo $basics['profile']?>">
            </div>
            <div class="col-12">
                <label for="objectives" class="form-label">Objectives</label><small class="error"><i>&emsp;&emsp;&emsp;Objectives cannot be empty</i></small>
                <input type="text" class="form-control" id="objectives" name="objectives" placeholder="Your objectives in life" value="<?php echo $basics['objectives']?>">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>Education</legend>
            <small><i>*At least one qualification is required!</i></small>
            <div class="col-sm-4">
                <label for="deg1" class="form-label">Qualification 1</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid degree name</i></small>
                <input type="text" class="form-control" id="deg1" name="deg[]" placeholder="Matriculation" value="<?php echo $deg1?>">
            </div>
            <div class="col-sm-4">
                <label for="div1" class="form-label">Division</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid division</i></small>
                <input type="text" class="form-control" id="div1" name="div[]" placeholder="1st" value="<?php echo $divi1?>">
            </div>
            <div class="col-sm-4">
                <label for="ins1" class="form-label">Institution</label><small class="error"><i>&emsp;&emsp;&emsp;Institution cannot be empty</i></small>
                <input type="text" class="form-control" id="ins1" name="ins[]" placeholder="Govt. School" value="<?php echo $ins1?>">
            </div>
            <div class="col-sm-4">
                <label for="deg2" class="form-label">Qualification 2</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid degree name</i></small>
                <input type="text" class="form-control" id="deg2" name="deg[]" value="<?php echo $deg2?>">
            </div>
            <div class="col-sm-4">
                <label for="div2" class="form-label">Division</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid division</i></small>
                <input type="text" class="form-control" id="div2" name="div[]" value="<?php echo $divi2?>">
            </div>
            <div class="col-sm-4">
                <label for="ins2" class="form-label">Institution</label><small class="error"><i>&emsp;&emsp;&emsp;Institution cannot be empty</i></small>
                <input type="text" class="form-control" id="ins2" name="ins[]" value="<?php echo $ins2?>">
            </div>
            <div class="col-sm-4">
                <label for="deg3" class="form-label">Qualification 3</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid degree name</i></small>
                <input type="text" class="form-control" id="deg3" name="deg[]" value="<?php echo $deg3?>">
            </div>
            <div class="col-sm-4">
                <label for="div3" class="form-label">Division</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid division</i></small>
                <input type="text" class="form-control" id="div3" name="div[]" value="<?php echo $divi3?>">
            </div>
            <div class="col-sm-4">
                <label for="ins3" class="form-label">Institution</label><small class="error"><i>&emsp;&emsp;&emsp;Institution cannot be empty</i></small>
                <input type="text" class="form-control" id="ins3" name="ins[]" value="<?php echo $ins3?>">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>Skills And Experience</legend>
            <small><i>*At least one skill is required!</i></small>
            <div class="col-sm-6">
                <label for="skill1" class="form-label">Skill 1</label><small class="error" placeholder="Web Developme"><i>&emsp;&emsp;&emsp;Enter valid skill name</i></small>
                <input type="text" class="form-control" id="skill1" name="skill[]" value="<?php echo $skill1?>">
            </div>
            <div class="col-sm-6">
                <label for="exp1" class="form-label">Experience</label><small class="error" placeholder="1 Year"><i>&emsp;&emsp;&emsp;Enter valid experience</i></small>
                <input type="text" class="form-control" id="exp1" name="exp[]" value="<?php echo $exp1?>">
            </div>
            <div class="col-sm-6">
                <label for="skill2" class="form-label">Skill 2</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid skill name</i></small>
                <input type="text" class="form-control" id="skill2" name="skill[]" value="<?php echo $skill2?>">
            </div>
            <div class="col-sm-6">
                <label for="exp2" class="form-label">Experience</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid experience</i></small>
                <input type="text" class="form-control" id="exp2" name="exp[]" value="<?php echo $exp2?>">
            </div>
            <div class="col-sm-6">
                <label for="skill3" class="form-label">Skill 3</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid skill name</i></small>
                <input type="text" class="form-control" id="skill3" name="skill[]" value="<?php echo $skill3?>">
            </div>
            <div class="col-sm-6">
                <label for="exp3" class="form-label">Experience</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid experience</i></small>
                <input type="text" class="form-control" id="exp3" name="exp[]" value="<?php echo $exp3?>">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>Languages</legend>
            <small><i>*At least one language is required!</i></small>
            <div class="col-sm-4">
                <label for="lang1" class="form-label">Language 1</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid language name</i></small>
                <input type="text" class="form-control" id=    "lang1" name="lang[]" placeholder="Saraiki" value="<?php echo $lang1?>">
            </div>
            <div class="col-sm-4">
                <label for="lang2" class="form-label">Language 2</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid language name</i></small>
                <input type="text" class="form-control" id="lang2" name="lang[]" value="<?php echo $lang2?>">
            </div>
            <div class="col-sm-4">
                <label for="lang3" class="form-label">Language 3</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid language name</i></small>
                <input type="text" class="form-control" id="lang3" name="lang[]" value="<?php echo $lang3?>">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>Hobbies</legend>
            <small><i>*At least one hobby is required!</i></small>
            <div class="col-sm-4">
                <label for="hob1" class="form-label">Hobby 1</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid hobby name</i></small>
                <input type="text" class="form-control" id="hob1" name="hob[]" placeholder="Poetry" value="<?php echo $hob1?>">
            </div>
            <div class="col-sm-4">
                <label for="hob2" class="form-label">Hobby 2</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid hobby name</i></small>
                <input type="text" class="form-control" id="hob2" name="hob[]" value="<?php echo $hob2?>">
            </div>
            <div class="col-sm-4">
                <label for="hob3" class="form-label">Hobby 3</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid hobby name</i></small>
                <input type="text" class="form-control" id="hob3" name="hob[]" value="<?php echo $hob3?>">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>Contact</legend>
            <small><i>*Mobile and Email are required!</i></small>
            <div class="col-md-3">
                <label for="mobile" class="form-label">Mobile</label><small class="error"><i>&emsp;&emsp;&emsp;Enter a valid Mobile No.</i></small>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="0314-4231232" value="<?php echo $con['mobile']?>">
            </div>
            <div class="col-md-3">
                <label for="email" class="form-label">Email</label><small class="error"><i>&emsp;&emsp;&emsp;Enter a valid Email address</i></small>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@mail.com" value="<?php echo $con['email']?>">
            </div>
            <div class="col-md-3">
                <label for="facebook" class="form-label">Facebook</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid name</i></small>
                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Name" value="<?php echo $con['facebook']?>">
            </div>
            <div class="col-md-3">
                <label for="twitter" class="form-label">Twitter</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid name</i></small>
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Name" value="<?php echo $con['twitter']?>">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>References</legend>    
            <small><i>*At least one reference is required!</i></small>
            <div class="col-sm-6">
                <label for="ref1" class="form-label">Reference 1</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid name</i></small>
                <input type="text" class="form-control" id="ref1" name="ref[]" placeholder="Name" value="<?php echo $ref1?>">
            </div>
            <div class="col-sm-6">
                <label for="con1" class="form-label">Contact</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid email</i></small>
                <input type="text" class="form-control" id="con1" name="con[]" placeholder="example@mail.com" value="<?php echo $con1?>">
            </div>
            <div class="col-sm-6">
                <label for="ref2" class="form-label">Reference 2</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid name</i></small>
                <input type="text" class="form-control" id="ref2" name="ref[]" value="<?php echo $ref1?>">
            </div>
            <div class="col-sm-6">
                <label for="con2" class="form-label">Contact</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid email</i></small>
                <input type="text" class="form-control" id="con2" name="con[]" value="<?php echo $con2?>">
            </div>
            <div class="col-sm-6">
                <label for="ref3" class="form-label">Reference 3</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid name</i></small>
                <input type="text" class="form-control" id="ref3" name="ref[]" value="<?php echo $ref3?>">
            </div>
            <div class="col-sm-6">
                <label for="con3" class="form-label">Contact</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid email</i></small>
                <input type="text" class="form-control" id="con3" name="con[]" value="<?php echo $con3?>">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row">
            <legend>Image</legend>
            <div class="col">
                <label for="img" class="form-label">Select an image for your profile</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid file (.jpg, .jpeg, .png)</i></small>
                <input type="file" class="form-control" id="img" name="img">
            </div>
        </fieldset>
        <hr>
        <fieldset>
            <table>
                <tr>
                    <td><input type="reset" name="reset" value="Reset" id="reset"></td>
                    <td style="text-align:right"><input type="submit" name="submit" value="Submit" id="submit"></td>
                </tr>
            </table>
        </fieldset>

    <?php require_once("footer.php")?>
    <script src="Validation.js"></script>
</body>
</html>