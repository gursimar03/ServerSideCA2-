<?php 
 session_start();

    include "database.php";
    $conn = mysqli_connect("localhost","root","","motogp");


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
        header('location: login.php');
    }
}

// Close the database connection
mysqli_close($conn);



?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form method="post" action="register.php">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
</body>
</html>

