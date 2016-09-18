<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "realtime_chart";

// Create connection
$conn = new mysqli($server, $username, $password, $database);

// Check if not connected
if($conn->connect_error) {
    die('Connection failed: Cannot connect to database!');
}
