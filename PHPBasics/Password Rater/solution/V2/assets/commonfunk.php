<?php
function usr_Pw()
{
    strlen($_SESSION["Pw"]) >= 8;

    if (isset($_SESSION["Pw"])) { // checks for the session variable being set



// = 'USER MESSAGE: ' . $_SESSION["msg"]; // echos out the stored error from session
    } else {
        return "";
    }
}

$_SESSION["Pw"] = '';
unset($_SESSION["Pw"]); //
return $Pw;