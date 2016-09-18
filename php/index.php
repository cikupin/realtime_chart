<?php

include 'config/database.php';

// Fetch data from database
$sql = "SELECT * FROM chart_data ORDER BY id DESC LIMIT 100";

try {
    $result = $conn->query($sql);    
}
catch(Exception $ex) {
    die('Query Error!');
}

//Close connection
$conn->close();

// View data
include 'view/chart.php';
