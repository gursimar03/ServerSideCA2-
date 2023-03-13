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
</head>

<style>

    h1 {
        font-size: 2.5rem;
        color: #337ab7;
    }
    p {
        font-size: 1.5rem;
    }
    img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 20px;
    }
</style>
<body>
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
    <div class="container">
    <div class="row">
        <?php
        if ($race_result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img class="card-img-top" src="' . $row["profile_img"] . '" alt="Profile Image">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["name"] . '</h5>';
                echo '<p class="card-text">Age: ' . $row["born"] . '</p>';
                echo '<p class="card-text">Team: ' . $row["team_name"] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No data found for ID " . $id;
        }
        ?>
    </div>
</div>

<?php
    $count = 0;
    while ($row = $race_result->fetch_assoc()) {
      $count++;
      if ($count <= 5 || isset($_SESSION['id'])) {
        echo "<tr>";
        echo "<td>" . $row["race_id"] . "</td>";
        echo "<td>" . $row["result_rank"] . "</td>";
        echo "<td>" . $row["result_time"] . "</td>";
        echo "<td>" . $row["race_name"] . "</td>";
        echo "<td>" . $row["race_date"] . "</td>";
        echo "</tr>";
      } else {
        echo "<tr class='blur'>";
        echo "<td>" . $row["race_id"] . "</td>";
        echo "<td>" . $row["result_rank"] . "</td>";
        echo "<td>" . $row["result_time"] . "</td>";
        echo "<td>" . $row["race_name"] . "</td>";
        echo "<td>" . $row["race_date"] . "</td>";
        echo "</tr>";
      }
    }
    ?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

</body>
</html>
