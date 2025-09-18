<?php

session_start();/*each page not file*/

require_once "asssets/commonfunk.php"; //require_once only happen once anywhere

if ($_SERVER["REQUEST_METHOD"] === 'POST') { // super global veurable
    // echo $_POST["message"];
    $_SESSION['msg'] = $_POST["message"];

}
echo "<div class='content'>";

echo usr_msg();

echo "<form method='post' action=''>";

