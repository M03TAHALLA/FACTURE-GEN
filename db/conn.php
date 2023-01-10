<?php
$servername = "sql7.freesqldatabase.com";
$username = "sql7589420";
$password = "4fYqwFelZq";

// Create connection
$conn = new mysqli($servername, $username, $password, $username);

// Check connection
if ($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}
echo "";
?> 