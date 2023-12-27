<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "vgiems";

// $servername = "localhost";
// $username = "vgiems";
// $password = "5Z9gAN-rJhaZ";
// $db = "vgiems";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>