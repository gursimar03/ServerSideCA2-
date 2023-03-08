
<?php 

session_start();

include "database.php";

$conn = mysqli_connect("localhost","root","","motogp");

//get riders table
$sql = "SELECT * FROM riders";
$result = mysqli_query($conn, $sql);
$riders = mysqli_fetch_all($result, MYSQLI_ASSOC);




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Your Brand</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


<?php

echo '<div class="container">';
echo '<div class="row">';

foreach ($riders as $rider) {
    echo '<div class="col-md-4 mb-3">';
    echo '<div class="card h-100">';
    echo '<img src="' . $rider['profile_img'] . '" class="card-img-top" alt="' . $rider['name'] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $rider['name'] . '</h5>';
    echo '<p class="card-text">' . $rider['team'] . '</p>';
    echo '<p class="card-text">' . $rider['nationality'] . '</p>';
    echo '<p class="card-text">' . $rider['born'] . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

echo '</div>';
echo '</div>';
?>


<div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Team</th>
        <th>No</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($riders as $rider): ?>
      <tr>
        <td><?php echo $rider['name']; ?></td>
        <td><?php echo $rider['team']; ?></td>
        <td><?php echo $rider['race_id']; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>



</body>
</html>
