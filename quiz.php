<?php
session_start();
require "assets/database.php";

if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true){
    header("location: login.php");
    exit;
}


$id = $min_temp = $max_height = $lat = $lng = "";
$db_min_temp = $db_max_height = $db_lat = $db_lng = "";
$errors =[];

$id = $_SESSION['id'];

if($id != 0 && empty($errors)){
    $sql = "SELECT lat, lng, min_temp, max_height from users WHERE id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch();

    if (!$data) {
        array_push($errors, "account not found.");
    } else {
        $db_min_temp = $data['min_temp'];
        $db_max_height = $data['max_height'];
        $db_lat = $data['lat'];
        $db_lng = $data['lng'];
        
        //UPDATE users SET email = '...', passwort = password('...') WHERE vorname = '';
    }
} else {
    array_push($errors, 'error with the Session.');
}


if (isset($_POST['Senden'])){
    $id = $_SESSION['id'];
    if(trim($_POST['latitude']) == '') $lat = $db_lat;
    else $lat = trim($_POST['latitude']);
    if(trim($_POST['longitude']) == '') $lng = $db_lng;
    else $lng = trim($_POST['longitude']);
    if(trim($_POST['low_temp']) == '') $min_temp = $db_min_temp;
    else $min_temp = trim($_POST['low_temp']);
    if(trim($_POST['max_altitude']) == '') $max_height = $db_max_height;
    else $max_height = trim($_POST['max_altitude']);

    if (empty($errors)){
        $sql = "UPDATE users SET lat = ?, lng = ?, min_temp = ?, max_height = ? WHERE  id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$lat, $lng, $min_temp, $max_height, $id]);
        $data = $stmt->fetch();

        echo $data;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Gymnasium, Marianum, Meppen, Emsland, Schulstiftung, Osnabrück, freie Schule, Privatschule, Umweltschule, Wetterballon, Röchling, Haren, Stratoflight, Schüco-Arena">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="assets/css.css">
    <title>Quiz</title>
</head>
<body onload="init()">
   <?php 
        echo "<scrip>
                document.getElementById('latitude').value = $lat;
            </scrip>";
   ?>   
    <ul class="bar">
        <li><a href="index.php">Home</a></li>
        <li><a class="active" href="quiz.php">Quiz</a></li>
        <li style="float: right;"><a href="logout.php">Logout</a></li>
        <li style="float: right;"><a><?php echo $_SESSION['vorname']; ?></a></li>
    </ul>

    <div class="content">

        <header><h1>Quiz</h1></header>

        <div class="quiz">
            
            <!--------------Map----------------------->
            <div id="map" class="map" style="width: 50; height: 50"></div>
            <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
            <script src="assets/map.js"></script>
            
            <div class="answer_formular">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

                    <p>
                        <label for="max_altitude">Maximale Höhe in Meter</label>
                        <input type="number" id="max_altitude" name="max_altitude">
                    </p>

                    <p>
                        <label for="low_temp">Niedrigste Temperatur in °C</label>
                        <input type="number" id="low_temp" name="low_temp">
                    </p>

                    <p>
                        Landepunkt:
                    </p>

                    <p>
                        <label for="longitude">Längengrad</label>
                        <input type="number" id="longitude" name="longitude">
                    </p>

                    <p>
                        <label for="latitude">Breitengrad</label>
                        <input type="number" id="latitude" name="latitude">
                    </p>

                    <p>
                        <input type="submit" value="Senden" name="Senden">
                    </p>

                </form>

                <p>
                    <?php
                        foreach($errors as $error){
                            echo $error."<br>";
                        }
                    ?>
                </p>

            </div>

        </div>

         <?php echo $_SESSION['vorname']; ?><!--Man kann jetzt personespezifische Daten einfügen-->

    </div>

</body>
</html>