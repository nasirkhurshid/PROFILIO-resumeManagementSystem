<?php
    session_start();
    require_once("redirection.php");
    if(isset($_SESSION['id'])){                 //if session against a user is started then redirecting to profile
        redirect_show();
    }
    else if (isset($_SESSION['user'])){
        require_once("header3.php");            //getting dedicated header for signed up user
    }
    if(isset($_COOKIE['id'])){          //if cookie against a user is started then redirecting to profile
        redirect_show();
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style3.css">
    <title>Add User</title>
</head>
<body>
    <?php 
        if(!isset($_SESSION['user'])){
            redirect_up();
        }
    ?>
    <h1>Enter Your Details</h1>
    <hr>
    <span class="error"></span>
    <!-- form for adding user details -->
    <form action="action.php" method="POST" enctype="multipart/form-data">
        <fieldset class="row"><legend>Basic Info.</legend>
            <small><i>*All fields are required!</i></small>
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label><small class="error"><i>&emsp;&emsp;&emsp;Enter a valid name (Alphabets only)</i></small>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
            <div class="col-12">
                <label for="profile" class="form-label">Profile</label><small class="error"><i>&emsp;&emsp;&emsp;Profile cannot be empty</i></small>
                <input type="text" class="form-control" id="profile" name="profile" placeholder="Write something about yourself">
            </div>
            <div class="col-12">
                <label for="objectives" class="form-label">Objectives</label><small class="error"><i>&emsp;&emsp;&emsp;Objectives cannot be empty</i></small>
                <input type="text" class="form-control" id="objectives" name="objectives" placeholder="Your objectives in life">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>Education</legend>
            <small><i>*At least one qualification is required!</i></small>
            <div class="col-sm-4">
                <label for="deg1" class="form-label">Qualification 1</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid degree name</i></small>
                <input type="text" class="form-control" id="deg1" name="deg[]" placeholder="Matriculation">
            </div>
            <div class="col-sm-4">
                <label for="div1" class="form-label">Division</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid division</i></small>
                <input type="text" class="form-control" id="div1" name="div[]" placeholder="1st">
            </div>
            <div class="col-sm-4">
                <label for="ins1" class="form-label">Institution</label><small class="error"><i>&emsp;&emsp;&emsp;Institution cannot be empty</i></small>
                <input type="text" class="form-control" id="ins1" name="ins[]" placeholder="Govt. School">
            </div>
            <div class="col-sm-4">
                <label for="deg2" class="form-label">Qualification 2</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid degree name</i></small>
                <input type="text" class="form-control" id="deg2" name="deg[]">
            </div>
            <div class="col-sm-4">
                <label for="div2" class="form-label">Division</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid division</i></small>
                <input type="text" class="form-control" id="div2" name="div[]">
            </div>
            <div class="col-sm-4">
                <label for="ins2" class="form-label">Institution</label><small class="error"><i>&emsp;&emsp;&emsp;Institution cannot be empty</i></small>
                <input type="text" class="form-control" id="ins2" name="ins[]">
            </div>
            <div class="col-sm-4">
                <label for="deg3" class="form-label">Qualification 3</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid degree name</i></small>
                <input type="text" class="form-control" id="deg3" name="deg[]">
            </div>
            <div class="col-sm-4">
                <label for="div3" class="form-label">Division</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid division</i></small>
                <input type="text" class="form-control" id="div3" name="div[]">
            </div>
            <div class="col-sm-4">
                <label for="ins3" class="form-label">Institution</label><small class="error"><i>&emsp;&emsp;&emsp;Institution cannot be empty</i></small>
                <input type="text" class="form-control" id="ins3" name="ins[]">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>Skills And Experience</legend>
            <small><i>*At least one skill is required!</i></small>
            <div class="col-sm-6">
                <label for="skill1" class="form-label">Skill 1</label><small class="error" placeholder="Web Developme"><i>&emsp;&emsp;&emsp;Enter valid skill name</i></small>
                <input type="text" class="form-control" id="skill1" name="skill[]">
            </div>
            <div class="col-sm-6">
                <label for="exp1" class="form-label">Experience</label><small class="error" placeholder="1 Year"><i>&emsp;&emsp;&emsp;Enter valid experience</i></small>
                <input type="text" class="form-control" id="exp1" name="exp[]">
            </div>
            <div class="col-sm-6">
                <label for="skill2" class="form-label">Skill 2</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid skill name</i></small>
                <input type="text" class="form-control" id="skill2" name="skill[]">
            </div>
            <div class="col-sm-6">
                <label for="exp2" class="form-label">Experience</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid experience</i></small>
                <input type="text" class="form-control" id="exp2" name="exp[]">
            </div>
            <div class="col-sm-6">
                <label for="skill3" class="form-label">Skill 3</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid skill name</i></small>
                <input type="text" class="form-control" id="skill3" name="skill[]">
            </div>
            <div class="col-sm-6">
                <label for="exp3" class="form-label">Experience</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid experience</i></small>
                <input type="text" class="form-control" id="exp3" name="exp[]">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>Languages</legend>
            <small><i>*At least one language is required!</i></small>
            <div class="col-sm-4">
                <label for="lang1" class="form-label">Language 1</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid language name</i></small>
                <input type="text" class="form-control" id=    "lang1" name="lang[]" placeholder="Saraiki">
            </div>
            <div class="col-sm-4">
                <label for="lang2" class="form-label">Language 2</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid language name</i></small>
                <input type="text" class="form-control" id="lang2" name="lang[]">
            </div>
            <div class="col-sm-4">
                <label for="lang3" class="form-label">Language 3</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid language name</i></small>
                <input type="text" class="form-control" id="lang3" name="lang[]">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>Hobbies</legend>
            <small><i>*At least one hobby is required!</i></small>
            <div class="col-sm-4">
                <label for="hob1" class="form-label">Hobby 1</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid hobby name</i></small>
                <input type="text" class="form-control" id="hob1" name="hob[]" placeholder="Poetry">
            </div>
            <div class="col-sm-4">
                <label for="hob2" class="form-label">Hobby 2</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid hobby name</i></small>
                <input type="text" class="form-control" id="hob2" name="hob[]">
            </div>
            <div class="col-sm-4">
                <label for="hob3" class="form-label">Hobby 3</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid hobby name</i></small>
                <input type="text" class="form-control" id="hob3" name="hob[]">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>Contact</legend>
            <small><i>*Mobile and Email are required!</i></small>
            <div class="col-md-3">
                <label for="mobile" class="form-label">Mobile</label><small class="error"><i>&emsp;&emsp;&emsp;Enter a valid Mobile No.</i></small>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="0314-4231232">
            </div>
            <div class="col-md-3">
                <label for="email" class="form-label">Email</label><small class="error"><i>&emsp;&emsp;&emsp;Enter a valid Email address</i></small>
                <input type="text" class="form-control" id="email" name="email" placeholder="example@mail.com">
            </div>
            <div class="col-md-3">
                <label for="facebook" class="form-label">Facebook</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid name</i></small>
                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Name">
            </div>
            <div class="col-md-3">
                <label for="twitter" class="form-label">Twitter</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid name</i></small>
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Name">
            </div>
        </fieldset>
        <hr>
        <fieldset class="row"><legend>References</legend>    
            <small><i>*At least one reference is required!</i></small>
            <div class="col-sm-6">
                <label for="ref1" class="form-label">Reference 1</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid name</i></small>
                <input type="text" class="form-control" id="ref1" name="ref[]" placeholder="Name">
            </div>
            <div class="col-sm-6">
                <label for="con1" class="form-label">Contact</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid email</i></small>
                <input type="text" class="form-control" id="con1" name="con[]" placeholder="example@mail.com">
            </div>
            <div class="col-sm-6">
                <label for="ref2" class="form-label">Reference 2</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid name</i></small>
                <input type="text" class="form-control" id="ref2" name="ref[]">
            </div>
            <div class="col-sm-6">
                <label for="con2" class="form-label">Contact</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid email</i></small>
                <input type="text" class="form-control" id="con2" name="con[]">
            </div>
            <div class="col-sm-6">
                <label for="ref3" class="form-label">Reference 3</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid name</i></small>
                <input type="text" class="form-control" id="ref3" name="ref[]">
            </div>
            <div class="col-sm-6">
                <label for="con3" class="form-label">Contact</label><small class="error"><i>&emsp;&emsp;&emsp;Enter valid email</i></small>
                <input type="text" class="form-control" id="con3" name="con[]">
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