<?php

echo"<!doctype html>";
echo"<html>";

echo"<head>";
    echo"<title>Consoles</title>";
echo "<link rel='stylesheet' href='css/styles.css'>";

echo"</head>";

echo"<body>";

    echo"<div class='container'>";
        echo"<h1>Consoles</h1>";
        require_once 'assets/nav.php';
        echo"<br>";




        echo"<div class='gallery'>";

            echo"<figure>";
                echo"<img src='images/Dreamcast.png' alt='Dreamcast'>";
                echo"<figcaption>The Dreamcast</figcaption>";
            echo"</figure>";

            echo "<figure>";
                echo "<img src='images/3DS.png' alt='3DS'>";
                echo "<figcaption>The 3DS</figcaption>";
            echo "</figure>";

            echo"<figure id='Ps5'>";
                echo"<img src='images/Playstation5.png' alt='Playstation 5'>";
                echo"<figcaption>The Playstation 5</figcaption>";
            echo"</figure>";

            echo"<figure id='switch'>";
                echo"<img src='images/Switch.jpg' alt='Switch'>";
                echo"<figcaption>The Switch</figcaption>";
            echo"</figure>";

            echo"<figure id='switch2'>";
                echo"<img src='images/Switch2.jpg' alt='Switch 2'>";
                echo"<figcaption>The Switch 2</figcaption>";
            echo"</figure>";

            echo"<figure id='xboxX'>";
                echo"<img src='images/XboxX.jpg' alt='XboxX'>";
                echo"<figcaption>The XboxX</figcaption>";
            echo"</figure>";
        echo"</div>";

    echo"</div>";

echo"</body>";

echo"</html>";

