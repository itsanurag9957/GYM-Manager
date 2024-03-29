<?php
    $host = "localhost";
    $port = "5432";
    $dbname = "gym_database2";
    $user = "postgres";
    $password = "1234";
    
    $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password}";
    $dbcon = pg_connect($connection_string);

    if (!$dbcon) {
        die("Connection failed: " . pg_last_error());
    } else {
       
    }
    
?>