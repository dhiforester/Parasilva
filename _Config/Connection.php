<?php
    //Ini adalah halaman untuk melakukan konfigurasi database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "parasilva";
    // Create connection
    $Conn = new mysqli($servername, $username, $password, $db);
    // Check connection
    if ($Conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?> 