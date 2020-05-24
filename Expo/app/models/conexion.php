<?php
ob_start();
error_reporting(0);
// connection
$db_conx = mysqli_connect("localhost", "Strowyer117", "10101998", "Expo");
// Evaluate the connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error("Our database server is down at the moment. :(");
    exit();
} 

?>