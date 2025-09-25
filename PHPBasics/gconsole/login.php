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


    echo"<div class='form-container'>";
        echo"<form method='post' action='login.php'>";

            echo"<label for='username'>Username: </label>";
            echo"<br>";
            echo"<input type='text' name='username' placeholder='Username'>";
            echo"<br>";

            echo"<label for='password'>Password: </label>";
            echo"<br>";
            echo"<input type='password' name='password' placeholder='Password'>";
            echo"<br>";

            echo"<label for='submit'>submit: </label>";
            echo"<br>";
            echo"<input type='submit' name='submit' value='Login'>";
        echo"</form>";


        echo"<figure id='DreamCast'>";
        echo"<img src='images/Dreamcast.png' alt='Dreamcast'>";
        echo"</figure>";

        echo "<figure id='3DS'>";
        echo "<img src='images/3DS.png' alt='3DS'>";
        echo "</figure>";

    echo"</div>";

echo"</body>";

echo"</html>";


