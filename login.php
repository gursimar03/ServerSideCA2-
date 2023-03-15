<?php 
session_start(); 
include "database.php";
global $conn;

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    if (empty($email)) {
        header("Location: login.php?error=Email is required");
        exit();
    } else if(empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            
            $row = mysqli_fetch_assoc($result);
            
            
            if ($row['email'] === $email && $row['password'] === $pass) {
                echo "Logged in!";
                
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['username'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['privilege'];
            

                header("Location: home.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect username or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorrect username or password");
            exit();
        }
    }
} else {
    // header("Location: home.php");
    // exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<style>
html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>

</head>


<body>


    

<main class="form-signin w-100 m-auto">
     <form action="login.php" method="post">
     <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    <img class="mb-4" src="https://i.pinimg.com/originals/76/d6/87/76d68778f82a4a3a1b3f9b58c3574879.png" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
</main>
</body>
</html>