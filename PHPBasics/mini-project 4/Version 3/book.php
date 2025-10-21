<?php

session_start();

require_once "assets/staff_com.php";
require_once "assets/dabco.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $stmp=$_POST['apt_date'].''.$_POST['apt_time'];
    $epoch=strtotime($stmp);

    echo $epoch;
    echo "<br>";
    echo time();
}

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
echo "<form>";
echo "<br>";

$staff = get_staff(dabco_select());

echo"<label for='apt_time'>Appointment Time: </label> ";
echo"<input type='time' name='apt_time' id='apt_time' required>";
echo "<br>";

echo"<label for='apt_date'>Appointment Date: </label>";
echo"<input type='date' name='apt_date' id='apt_date' required>";
echo "<br>";

echo "<select name='staff'>";

foreach ($staff as $staf) {

    if($staf['job']="doc"){
        $role = "Doctor";
    } elseif ($staf['job']='nur'){
        $role = "Nurse";
    }
    echo " <option value=".$staf['stafid'].">".$role." ".$staf['fname']." ".$staf['lname']."Room".$staf['room'];"</option>";
}
echo"</select>";
echo "<br>";

// First Name field
echo "<label for='fname'>Name:  </label>";
echo "<input type='text' name='fname' placeholder='Fist Name'>"; // NOTE: value should be empty or placeholder
echo "<br>";

// Last Name field
echo "<label for='lname'>Surname:  </label>";
echo "<input type='text' name='lname' placeholder='last Name'>";
echo "<br>";

// Email field
echo "<label for='email'>Email:  </label>";
echo "<input type='text' name='email' placeholder='Email'>";
echo "<br>";

//booking field
echo "<label for='booking'>What are you booking for?  </label>";
echo "<input type='text' name='booking' placeholder='What are you booking for?'>";
echo "<br>";

// Submit button is missing — should be added to make the form work
echo "<input type='submit' placeholder='Register'>";

echo "</form>";
echo "</div>";






echo "</select>";
