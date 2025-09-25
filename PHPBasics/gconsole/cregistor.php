<?php

echo "<!doctype html>";
echo "<html>";

echo "<head>";
echo "<title>Consoles</title>";
echo "<link rel='stylesheet' href='css/styles.css'>";
echo "</head>";
echo "<body>";

echo "<div class='container'>";
echo "<h1>Consoles</h1>";
require_once 'assets/nav.php';
echo "<br>";
echo "</div>";
echo "<br>";

echo "<div class='form-container'>";
echo "<form method='post' action='login.php'>";

echo "<label for='manufacture'>Manufacture: </label>";
echo "<br>";
echo "<input type='text' name='manufacture' placeholder='manufacture'>";
echo "<br>";

echo "<label for='name'>Name: </label>";
echo "<br>";
echo "<input type='text' name='name' placeholder='Console name'>";
echo "<br>";

echo "<label for='date'>Release date: </label>";
echo "<br>";
echo "<input type='text' name='date' placeholder='Release date'>";
echo "<br>";

echo "<label for='bit'>How many bit does it have: </label>";
echo "<br>";
echo "<input type='bit' name='bit' placeholder='bit'>";
echo "<br>";

echo "<label for='submit'>submit: </label>";
echo "<br>";
echo "<input type='submit' name='submit' value='Login'>";

echo "</form>";
echo "</div>";

echo "</body>";

echo "</html>";



