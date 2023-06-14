<?php
session_start();

if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="stylesheet" href="css.css">
    <title>Quiz</title>
</head>
<body>
    
    <h1>Wilkommen</h1>

    <?php echo $_SESSION['vorname']; ?><!--Man kann jetzt personespezifische Daten einfügen-->

    <!--------------Map----------------------->
    <div id="map" class="map" style="width: 50; height: 50"></div>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="map.js"></script>

</body>
</html>