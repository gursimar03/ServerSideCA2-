
<?php 

session_start();
?>



<!DOCTYPE html>

<html>

<head>

    <title>HOME</title>

    <link rel="stylesheet" type="text/css" href="login.css">

</head>

<body>

     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>

     <a href="logout.php">Logout</a>

</body>

</html>


