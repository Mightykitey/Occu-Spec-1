<?php


echo "<!doctype html>";
echo "<html>";

echo "<head>";
echo "<title>Booking</title>"; // Page title
echo "<link href='css/styles.css' rel='stylesheet'>"; // Link to external CSS
echo"<img src='images/primary_oaks_surgery.jpg' alt='primary oaks surgery'>";
echo "</head>";

echo "<body>";

echo "<div id='main'>"; // Main container
echo "<h1>Primary Oaks Surgery</h1>"; // Page heading
require_once "assets/nav.php"; // Include navigation menu
echo "</div>";

// Content area with the registration form
echo "<div class='content'>";
echo "<form method='post' action=''>"; // Form posts back to the same page
echo "<br>";

$staff = get_staff(dabco_select());

echo"<input type='date' name='date' value='".date("Y-m-d")."'>";


echo"<input type='time' name='appt_time' step='600'>";

echo "<select name='staff'>";

foreach ($staff as $staf) {

    if($staf['job']="doc"){
        $role = "Doctor";
    } elseif ($staf['job']='nur'){
        $role = "Nurse";
    }
    echo "<option value=".$staf['docid'].">".$role." ".$staf['fname']." ".$staf['lname']."Room".$staf['room']"</option>";
}

echo "</select>";
