<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="../../assets/style/style.css" type="text/css">
        
    </head>
    <body>
        <form action="../../index.php">
            <input type="submit" value="Zurück zur Hauptseite">
        </form>
    </body>
</html>
<?php
$hostname = '192.168.178.71:3306';
$username = 'mapdata';
$password = '1234423';
$dbname = 'Weatherballon_gues_contest';
$con = mysqli_connect($hostname, $username, $password, $dbname);
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL" . mysqli_connect_error();
}

$sql = "INSERT INTO landing_assumption (fname, lname, gmail, lat, lng, min_temp, max_height, TPU, ABS, Nylon)
VALUES ('" . $_COOKIE[CR10_filament] . "', '" . $_COOKIE[ender_filament] . "', '" . $_COOKIE[CR10_fan_speed] . "', '" . $_COOKIE[ender_fan_speed] . "', '" . $_COOKIE[PLA_temp] . "', '" . $_COOKIE[Holz_PLA_temp] . "', '" . $_COOKIE[PETG_temp] . "', '" . $_COOKIE[TPU_temp] . "', '" . $_COOKIE[ABS_temp] . "', '" . $_COOKIE[Nylon_temp] . "')";

if ($con->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$con->close();
?>