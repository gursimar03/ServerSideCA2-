<?php
    $dsn = 'mysql:host=localhost;dbname=D00251867';
    $username = 'D00251867';
    $password = 'c8PhLs0Y'; 

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }

    

    $conn = mysqli_connect("localhost","D00251867","c8PhLs0Y","D00251867");

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>