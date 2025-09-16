<?php
function usr_msg()
{


    if (isset($_SESSION["msg"])) { // checks for the session variable being set

        if(str_contains($_SESSION["msg"],"ERROR")) {
            $mg = "<div id='error'> USER MESSAGE" . $_SESSION["msg"] . "</div>";

        } else {
            $mg = "<div id='u'> USER MESSAGE" . $_SESSION["msg"] . "</div>";




        }




        $msg = 'USER MESSAGE: ' . $_SESSION["msg"]; // echos out the stored error from session
        $_SESSION["msg"] = '';
        unset($_SESSION["msg"]); //
        return $msg;
    } else {
        return "";
    }
}

