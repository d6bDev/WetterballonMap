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
// send Query
$sql = "INSERT INTO ". $db_dbname ." (firstname, lastname, email, lat, lng)
VALUES ('John', 'Doe', 'john@example.com',". $_COOKIE["lat"] .", ". $_COOKIE["lng"] .")";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>