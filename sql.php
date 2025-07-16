<?php

function conntodb()
{
    $host = "localhost";
    $username = "root";
    $password = null; // or "" if needed
    $database = "my_world";

    $conn = new mysqli($host, $username, $password, $database);

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   
    return $conn;
}
?>