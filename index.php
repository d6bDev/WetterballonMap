<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Gymnasium, Marianum, Meppen, Emsland, Schulstiftung, Osnabrück, freie Schule, Privatschule, Umweltschule, Wetterballon, Röchling, Haren, Stratoflight, Schüco-Arena">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="assets/css.css">
    <title>Wetterballon</title>
</head>
<body>

    <ul class="bar">
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="quiz.php">Quiz</a></li>
        <li style="float: right;"><img class="logo" src="https://www.roechling.com/typo3conf/ext/bw_roechling_template/Resources/Public/Icons/mstile-144x144.png" height="60 "></li>
        <li style="float: right;"><img class="logo" src="https://www.marianum-meppen.de/img/logo-marianum_small.jpg" height="60"></li>
        <li style="float: right;"><a href="login.php">Login</a></li>
        <!--<li style="float: right;"><a href="register.php">Registrierung</a></li>-->
        <li style="float: right;"><a><?php echo $_SESSION['vorname'].'-'.$_Session['nachname']; ?></a></li>
    </ul>

    <div class="News">

        <!--<header class="center" style="width: max-content;"><h1>Willkommen zum Projekt Wetterballon</h1></header>-->

        <div>
            <img class="center" src="images/Auf_ins_All.png" alt="Auf ins All">
        </div>

        <div>
            Auf dieser Seite kommt ihr dem Weltall ganz nah.
            <br>
            Seid live dabei, wenn im Park des Marianum ein großer Wetterballon in Richtung All startet.
            <br>
            Nehmt mit eurer Klasse an unserem kleinen Gewinnspiel teil.
            <br>
            Klickt dazu oben rechts auf Login, gebt pro Klasse/Tutorenkus folgende Tipps ab:
            <br>
            <ol>
                <li>Wie hoch wird der Ballon fliegen?</li>
                <li>Welcher minimalen Umgebungstemperatur wird der Ballon ausgesetzt sein?</li>
                <li>Wo wird der Ballon landen?</li>
            </ol>
        </div>



        <div class="Info">
        <h1 class="Überschrift" style="text-decoration: underline">Info:</h1>
            <div>
                <p>
                    Geplanter Start*: Mittwoch, der 06.12.2023 um 9:40 Uhr
                    </br>
                    Tippabgabe:     nur am 04.12 und 05.12.2023 
                    </br> 
                    *bei unpassenden Wetterbedingugen muss der Start verschoben werden
                </p>
            </div>

            <figure>
                <img class="titlepicture" src="https://www.marianum-meppen.de/aktuelles/2023/2023_img/news2023_18_1.jpg" alt="Ein Bild von der Kamera, des Wetterballon in der Stratosphäre. Mit Blick auf den Versuch und Erde">
                <figcaption><span class="Unterschrift">Blick aus der Stratosphäre</span></figcaption>
            </figure>    
                       
            <p>
            Das Foto oben stammt von unserem ersten Probeflug am 26.01.2023. Dieser Ballon startete vom Gelände der WTD91 ganz in der Nähe des Marianums.
            </p>

            <p class="center" style="text-decoration:double;">
             Viel Spaß beim Mitmachen wünscht das Seminarfach 4 aus dem Jahrgang 13!
            </p>

        </div>



    </div>
    
</body>
</html>