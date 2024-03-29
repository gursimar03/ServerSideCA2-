<?php 
 session_start();

    include "database.php";
    global $conn;


    $errors = array();

    
// Handle form submission
if (isset($_POST['reg_user'])) {
    // Validate and sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // Check if the user already exists
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Register the user if there are no errors
    if (count($errors) == 0) {
        $password =$password_1; 
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conn, $query);
        header('location: home.php');
    }
}

// Close the database connection
mysqli_close($conn);



?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="register.css">
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
  <script src="registerValidate.js"></script>
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

<div class="header">
        <h2>Register</h2>
    </div>
    
    <form id="registerForm" method="post" action="register.php">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" id="username" class="form-control">
        <div id="usernameError" class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control">
        <div id="emailError" class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="password_1" class="form-label">Password</label>
        <input type="password" name="password_1" id="password_1" class="form-control">
        <div id="password1Error" class="invalid-feedback"></div>
    </div>
    <div class="mb-3">
        <label for="password_2" class="form-label">Confirm password</label>
        <input type="password" name="password_2" id="password_2" class="form-control">
        <div id="password2Error" class="invalid-feedback"></div>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <p class="mt-3">
        Already a member? <a href="login.php">Sign in</a>
    </p>
</form>

</body>
</html>

