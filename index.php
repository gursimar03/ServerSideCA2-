<?php

session_start();


include "database.php";

$conn = mysqli_connect("localhost","root","","motogp");

//get riders table
$sql = "SELECT * FROM riders";
$result = mysqli_query($conn, $sql);
$riders = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Starter Template · Bootstrap v5.0</title>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="mystyle.css" rel="stylesheet">
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
      <div class="container">
        <a class="navbar-brand" href="index.html">Site Title</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
          <span class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="page-1.html">Page 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="page-2.html">Page 2</a>
              </li>
              <li class="nav-item">
                <?php 
                if (isset($_SESSION['email'])) {
                  echo '<a class="nav-link" aria-current="page" href="logout.php">Logout</a>';
                } else {
                  echo '<a class="nav-link" aria-current="page" href="login.php">Login</a>';
                }
                ?>
              </li>
              <?php if ( !isset($_SESSION['email'])): ?>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="register.php">Register</a>
                </li>
              <?php endif ?>
            </ul>
          </span>
        </div>
      </div>
    </nav>

    



<main class="container">
 
<?php if (isset($_SESSION['email'])): ?>
  <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
<?php endif ?>

<div class="row">
  <?php foreach($riders as $rider): ?>
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        <img src="<?= $rider['profile_img'] ?>" style="width:50%; height:50%;" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $rider['name'] ?></h5>
          <p class="card-text"><?= $rider['nationality'] ?></p>
          <a href="rider.php?id=<?= $rider['race_id'] ?>" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>


 

</main><!-- /.container -->
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
