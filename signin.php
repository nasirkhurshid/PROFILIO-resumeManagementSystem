<?php
    session_start();
    require_once("redirection.php");
    //redirections depending on the user's state
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
    <title>Sign In</title>
</head>

<body>
<?php require_once("mainheader.php") ?>

<section class="signin">
    <h1>Please Sign In</h1>
    <!-- form fields -->
    <div id="invalid" style="color: cyan; font-style: italic; text-align:center"></div>
    <form class="container" action="signinAction.php" method="POST">
        <label for="user" id="username">Username</label>
        <small class="error"style="color:cyan"><i>Enter a valid username (Alphanumeric)</i></small>
        <input type="text" name="user" id="user" class="form-control">
        <label for="pass">Password</label>
        <small class="error" style="color:cyan"><i>Enter a valid password (Alphanumeric, 7 characters min.)</i></small>
        <input type="password" name="pass" id="pass" class="form-control"><br>
        <table>
            <tr>
                <td><input type="checkbox" name="rem" id="rem"><label for="rem">&nbsp;Keep me signed in</label></td>
            </tr>
            <tr>
                <td><input type="submit" name="signin" id="signin" value="Sign In"></td>
            </tr>
            <tr>
                <td>
                    <a href="signup.php">Don't have an account?</a>
                </td>
            </tr>
        </table> 
    </form>
</section>

<?php require_once("footer.php") ?>
<script src="inValidation.js"></script>
<script src="signinAjax.js"></script>
</body>

</html>