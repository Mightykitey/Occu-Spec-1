<?php

session_start(); // Start the session for this page to allow session variables (like flash messages)

// Include required PHP files only once
require_once "assets/commonfunk.php"; // Common utility functions
require_once "assets/dabco.php";      // Database connection functions

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Call the function to add a new patient, passing DB connection and POST data
        Booking(dabco_insert(), $_POST); // Calls the "subroutine" to insert the patient
        $_SESSION['usermessage'] = "Success: apointment booked!"; // Set a success message in the session
    } catch (Exception $e) {
        // If any exception occurs, set the error message in the session
        $_SESSION['usermessage'] = $e->getMessage();
    }
}

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

// Content area with the registration form
echo "<div class='content'>";
echo "<form method='post' action=''>"; // Form posts back to the same page
echo "<br>";

// First Name field
echo "<label for='fname'>Name:  </label>";
echo "<input type='text' name='fname' value='Fist Name'>"; // NOTE: value should be empty or placeholder
echo "<br>";

// Last Name field
echo "<label for='lname'>Surname:  </label>";
echo "<input type='text' name='lname' value='last Name'>";
echo "<br>";

// Email field
echo "<label for='email'>Email:  </label>";
echo "<input type='text' name='email' value='Email'>";
echo "<br>";

//date field
echo "<label for='date'>What date do you want:  </label>";
echo "<input type='date' name='date' value='What date do you want?'>";
echo "<br>";

//booking field
echo "<label for='booking'>What are you booking for?  </label>";
echo "<input type='text' name='booking' value='What are you booking for?'>";
echo "<br>";

// Submit button is missing — should be added to make the form work

echo "</form>";
echo "</div>";

echo "</body>";
echo "</html>";
?>
