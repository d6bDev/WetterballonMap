<?php
$hostname = '192.168.178.71:3306';
$username = $_POST['username'];
$password = $_POST['password'];
$dbname = 'Weatherballon_gues_contest';
$con = mysqli_connect($hostname, $username, $password, $dbname);
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL" . mysqli_connect_error();
}

$sql = "INSERT INTO landing_assumption (gmail, lat, lng, min_temp, max_height)
VALUES ('" . $_COOKIE['lat'] . "', '" . $_COOKIE['lng'] . "', '" . $_COOKIE['min_temp'] . "', '" . $_COOKIE['max_height']  . "')";

if ($con->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$con->close();
?>