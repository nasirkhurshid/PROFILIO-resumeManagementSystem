<?php
    session_start();
    require_once("config.inc.php");
    require_once("redirection.php");
    if(isset($_SESSION['id']) || isset($_COOKIE['id'])){        //if user is logged in then redirect to profile
        redirect_show();
    }
    else if(isset($_SESSION['user'])){          //if user has only signed up and not added data
        if(isset($_POST)){              //if data is received from form
            //if all fields are inserted
            //redirect_addUser(); redirects if any required field is empty
            if(isset($_POST['name']) && isset($_POST['profile']) && isset($_POST['objectives'])){
                $name = $_POST['name'];
                $profile = $_POST['profile'];
                $objectives = $_POST['objectives'];
                if($_POST['name']=="" || $_POST['profile']=="" || $_POST['objectives']==""){
                    redirect_addUser();
                }
            }
            else{
                redirect_addUser();
            }
            if(isset($_POST['deg']) && isset($_POST['div']) && isset($_POST['ins'])){
                $degO = $_POST['deg'];
                $divO = $_POST['div'];
                $insO = $_POST['ins'];
                $deg1 = $degO[0];
                $div1 = $divO[0];
                $ins1 = $insO[0];
                $deg2 = $degO[1];
                $div2 = $divO[1];
                $ins2 = $insO[1];
                $deg3 = $degO[2];
                $div3 = $divO[2];
                $ins3 = $insO[2];
                if($deg1=="" || $div1=="" || $ins1==""){
                    redirect_addUser();
                }
            }
            else{
                redirect_addUser();
            }
            if(isset($_POST['skill']) && isset($_POST['exp'])){
                $skillO = $_POST['skill'];
                $expO = $_POST['exp'];
                $skill1 = $skillO[0];
                $exp1 = $expO[0];
                $skill2 = $skillO[1];
                $exp2 = $expO[1];
                $skill3 = $skillO[2];
                $exp3 = $expO[2];
                if($skill1=="" || $exp1==""){
                    redirect_addUser();
                }
            }
            else{
                redirect_addUser();
            }
            if(isset($_POST['lang']) && isset($_POST['hob'])){
                $langO = $_POST['lang'];
                $hobO = $_POST['hob'];
                $lang1 = $langO[0];
                $hob1 = $hobO[0];
                $lang2 = $langO[1];
                $hob2 = $hobO[1];
                $lang3 = $langO[2];
                $hob3 = $hobO[2];
                if($lang1=="" || $hob1==""){
                    redirect_addUser();
                }
            }
            else{
                redirect_addUser();
            }
            if(isset($_POST['mobile']) && isset($_POST['email'])){
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                if($_POST['mobile']=="" || $_POST['email']==""){
                    redirect_addUser();
                }
                if(isset($_POST['facebook']) && isset($_POST['twitter'])){
                    $facebook = $_POST['facebook'];
                    $twitter = $_POST['twitter'];
                }
                else{
                    $facebook = "";
                    $twitter = "";
                }
            }
            else{
                redirect_addUser();
            }
            if(isset($_POST['ref']) && isset($_POST['con'])){
                $refO = $_POST['ref'];
                $conO = $_POST['con'];
                $ref1 = $refO[0];
                $con1 = $conO[0];
                $ref2 = $refO[1];
                $con2 = $conO[1];
                $ref3 = $refO[2];
                $con3 = $conO[2];
                if($ref1=="" || $con1==""){
                    redirect_addUser();
                }
            }
            else{
                redirect_addUser();
            }
        }
        else{
            redirect_addUser();
        }
        //checking image and all its attributes
        if(isset($_FILES['img'])){
            $img = $_FILES['img'];
            $img_name = $img['name'];
            $img_type = $img['type'];
            $img_tmp = $img['tmp_name'];
            $patt = '/^image/';
            if(!preg_match($patt, $img_type)){      //if given file is not an image
                redirect_addUser();
            }
        }
        else{
            redirect_addUser();
        }

        $conn = DB_S.":host=".DB_H.";dbname=".DB_N;
        try{
            $id = $_SESSION['user'];
            $pdo = new PDO($conn,DB_U,DB_P);
            $sql = "SELECT name FROM basics WHERE id=:id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);
            if($stmt->execute()){
                $rec = $stmt->fetch();
                if($rec['name']!=""){
                    session_unset();
                    $_SESSION['id'] = $id;          
                    redirect_in();              //if user has already entered data
                }
            }


            //operations for inserting data in different tables of database
            $path = "images/{$id}-profile_$img_name";
            $pdo = new PDO($conn,DB_U,DB_P);
            $sql = "INSERT INTO basics(id,name,profile,objectives,img,path) VALUES (:id,:name,:profile,:objectives,:img,:path)";
            $stmt = $pdo->prepare($sql);
            $id = filter_var($id,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $name = filter_var($name,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $profile = filter_var($profile,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $objectives = filter_var($objectives,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $img_name = filter_var($id,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $path = filter_var($path,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':profile', $profile);
            $stmt->bindValue(':objectives', $objectives);
            $stmt->bindValue(':img', $img_name);
            $stmt->bindValue(':path', $path);
            $stmt->execute();
            move_uploaded_file($img_tmp,$path);
            
            $pdo = new PDO($conn,DB_U,DB_P);
            $sql = "INSERT INTO education(id,deg,divi,ins) VALUES (:id,:deg,:divi,:ins)";
            $stmt = $pdo->prepare($sql);
            $id = filter_var($id,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $deg1 = filter_var($deg1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $div1 = filter_var($div1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ins1 = filter_var($ins1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $stmt->bindValue(':id', $id);
            $stmt->bindParam(':deg', $deg1);
            $stmt->bindParam(':divi', $div1);
            $stmt->bindParam(':ins', $ins1);
            $stmt->execute();
            if($deg2!=""){
                $deg2 = filter_var($deg2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $div2 = filter_var($div2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $ins2 = filter_var($ins2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt->bindParam(':deg', $deg2);
                $stmt->bindParam(':divi', $div2);
                $stmt->bindParam(':ins', $ins2);
                $stmt->execute();
            }
            if($deg3!=""){
                $deg3 = filter_var($deg3,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $div3 = filter_var($div3,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $ins3 = filter_var($ins3,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt->bindParam(':deg', $deg3);
                $stmt->bindParam(':divi', $div3);
                $stmt->bindParam(':ins', $ins3);
                $stmt->execute();
            }

            $pdo = new PDO($conn,DB_U,DB_P);
            $sql = "INSERT INTO skills(id,skill,exp) VALUES (:id,:skill,:exp)";
            $stmt = $pdo->prepare($sql);
            $id = filter_var($id,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $skill1 = filter_var($skill1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $exp1 = filter_var($exp1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $stmt->bindValue(':id', $id);
            $stmt->bindParam(':skill', $skill1);
            $stmt->bindParam(':exp', $exp1);
            $stmt->execute();
            if($skill2!=""){
                $skill2 = filter_var($skill2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $exp2 = filter_var($exp2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt->bindParam(':skill', $skill2);
                $stmt->bindParam(':exp', $exp2);
                $stmt->execute();
            }
            if($skill3!=""){
                $skill3 = filter_var($skill3,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $exp3 = filter_var($exp3,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt->bindParam(':skill', $skill3);
                $stmt->bindParam(':exp', $exp3);
                $stmt->execute();
            }

            $pdo = new PDO($conn,DB_U,DB_P);
            $sql = "INSERT INTO languages(id,lang) VALUES (:id,:lang)";
            $stmt = $pdo->prepare($sql);
            $id = filter_var($id,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $lang1 = filter_var($lang1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $stmt->bindValue(':id', $id);
            $stmt->bindParam(':lang', $lang1);
            $stmt->execute();
            if($lang2!=""){
                $lang2 = filter_var($lang2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt->bindParam(':lang', $lang2);
                $stmt->execute();
            }
            if($lang3!=""){
                $lang3 = filter_var($lang3,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt->bindParam(':lang', $lang3);
                $stmt->execute();
            }

            $pdo = new PDO($conn,DB_U,DB_P);
            $sql = "INSERT INTO hobbies(id,hob) VALUES (:id,:hob)";
            $stmt = $pdo->prepare($sql);
            $id = filter_var($id,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $hob1 = filter_var($hob1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $stmt->bindValue(':id', $id);
            $stmt->bindParam(':hob', $hob1);
            $stmt->execute();
            if($hob2!=""){
                $hob2 = filter_var($hob2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt->bindParam(':hob', $hob2);
                $stmt->execute();
            }
            if($hob3!=""){
                $hob3 = filter_var($hob3,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt->bindParam(':hob', $hob3);
                $stmt->execute();
            }

            $pdo = new PDO($conn,DB_U,DB_P);
            $sql = "INSERT INTO contact(id,mobile,email,facebook,twitter) VALUES (:id,:mobile,:email,:facebook,:twitter)";
            $stmt = $pdo->prepare($sql);
            $id = filter_var($id,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $mobile = filter_var($mobile,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($email,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $facebook = filter_var($facebook,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $twitter = filter_var($twitter,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':mobile', $mobile);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':facebook', $facebook);
            $stmt->bindValue(':twitter', $twitter);
            $stmt->execute();

            $pdo = new PDO($conn,DB_U,DB_P);
            $sql = "INSERT INTO reference(id,ref,con) VALUES (:id,:ref,:con)";
            $stmt = $pdo->prepare($sql);
            $id = filter_var($id,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ref1 = filter_var($ref1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $con1 = filter_var($con1,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $stmt->bindValue(':id', $id);
            $stmt->bindParam(':ref', $ref1);
            $stmt->bindParam(':con', $con1);
            $stmt->execute();
            if($ref2!=""){
                $ref2 = filter_var($ref2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $con2 = filter_var($con2,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt->bindParam(':ref', $ref2);
                $stmt->bindParam(':con', $con2);
                $stmt->execute();
            }
            if($ref3!=""){
                $ref3 = filter_var($ref3,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $con3 = filter_var($con3,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $stmt->bindParam(':ref', $ref3);
                $stmt->bindParam(':con', $con3);
                $stmt->execute();
            }

            session_unset();
            $_SESSION['id']=$id;            //starting session with id after data insertion
            redirect_show();
        }
        catch(PDOException $e){
            die("Server Error Occured");
        }
    }
    else{
        redirect_up();
    }
?>