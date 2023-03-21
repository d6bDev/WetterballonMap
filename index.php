<?php
  session_start();
  //&pdo = new PDO('mysql:host=192.168.178.71:3306;dbname=Weatherballon', 'julius.huesers@iserv-marianum.de','1234');//Variabel für benutzer einsetzen // PDO funktioniert anscheinend bei meinem Server nur mit einer extension, deshalb alte methode

  $dbname = 'Weatherballon';
  $hostname = '192.168.178.71:3306';

  //if(!isset($_Session['username'])) got to login
    $_Session['username'] = 'julius.huesers@gmail.com';  
    $password = '1234';


  $con = mysqli_connect($hostname, $_Session['username'], $password, $dbname);

  if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL" . mysqli_connect_error();
  }

  $sql = "INSERT INTO gues_contest (gmail, lat, lng, min_temp, max_height)
  VALUES ('" . $_COOKIE[lat] . "', '" . $_COOKIE[lng] . "', '" . $_COOKIE[min_temp] . "', '" . $_COOKIE[max_height]  . "')";

  if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $con->close();

?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
      <title>Map</title>
      <link rel="stylesheet" href="css.css">
      <link rel = "icon" type="image/x-icon" href="favicon.ico">
      
  </head>
  <body onload="init()">
    <header>Wetterballon-Quiz</header>

    <div>
      Um das Quiz auszufüllen nutzen sie die Map um ein Landepunkt der Wettersonde auzwählen, durch bedienen des Curses.
      <br/>
      Nachdem sie einen Landepunkt aus gefählt haben klicken Sie auf den blauen Marker und füllen Sie die weiteren Felder aus und klicken Sie danach auf Absenden.
      <br/>
      Für jeden Einuelnen bereich (Koordinaten, niedrigste Temperatur und maximale Höhe), wird eine Sieger Klasse/Kurs nach dem Landen der Sonde bestimmmt, diese Sieger bekommen <b>Schnitzelbrötchen Gutscheine!<b>
    </div>

    <div id="map" class="map" style="width: 50; height: 50"></div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="map.js"></script>

    <h1>Hello World!</h1>
  <form>
    <label for="fname">Vorname:</label>
    <input type="text" id="fname" name="fname">
    <label for="lname">Nachname:</label>
    <input type="text" id="fname" name="fname">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <input type="submit">
  </form>

<!--
  <div>
    Favicon Icon von Bima Pamungkas
  <a href="https://www.flaticon.com/de/kostenlose-icons/erkunden" title="erkunden Icons">Erkunden Icons erstellt von Bima Pamungkas - Flaticon</a>
</div> 
-->

</body>
</html>