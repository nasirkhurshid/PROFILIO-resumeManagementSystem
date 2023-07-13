<?php
    require_once("redirection.php");
    //redirections depending upon whether a user is signed in or signed up
    if(isset($_COOKIE['id'])){
      redirect_show();
    }
    if(isset($_SESSION['id'])){
      header("Location: signout.php", true, 301);
      die();
    }
    else if(isset($_SESSION['user'])){
      header("Location: discard.php", true, 301);
      die();
    }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles1.css">
    <title>Profilio</title>
</head>

<body>
<?php require_once("mainheader.php")?>
<!-- introduction page -->
<section class="profilio">
  <h1>Welcome To Profilio</h1>
  <p>
    Profilio is a Profile Management System where you can create, save and update your profile by simply inputting the data 
    through form fields. You can also view the profiles of other users that have registered themselves with Profilio.
  </p>
</section>

<?php require_once("footer.php") ?>
</body>

</html>