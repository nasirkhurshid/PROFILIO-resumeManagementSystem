<!-- NAVBAR START -->
<!-- required header for every user and home page -->
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
<nav class="navbar navbar-expand-md navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="signout.php" id="alice">PROFILIO</a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="showUsers.php" id="alice">Show All Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php" id="alice">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signin.php" id="alice">Sign In</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- NAVBAR END -->