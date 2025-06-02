<?php
// Show errors if something goes wrong
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$host = "localhost";
$user = "ufjzzoomqznvk";
$password = "tm2savfugtmk";
$dbname = "dbqd3thni6qope";

// Connect to MySQL database
$conn = new mysqli($host, $user, $password, $dbname);

// Check the connection
