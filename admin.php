<?php 

session_start();

include "database.php";

global $conn;


?>


<!DOCTYPE html>
<html>
    <head>

    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="admin.css">

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


    <div>
      <h1>Admin Page</h1>
    </div>
    <nav class="admin-nav">
        <div class="options">
                        <a class="s-nav" href="admin.php?view=users">View Users</a>
                        <a class="s-nav" href="admin.php?view=riders">View Riders</a>
                        <a class="s-nav" href="admin.php?view=teams">View Teams</a>
                        
          </div>
    </nav>

<?php 
        if(isset($_GET['view'])){
            $view = $_GET['view'];
        } else {
            $view = 'home';
        }

       if($view == 'users'){

            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $table = '
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>';

            foreach($users as $user){
                $table .= '
                <tr>
                    <th scope="row">'.$user['user_id'].'</th>
                    <td>'.$user['name'].'</td>
                    <td>'.$user['email'].'</td>
                    <td>'.$user['privilege'].'</td>
                    <td><a href="admin.php?view=deleteUser&id='.$user['user_id'].'">Delete</a></td>
                </tr>';
            }

            $table .= '
                </tbody>
            </table>';

            echo $table;
            
        }elseif($view == 'riders'){

            $sql = "SELECT * FROM riders , teams , rider_team WHERE riders.rider_id = rider_team.rider_id AND teams.team_id = rider_team.team_id";
            $result = mysqli_query($conn, $sql);
            $riders = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $table = '
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
                        <th scope="col">Team</th>
                        <th scope="col">Country</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>';

            foreach($riders as $rider){
                $table .= '
                <tr>
                    <th scope="row">'.$rider['rider_id'].'</th>
                    <td>'.$rider['name'].'</td>
                    <td>'.$rider['team_name'].'</td>
                    <td>'.$rider['nationality'].'</td>
                    <td>'.$rider['born'].'</td>
                    <td><a href="admin.php?view=deleteRider&id='.$rider['rider_id'].'">Delete</a></td>
                </tr>';
            }

            $table .= '
                </tbody>
            </table> <a class="add-btn" href="admin.php?view=addRider">Add Rider</a> ';

            echo $table;

        }elseif($view == 'teams'){

            $sql = "SELECT * FROM teams";
            $result = mysqli_query($conn, $sql);
            $teams = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $table = '
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
        
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>';

            foreach($teams as $team){
                $table .= '
                <tr>
                    <th scope="row">'.$team['team_id'].'</th>
                    <td>'.$team['team_name'].'</td>
                    <td><a  href="admin.php?view=deleteTeam&id='.$team['team_id'].'">Delete</a></td>
                   
                </tr>';
            }

            $table .= '
                </tbody>
            </table> <a class="add-btn" href="admin.php?view=addTeam">Add Team</a>';

            echo $table;

        }

        if($view == 'deleteUser'){
            $id = $_GET['id'];
            $sql = "DELETE FROM users WHERE user_id = $id";
            $result = mysqli_query($conn, $sql);
            header('Location: admin.php?view=users');
        }

        if($view == 'deleteRider'){
            $id = $_GET['id'];
            
            $sql = "DELETE FROM rider_team WHERE rider_id = $id";
            $result = mysqli_query($conn, $sql);
            $sql = "DELETE FROM riders WHERE rider_id = $id";
            $result = mysqli_query($conn, $sql);
            header('Location: admin.php?view=riders');
        }

        if($view == 'deleteTeam'){
            $id = $_GET['id'];
            $sql = "DELETE FROM teams WHERE team_id = $id";
            $result = mysqli_query($conn, $sql);
            header('Location: admin.php?view=teams');
        }

        if($view == 'addRider'){

            $sql = "SELECT * FROM teams";
            $result = mysqli_query($conn, $sql);
            $teams = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $form = '
            <form action="admin.php?view=addRider" method="POST">
                <div class="mb-3">
                    <label for="riderID" class="form-label">Rider ID</label>
                    <input type="text" class="form-control" id="riderID" name="riderID">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="team" class="form-label">Team</label>
                    <select class="form-select" aria-label="Default select example" name="team">
                        <option selected>Select Team</option>';
                        foreach($teams as $team){
                            $form .= '<option value="'.$team['team_id'].'">'.$team['team_name'].'</option>';
                        }
            $form .= '
                    </select>
                </div>
                <div class="mb-3">
                    <label for="profile" class="form-label">Profile-Img URL</label>
                    <input type="text" class="form-control" id="profile_img" name="profile">
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country">
                </div>
                <div class="mb-3">
                    <label for="born" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="born" name="born">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            ';

            echo $form;

            if(isset($_POST['name']) && isset($_POST['team']) && isset($_POST['country'])){
                
                $id = $_POST['riderID'];
                $name = $_POST['name'];
                $team = $_POST['team'];
                $profile = $_POST['profile'];
                $country = $_POST['country'];
                $born = $_POST['born'];


                $sql = "INSERT INTO riders ( rider_id, `name`, born, nationality , profile_img ) VALUES ('$id','$name', '$born', '$country' , '$profile')";
                $result = mysqli_query($conn, $sql);

                $sql = "INSERT INTO rider_team (rider_id, team_id) VALUES ('$id','$team')";
                $result = mysqli_query($conn, $sql);
                header('Location: admin.php?view=riders');
            }
        } if($view == "addTeam"){
            $form = '
            <form action="admin.php?view=addTeam" method="POST">
          
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            ';

            echo $form;

            if(isset($_POST['name'])){
                
                $name = $_POST['name'];
          

                $sql = "INSERT INTO teams (team_name ) VALUES ('$name')";
                $result = mysqli_query($conn, $sql);
                header('Location: admin.php?view=teams');
            }
        }
 
  ?>

    </body>