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
        <li style="float: right;"><img class="logo" src="https://www.roechling.com/typo3conf/ext/bw_roechling_template/Resources/Public/Icons/mstile-144x144.png" height="40"></li>
        <li style="float: right;"><img class="logo" src="https://www.marianum-meppen.de/img/logo-marianum_small.jpg" height="40"></li>
        <li style="float: right;"><a href="login.php">Login</a></li>
        <li style="float: right;"><a href="register.php">Registrierung</a></li>
        <li style="float: right;"><a><?php echo $_SESSION['vorname']; ?></a></li>
    </ul>

    <div class="content">

        <header><h1>Willkommen zum Projekt Wetterballon</h1></header>

        <iframe width="550" height="315" src="https://www.youtube.com/embed/X3Rdv65o7_M?autoplay=1&mute=1&loop=1"></iframe>
        <div class="News">
            <h1 class="Überschrift">Das gibts doch gar nicht! Erste Wettersonde vom Marianum landet neben Schüco-Arena in Bielefeld</h1>
            <hr>
            <p class="Unterschrift">Von T. Beelmann, 07.02.2023</p>
           
            <figure>
                <img class="titlepicture" src="https://www.marianum-meppen.de/aktuelles/2023/2023_img/news2023_18_1.jpg" alt="Ein Bild von der Kamera, des Wetterballon in der Stratosphäre. Mit Blick auf den Versuch und Erde">
                <figcaption><span class="Unterschrift">Blick aus der Stratosphäre</span></figcaption>
            </figure>

            
            <div class="News_assets">
                <figure>
                    <img src="https://www.marianum-meppen.de/aktuelles/2023/2023_img/news2023_18_2_small.jpg" alt="Schüler stehen vor der Schüco-Arena, mit restl. Teilen des Wetterballon.">
                    <figcaption><span class="Unterschrift">Schüler vor Schüco-Arena</span></figcaption>
                    <br>
                    <img src="https://www.marianum-meppen.de/aktuelles/2023/2023_img/news2023_18_3_small.jpg" alt="Ausgewerte Daten des Wetterballon in einem Diagram">
                    <figcaption><span class="Unterschrift">Hier eine Auswahl der Ergebnisse der Messsensoren</span></figcaption>
                </figure>
            
            </div>
            
            <p>
                Als die Schülerinnen und Schüler vom Seminarfach 4 des Jahrgangs 12 am 26.01.2023 ihren ersten Wetterballon 
                vom Gelände der WTD-91 in Meppen steigen ließen, ahnte wohl niemand, dass die angehängte Sonde bis nach Bielefeld 
                fliegen würde. Wegen eines starken Jetstreams in der Woche zuvor hatte man den Start extra um eine Woche nach 
                hinten verlegt, weil man befürchtete, die Sonde könnte in der Ostsee landen. Am Donnerstag vor den Zeugnisferien 
                schienen die Aussichten dann besser. Aber von vorne:
            </p>

            <p>
                Das Seminarfach 4 trägt den Titel 
                <em>Stratoflight - Mit dem Wetterballon an den Rand des Weltalls</em>
                .Die 17 Schülerinnen und Schüler planen dort den Flug eines Wetterballons, um mithilfe eingebauter Messtechnik 
                Aufschlüsse über die unteren Schichten der Erdatmosphäre zu gewinnen. Finanziell unterstützt wird das Projekt 
                von dem Unternehmen Röchling Industrial in Haren. Professionelle Hilfe gewährt die WTD-91. Um die Technik zu 
                testen, wurde nun ein erster Probeballon nach oben geschickt, und dieser übertraf gleich alle Erwartungen. 
                Um Punkt 11:45 Uhr erfolgte der Start vom Gelände der WTD-91. Der Ballon gewann schnell an Höhe und 
                verfehlte nach zwei Stunden Flugzeit mit einer Höhe von 29557 m nur knapp die 30 km-Marke, als der 
                Ballon wie geplant platzte. Etwa eine Stunde später landete die Sonde durch drei Fallschirme gebremst direkt 
                vor dem Haupteingang der Schüco-Arena in Bielefeld. 

            </p>

            <p>
                Bereits kurz nach dem Start machte sich der Suchtrupp auf den Weg, um die Sonde zu verfolgen und möglichst schnell 
                wiederzufinden. Dabei nutzten die vier Schüler zusammen mit Herrn Beelmann zunächst Informationen aus dem Internet, 
                um die grobe Flugbahn zu verfolgen. Etwa 1000 m vor der Landung aktivierten sich dann wie erhofft die beiden 
                eingebauten GPS-Systeme und funkten die exakte Position auf die Smartphones der Schüler, so dass sie guter Dinge 
                waren, pünktlich bei der Landung vor Ort zu sein. Der Stadtverkehr in Bielefeld verhinderte dies jedoch und so 
                klingelte zwei Kilometer vor dem Ziel das Telefon eines professionellen Sondenjägers, der die Sonde bereits 
                aufgefunden hatte. 
            </p>
            
            <p>
                Der erste Probeflug verlief ohne Pannen. Alle Systeme arbeiteten fehlerfrei, so dass das Team nach diesem wichtigen 
                Test mit Zuversicht auf die weiteren Projekte blickt. In den folgenden Wochen werden in den Sitzungen des 
                Seminarfachs die durch einen Datenlogger erfassten Daten genau ausgewertet. Die beiden eingebauten Kameras lieferten 
                beeindruckende <a href="">Video</a> aus horizontaler und vertikaler Perspektive, die Julius Hüsers in einem ersten Schnitt 
                zusammengefasst hat. 
            </p>
            
            <p>
                Das nächste Ziel des Teams ist es, vor den Sommerferien den Flug eines großen Ballons vom Schulgelände zu realisieren. 
                Dabei sollen weitere Experimente mit an Board sein. Als ein weiteres Highlight wird eine Video-Liveübertragung 
                angestrebt. Große Herausforderungen, die mit großem Eifer angegangen werden. 
            </p>

            <p>
                Bedanken möchte sich das Seminarfachteam beim Unternehmen Röchling Industrial in Haren für die großzügige finanzielle 
                Unterstützung und bei der WTD-91 für die Bereitstellung ihrer Anlagen und ihres Knowhows. 
            </p>

        </div>



    </div>
    
</body>
</html>