
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

<html>

<head>

    <title>HOME</title>

    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>

<?php

//show riders
foreach($riders as $rider) {

 echo "<div class='container'>";
     echo "<div class='row'>";
           echo "<div class='col-4'>";
                echo "<img src='images/".$rider['profile_img']."' class='img-fluid' alt='Responsive image'>";
           echo "</div>";
           echo "<div class='col-8'>";
                echo "<h1>".$rider['name']."</h1>";
               
           echo "</div>";

     


}



?>


</div>

</body>

</html>


