
<?php 

session_start();

include "database.php";

$conn = mysqli_connect("localhost","root","","motogp");

//get riders table
$sql = "SELECT riders.rider_id,name ,team_name , profile_img FROM `riders` , rider_team , teams where rider_team.rider_id = riders.rider_id AND rider_team.team_id = teams.team_id;";
$result = mysqli_query($conn, $sql);
$riders = mysqli_fetch_all($result, MYSQLI_ASSOC);



//handle search input
if(isset($_POST['search'])){
    $search = $_POST['search'];
    $sql = "SELECT riders.rider_id,name ,team_name , profile_img FROM `riders` , rider_team , teams where rider_team.rider_id = riders.rider_id AND rider_team.team_id = teams.team_id AND name LIKE '%$search%';";
    $result = mysqli_query($conn, $sql);
    $riders = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
      <!-- Font Awesome -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
  />
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"  
  />
  <!-- MDB -->  
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
    rel="stylesheet"
  />
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.php">MotoGP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
          <span class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item"> 
                <a class="nav-link" aria-current="page" href="contact.php">Contact</a>
              </li>
              <li class="nav-item"> 
                <a class="nav-link" aria-current="page" href="teams.php">Teams</a>
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
              <?php if (isset($_SESSION['role'])) : ?>
                <?php if ($_SESSION['role'] == 'admin') : ?>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="admin.php">Admin</a>
                  </li>
                <?php endif ?>
                <?php endif ?>
            </ul>
          </span>
        </div>
      </div>
    </nav>

<?php

echo '<div class="container">';
echo '<div class="row">';

foreach ($riders as $rider) {
    echo '<div class="col-md-4 mb-3">';
    echo '  <a href="rider.php?id=' . $rider['rider_id'] . '">';
    echo '    <div class="card h-100">';
    echo '      <img src="' . $rider['profile_img'] . '" class="card-img-top" alt="' . $rider['name'] . '">';
    echo '      <div class="card-body">';
    echo '        <h5 class="card-title">' . $rider['name'] . '</h5>';
    echo '        <p class="card-text">' . $rider['team_name'] . '</p>';
    echo '        <p class="card-text">' . $rider['rider_id'] . '</p>';
    echo '      </div>';
    echo '    </div>';
    echo '  </a>';
    echo '</div>';
}

echo '</div>';
echo '</div>';

?>





</body>
</html>
