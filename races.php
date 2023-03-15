<?php
session_start();

include "database.php";

global $conn;

$sql = "SELECT races.race_name , race_results.race_id, race_results.result_rank , race_results.rider_id , riders.name , race_results.result_time FROM teams , riders , rider_team , races , race_results where teams.team_id = rider_team.team_id and riders.rider_id = rider_team.rider_id and race_results.rider_id = riders.rider_id";
$result = mysqli_query($conn, $sql);
?>


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="generator" content="Hugo 0.80.0">
        <title>Starter Template · Bootstrap v5.0</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
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
                <a class="nav-link" aria-current="page" href="races.php">Races</a>
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

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Races</h1>

                    <lable for="race">Race Name :</lable>


<!-- Display the form with the race dropdown menu -->
<form method="post">
    <label for="race_switch">Select a race:</label>
    <select id="race_switch" name="race_switch">
        <option value="">Select a race</option>
        <?php
            // Generate the race options from the database
            $sql = "SELECT race_id, race_name FROM races";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $race_id = $row['race_id'];
                $race_name = $row['race_name'];
                echo '<option value="' . $race_id . '">' . $race_name . '</option>';
            }
        ?>
    </select>
    <button type="submit">Submit</button>
</form>


                             
<?php
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the selected race ID from the form data
        $selectedID = $_POST['race_switch'];
        $sql = "SELECT result_rank, riders.name, race_results.result_time, teams.team_name FROM riders, teams, races, race_results , rider_team WHERE race_results.race_id = $selectedID AND race_results.rider_id = riders.rider_id AND teams.team_id = rider_team.team_id AND rider_team.rider_id = riders.rider_id AND race_results.race_id = races.race_id ORDER BY result_rank ASC";

        $result = mysqli_query($conn, $sql);
    }

    
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Rank</th>
            <th>Rider Name</th>
            <th>Result Time</th>
            <th>Team Name</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['result_rank']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['result_time']; ?></td>
                <td><?php echo $row['team_name']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
                       
                </div>
            </div>
        </div>

    </body>

