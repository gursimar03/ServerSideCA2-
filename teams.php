<?php
session_start();

include "database.php";

global $conn;

$sql = "SELECT * FROM teams";

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
                    <h1>Teams</h1>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Team</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td><?php echo $row['team_name']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </body>

