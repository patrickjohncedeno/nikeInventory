<?php
    $serverName = "localhost";
    $userName = "root"; 
    $passWord = ""; 
    $dbName = "nike_inventory_database";

    $conn = mysqli_connect($serverName, $userName, $passWord, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
