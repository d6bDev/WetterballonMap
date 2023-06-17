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
    <link rel="stylesheet" href="assets/css.css">
    <title>Quiz</title>
</head>
<body onload="init()">
      
    <ul class="bar">
        <li><a href="index.html">Home</a></li>
        <li><a class="active" href="quiz.php">Quiz</a></li>
        <li><a style="float: right;" href="logout.php">Logout</a></li>
        <?php echo $_SESSION['vorname']; ?>
    </ul>

    <div class="content">

        <header><h1>Quiz</h1></header>

        <div class="quiz">
            
            <!--------------Map----------------------->
            <div id="map" class="map" style="width: 50; height: 50"></div>
            <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
            <script src="assets/map.js"></script>

        </div>

         <?php echo $_SESSION['vorname']; ?><!--Man kann jetzt personespezifische Daten einfügen-->

    </div>

</body>
</html>