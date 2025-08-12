<?php
$servername = "localhost";  // your MySQL server name
$username = "u6cv97zulmams";  // your database username
$password = "csu623ffgn8e";  // your database password
$dbname = "dbeqskn85sncrl";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
