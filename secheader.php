<?php       //this header is used when user is logged in
  require_once("config.inc.php");
  //fetching name from database for displaying in header when user is logged in
  if(isset($_SESSION['id'])){
    $conn = DB_S.":host=".DB_H.";dbname=".DB_N;
    try{
        $id = $_SESSION['id'];
        $pdo = new PDO($conn,DB_U,DB_P);
        $sql = "SELECT * FROM basics WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue('id',$id);
        $stmt->execute();
        $rec = $stmt->fetch();
        $name = $rec['name'];
    }
    catch(PDOException $e){
      die("Server Error");
    }
  }
  else{
    $name = "Guest";
  }
?>
<head>
  <link rel="icon" type="image/x-icon" href="favicon.png">
  <!-- used embedded styling because external styling was having issues -->
  <style>
    #alice{
      color: alice;
    }
    #alice:hover{
      text-shadow: 1px 1px 5px var(--color2);
      color: var(--color1);
    }
  </style>
</head>
<!-- NAVBAR START -->
<nav class="navbar navbar-expand-md navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="signout.php" id="alice">PROFILIO</a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="showUsers.php" id="alice">Show All Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="update.php" id="alice">Update</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signout.php" id="alice">Sign Out</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="show.php" id="alice"><?php echo $name?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- NAVBAR END -->