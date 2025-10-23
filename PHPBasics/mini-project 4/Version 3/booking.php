<?php

session_start(); // Start the session for this page to allow session variables (like flash messages)


// Include required PHP files only once
require_once "assets/commonfunk.php"; // Common utility functions
require_once "assets/dabco.php";      // Database connection functions

 if(!isset($_SESSION["patid"])){
    $_SESSION['usermessage'] = "Error: You are not logged in.";
    header("Location: login.php");
    exit;
}

// Check if the form was submitted using the POST method

// Output the HTML document
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


Echo user_message();


$apts = apt_getter(dabco_select());
if (!$apts){
    echo"no apts found";
}else{

    echo "<table id='booking'>";

    foreach($apts as $apt){
        if($apt['job']="doc"){
            $role = 'Doctor';
        }else if ($apt['role']="nur"){}
            $role = "Nurse";
    }
    echo "<tr>";
    echo "<td>Date:   ".date('M d, Y @ h:i A',$apt['appdate'])."</td>";
    echo "<td>Made on:    ".date('M d, Y @ h:i A',$apt['bookdon']) . "</td>";
    echo "<td>With:    ".$role. " ".$apt['fname']." ".$apt['lname']." ". "</td>";
    echo "<td>In: ".$apt['rom']."</td>";
    echo "</tr>";
}
echo "</table>";

echo "</div>";

echo "</body>";
echo "</html>";
?>
