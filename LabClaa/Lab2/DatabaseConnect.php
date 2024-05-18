<?php $hostname = "localhost";  
$username = "tewuhbo";  
$password = "password";  
$database = "Lab2";  

// Create a connection
$con = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);}
    ?>