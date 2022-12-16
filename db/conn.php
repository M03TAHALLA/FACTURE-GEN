<?php
$servername = "sql7.freesqldatabase.com";
$username = "sql7584997";
$password = "Su3ZcNQ56i";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 