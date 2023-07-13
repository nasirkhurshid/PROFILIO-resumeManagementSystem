<?php
    session_start();
    require_once("redirection.php");
    if(isset($_SESSION['id'])){
        redirect_show();
    }
    else if(isset($_SESSION['user'])){
        redirect_addUser();
    }
    if(isset($_COOKIE['id'])){
        redirect_show();
    }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles1.css">
    <title>Sign Up</title>
</head>

<body>
<?php require_once("mainheader.php") ?>

<section class="signup">
    <h1>Enter Details To Sign Up</h1>
    <div id="invalid" style="color: cyan; font-style: italic; text-align:center"></div>
    <form class="container" action="signupAction.php" method="POST">
        <label for="user">Username</label>
        <small class="error" style="color:cyan"><i>Enter a valid username (Alphanumeric)</i></small>
        <input type="text" name="user" id="user" class="form-control">
        <label for="pass1">Password</label>
        <small class="error" style="color:cyan"><i>Enter a valid password (Alphanumeric, - or _, 7 characters min.)</i></small>
        <input type="password" name="pass1" id="pass1" class="form-control">
        <label for="pass2">Confirm Password</label>
        <small class="error" style="color:cyan"><i>Enter a valid password (Alphanumeric, - or _, 7 characters min.)</i></small>
        <input type="password" name="pass2" id="pass2" class="form-control"><br>
        <table>
            <tr>
                <td><input type="submit" name="signup" id="signup" value="Sign Up" disabled></td>
            </tr>
            <tr>
                <td>
                    <a href="signin.php">Already have an account?</a>
                </td>
            </tr>
        </table>
    </form>
</section>

<?php require_once("footer.php") ?>
<script src="signupAjax.js"></script>
<script src="upValidation.js"></script>
</body>

</html>