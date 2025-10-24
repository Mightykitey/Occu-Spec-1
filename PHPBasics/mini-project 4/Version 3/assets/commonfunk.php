<?php

function only_patients($conn, $email)
{
    try {
        $sql = "SELECT email FROM patients WHERE email = ?"; //set up the sql statement
        $stmt = $conn->prepare($sql);   //prepares
        $stmt->bindparam(1, $email);
        $stmt->execute();    //run the sql code

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return true;
        } else {
            return false;
        }

    } catch (PDOException $e) {//catch error
        // Log the error (crucial!)
        error_log("There an error in the user table: " . $e->getMessage());
        // Throw the exception
        throw $e;   // Re-throw the exception
    }
}


// Function to insert a new patient into the database
function new_patients($conn, $post)
{
    try {
        // Prepare an SQL statement with placeholders to insert new patient data
        $sql = "INSERT INTO patients (fname, lname, dob, email, pwd) VALUES (?,?,?,?,?)"; // Using a prepared statement for security
        $stmt = $conn->prepare($sql);  // Prepare the SQL statement to prevent SQL injection

        // Bind the form data to the prepared statement parameters
        $stmt->bindParam(1, $post['fname']); // Bind first name
        $stmt->bindParam(2, $post['lname']); // Bind last name
        $stmt->bindParam(3, $post['dob']);   // Bind date of birth
        $stmt->bindParam(4, $post['email']); // Bind email

        // Hash the password using SHA-256 before storing it
        $hpwd = password_hash($post['pwd'], PASSWORD_DEFAULT); // Secure the password by hashing
        $stmt->bindParam(5, $hpwd);           // Bind the hashed password, not the plain text

        // Execute the prepared statement to insert the data
        $stmt->execute();

        // Close the database connection after the operation (optional, but good practice)
        $conn = null;
        return true;
    } catch (PDOException $e) {
        // Log PDO-related errors (e.g., DB connection issues) without exposing details to the user
        error_log(' database error: ' . $e->getMessage());
        throw new Exception(' database error: ' . $e->getMessage());
    } catch (Exception $e) {
        // Catch any other general exceptions
        error_log(' error: ' . $e->getMessage());
        throw new Exception(' error: ' . $e->getMessage());
    }
}

function user_message()
{
    if (isset($_SESSION['usermessage'])) {
        $message = "<p>" . $_SESSION['usermessage'] . "</p>";
        unset($_SESSION['usermessage']);
        return $message;
    } else {
        return "";
    }
}

function login($conn, $post)
{
        $sql = "SELECT patient_id, pwd FROM patients WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $post);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;

        if ($result) {
            return $result;
        } else {
            return false;
        }

}




function audititor($conn, $patid, $code, $ldesc)
{
    $sql = "INSERT INTO audit (date, patient_id, code, longdesc) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $date = date("Y-m-d");
    $stmt->bindParam(1, $date);
    $stmt->bindParam(2, $patid);
    $stmt->bindParam(3, $code);
    $stmt->bindParam(4, $ldesc);

    $stmt->execute();
    $conn = null;
    return true;
}



function hasPassword($string)
{
    if (!str_contains($_SESSION['password'], "ERROR")) {
        $string = "USER MESSAGE: " . $_SESSION['password'];
        return true;
    } else {
        $string = "USER MESSAGE: " . $_SESSION['password'];
        return false;
    }
}

function commit_bookimg($conn, $epoch)
{
    $sql = "INSERT INTO booking (patient_id, staff_id, appdate, bookdon) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $_SESSION['patid']);
    $stmt->bindParam(2, $_POST['staff']);
    $stmt->bindParam(3, $epoch);
    $temp = time();
    $stmt->bindParam(4,$temp);

    $stmt->execute();
    $conn = null;
    return true;
}

function apt_getter($conn)
{
    $sql = "SELECT b.booking_id,b.appdate, b.bookdon, s.job, s.fname, s.lname, s.rom 
        FROM booking b JOIN staff s ON b.staff_id = s.staff_id WHERE b.patient_id = ? 
                                                               ORDER By b.appdate ASC";
// this get the rows from each table by giving them b. or s. which them we tell the b is for booking and s is for staff
    // and where we
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $_SESSION['patid']);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $conn = null;

    if($result){
        return $result;
    }else{
        return false;
    }

}

function cancel_apt($conn, $aptid) // this is where you are deleting an apportionment table
{
 $sql = "DELETE FROM booking WHERE booking_id = ?";
 $stmt = $conn->prepare($sql);
 $stmt->bindParam(1, $aptid);
 $stmt->execute();
 $conn = null;
 return true;
}

function apt_fetch($conn, $aptid)
{
    $SQL = "SELECT * FROM booking WHERE booking_id = ?";
    // GET ALL STAFF FROM DATABASE WHERE ROLE NOT EQUAL TO 'ADM'
    $stmt = $conn->prepare($SQL);

    $stmt->bindParam(1, $aptid);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}

function apt_update($conn, $aptid,$aptime)
{
    $sql = "UPDATE booking SET staff_id = ?, appdate = ?, bookdon = ? WHERE booking_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_POST['staff']);
    $stmt->bindParam(2, $aptime);
    $stmt->bindParam(3, $aptid);
    $stmt->execute();
    $conn = null;
    return true;
}

function pro_getter($conn)
{
    $sql = "SELECT p.patient_id, p.fname, p.lname, p.dob, p.email, p.pwd, a.code, a.date, a.longdesc
        FROM patients p JOIN audit a WHERE s.patient_id = ? 
                                                     ORDER By a.date ASC";
// this get the rows from each table by giving them b. or s. which them we tell the b is for booking and s is for staff
    // and where we
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $_SESSION['patid']);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $conn = null;

    if($result){
        return $result;
    }else{
        return false;
    }

}
