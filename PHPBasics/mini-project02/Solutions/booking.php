<?php
echo"<html>";
echo"<head>";
echo"<title>GibJohn Booking</title>";
echo"<link rel='stylesheet' href='css/style.css'>";
echo"</head>";
echo"<body>";

    echo"<img id='logo' src='images/logo.jpg'  alt='logo' >";
    echo"<br>";
    echo"<h1>PLease fill in the booking form</h1>";
        echo "<form method='post' action=''>";
        echo "<table>"; // Start the table

            echo "<tr><td>";
            echo "<label for='name'>Please enter your First name</label><br>";
            echo "<input type='text' name='name' id='name' placeholder='Name' required>";
            echo "</td></tr>";

            echo "<tr><td>";
            echo "<label for='lastname'>Please enter your Last name</label><br>";
            echo "<input type='text' name='lastname' id='lastname' placeholder='Last Name' required>";
            echo "</td></tr>";

            echo "<tr><td>";
            echo "<label for='mail'>Please enter your email</label><br>";
            echo "<input type='text' name='email' id='email' placeholder='Email'>";
            echo "</td></tr>";

            echo "<tr><td>";
            echo "<label for='phone'>Please enter your Phone Number</label><br>";
            echo "<input type='number' name='phone' id='phone' placeholder='Phone Number' required>";
            echo "</td></tr>";

            echo "<tr><td>";
            echo "<label for='class'>Please enter the course you want</label><br>";
            echo "<input type='text' name='class' id='class' placeholder='Class' required>";
            echo "</td></tr>";

        echo "</table>"; // End the table
    echo "</form>";

echo"<a href='index.php'>Return back</a>";
echo"</body>";
echo"</html>";

