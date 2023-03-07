<?php
require_once('database.php');
session_start();


// Get products
$queryUsers = 'SELECT * FROM users';
$statement = $db->prepare($queryUsers);
$statement->execute();
$Users = $statement->fetchAll();
$statement->closeCursor();




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="row">
  <div class="col-md-8">
    <div class="pb-3">
      .col-md-8
    </div>
    <div class="row">
      <div class="col-md-6">.col-md-6</div>
      <div class="col-md-6">.col-md-6</div>
    </div>
  </div>
  <div class="col-md-4">.col-md-4</div>
</div>

<form action="login.php">
  <button type="submit" value="Go to Google" />
</form>
</body>
</html>
