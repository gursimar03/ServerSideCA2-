<?php


session_start();

include "database.php";

$conn = mysqli_connect("localhost","root","","motogp");


?>

<!DOCTYPE html>
<html>
<head>
    <title>Rider Details</title>
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

<style>
  .container{
    position: absolute;
    top: 35%;
    left: 20%;
  }

    h1 {
        font-size: 2.5rem;
        color: #337ab7;
    }
    p {
        font-size: 1.5rem;
    }
    img {
        width: 250px;
        height: 200px;
        float: right;
    }

    #rider-card{
        top : 10%;
        position: absolute;
        padding : 20px;
        marging : 10px;
        margin-top: 0px;
        width: 98%;
        left: 20px;
        height: 25%;
        background-color: #2E2E2E;
        color: white;
    }




</style>
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

    $id = $_GET['id'];


   
    $sql = "SELECT * FROM riders , rider_team , teams WHERE riders.rider_id = $id AND rider_team.rider_id = riders.rider_id AND rider_team.team_id = teams.team_id";
    $result = $conn->query($sql);

    if(isset($_SESSION['id'])){
        $sql = "SELECT race_results.race_id,result_rank,result_time,race_name,race_date FROM races,race_results WHERE race_results.rider_id = $id ORDER BY race_date DESC ";

        $race_result = $conn->query($sql);
    }else {
      
        $sql = "SELECT race_results.race_id,result_rank,result_time,race_name,race_date FROM races,race_results WHERE race_results.rider_id = $id ORDER BY race_date DESC LIMIT 5 ";
        $race_result = $conn->query($sql);
      }


    $conn->close();
    ?>`

        <?php
      
            while($row = $result->fetch_assoc()) {
                $rider_card = '<div id="rider-card">
                <img id="rider-img" src="' . $row['profile_img'] . '" alt="rider image" />
                <h1>' . $row["name"] . '</h1>
                <p>Team: ' . $row["team_name"] . '</p>
                <p>Country: ' . $row["nationality"] . '</p>
                <h2 id="rider-id"> ID: ' . $row["rider_id"] . '</h2>
           ';
            }
            echo $rider_card;
       
        ?>
    </div>

<?php
if ($race_result->num_rows > 0)
     {
      
    $table = '<div class="container">
    <h1>Race Results</h1>
                <table class="table table-striped table-hover">
              <tr> 
                <th> Race ID </th>
                <th> Rank </th> 
                <th> Time </th>
                <th> Race Name </th>
                <th> Date </th>
              </tr>';
    while($row = $race_result->fetch_assoc()) {
        $table =  $table .  '<tr>
                    <th>' . $row["race_id"] . '</th>
                    <th>' . $row["result_rank"] . '</th>
                    <th>' . $row["result_time"] . '</th>
                    <th>' . $row["race_name"] . '</th>
                    <th>' . $row["race_date"] . '</th>
                    </tr>' ;

    }
    
        $table . '</table> </div>';
        echo $table;
}


    ?>



<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

</body>
</html>
