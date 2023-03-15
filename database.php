<?php
$db_severname = "";
$db_username = "";
$db_password = "";
$db_dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "<script> console.log('Connected to DB successfully'); </script>";

$_COOKIE["lat"]
?>