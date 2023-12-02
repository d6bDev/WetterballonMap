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
<body onload="init(); form()">
    <script>
        function form() {
        <?php 
                        
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

                    if($db_lat == "" || $db_lng == ""){
                        $db_lat = 52.70253708487367;
                        $db_lng = 7.29407455846466;
                    }
                    if($db_min_temp == "") $db_min_temp = 0;
                    if($db_max_height == "") $db_max_height = 0;
                    
                    //UPDATE users SET email = '...', passwort = password('...') WHERE vorname = '';
                }
            } else {
                array_push($errors, 'error with the Session.');
            }
                echo "document.getElementById('latitude').value = $db_lat; \n";
                echo "document.getElementById('longitude').value = $db_lng; \n";
                echo "document.getElementById('low_temp').value = $db_min_temp; \n";
                echo "document.getElementById('max_altitude').value = $db_max_height; \n";
        ?>
        }
   </script>

    <ul class="bar">
        <li><a href="index.php">Home</a></li>
        <li><a class="active" href="quiz.php">Quiz</a></li>
        <li style="float: right;"><a href="logout.php">Logout</a></li>
        <li style="float: right;"><a><?php echo $_SESSION['vorname'].''.$_Session['nachname']; ?></a></li>
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

                <div>

                    <p>
                        Gebt hier als Klasse/Tutorenkurs jeweils einen Tipp ab:
                    </p>

                    <p>
                        <label for="max_altitude">Maximale Höhe in m</label>
                        <input type="number" id="max_altitude" step="any" name="max_altitude" placeholder="z.B. 1232">
                        <br>
                        <div class="Unterschrift">
                        In einer bestimmten Höhe platzt unser Wetterballon. Er hat dann einen Durchmesser in der Größe eines großen Einfamilienhauses. Danach gleitet er an drei Fallschirmen zurück zur Erde.
                        </div> 
                    </p>

                    <p>
                        <label for="low_temp">Niedrigste Temperatur in °C</label>
                        <input type="number" id="low_temp" step="any" name="low_temp" placeholder="z.B. -32">
                        <br>
                        <div class="Unterschrift">
                        Nach oben hin wird es zunächst kälter, am Ende oft aber auch wieder wärmer. Unsere Kameras an Board werden verschiedene Flüssigkeiten filmen, die wir in Reagenzgläsern mitfliegen lassen. Mal sehen, wie sie sich auf dem Flug verhalten. Ein Datenlogger misst neben dem Luftdruck auch die Außentemperatur und viele andere physikalische Größen.
                        </div>
                    </p>

                    <p>
                        Landepunkt:
                    </p>

                    <p>
                        <label for="longitude">Längengrad</label>
                        <input type="number" id="longitude" step="any" name="longitude" placeholder="z.B. 7.29407455846466">
                    </p>

                    <p>
                        <label for="latitude">Breitengrad</label>
                        <input type="number" id="latitude" step="any" name="latitude" placeholder="z.B. 52.70253708487367">
                    </p>

                    <div class="Unterschrift">
                    Winde treiben die Wetterballone oft viele Kilometer weit weg. Gebt hier keine Koordinaten ein, sondern wählt einen <span style="text-decoration: underline;">Punkt auf der Landkarte</span>. Das Programm generiert automatisch die zugehörigen Koordinaten.
                    </div>

                    <p class="">
                        Bestätigt eure Eingabe am Ende mit <b style="text-decoration:underline;">Senden</b>. Schon nehmt iht am gewinnspiel teil.
                    </p>

                    <p>
                        <input type="submit" value="Senden" name="Senden">
                    </p>
                </div>
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

        
    </div>
</body>
</html>