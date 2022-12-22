<?php
$servername = "sql7.freesqldatabase.com";
$username = "sql7586075";
$password = "lit9GXL9wY";

// Create connection
$conn = new mysqli($servername, $username, $password, $username);

// Check connection
if ($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}
echo "";
?> 