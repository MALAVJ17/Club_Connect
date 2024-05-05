<?php

if(isset($_GET['committee_ID'])) {
    // Retrieve the committee ID from the URL
    $committee_id = $_GET['committee_ID'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST["committee_ID"])) {
        $committee_ID = $_POST["committee_ID"];
    } else {
        echo "Committee ID is missing.";
        exit; // Exit the script if committee_ID is not provided
    }
    $eventName = $_POST["eventName"];
    $eventDescription = $_POST["eventDescription"];
    $eventDate = isset($_POST["eventDate"]) ? date("Y-m-d", strtotime($_POST["eventDate"])) : null;
    $RpersonName = $_POST["RpersonName"];
    $RpersonContact = $_POST["RpersonContact"];
    $RpersonEmail = $_POST["RpersonEmail"];
    $academicYear = $_POST["academicYear"];
    

    // Database connection parameters
    $servername = "localhost";
    $database_name = "committee";
    $username = "root";
    $password = "";

    // Create connection
    $link = mysqli_connect($servername, $username, $password, $database_name);

    // Check connection
    if (!$link) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
/*
    // Check if the record already exists based on eventId
    $sql_check = "SELECT * FROM events WHERE Event_ID = ?";
    if ($stmt_check = mysqli_prepare($link, $sql_check)) {
        mysqli_stmt_bind_param($stmt_check, "s", $eventId);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);
       
        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            // Update the existing record
            $sql_update = "UPDATE events SET eventName = ?, RpersonName = ?, RpersonContact = ?, RpersonEmail = ?, e_desc = ?,event_date=?, academicYear = ? committee_ID = ? WHERE Event_ID = ?";
            if ($stmt_update = mysqli_prepare($link, $sql_update)) {
                mysqli_stmt_bind_param($stmt_update, "ssssssssi", $eventName, $RpersonName, $RpersonContact, $RpersonEmail, $eventDescription,$eventDate, $academicYear, $committee_id);
                if (mysqli_stmt_execute($stmt_update)) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . mysqli_error($link);
                }
                mysqli_stmt_close($stmt_update);
            }
        } else {
            // Insert a new record
            $sql_insert = "INSERT INTO events (Event_ID, eventName, RpersonName, RpersonContact, RpersonEmail, e_desc,event_date, academicYear, committee_ID) VALUES ('', ?, ?, ?, ?, ?, ?, ?)";
            if ($stmt_insert = mysqli_prepare($link, $sql_insert)) {
                mysqli_stmt_bind_param($stmt_insert, "ssssssssi", $eventName, $RpersonName, $RpersonContact, $RpersonEmail, $eventDescription,$eventDate, $academicYear, $committee_id);
                if (mysqli_stmt_execute($stmt_insert)) {
                    echo "New record inserted successfully";
                } else {
                    echo "Error inserting record: " . mysqli_error($link);
                }
                mysqli_stmt_close($stmt_insert);
            }
        }
        mysqli_stmt_close($stmt_check);
    } else {
        echo "ERROR: Could not prepare query: $sql_check. " . mysqli_error($link);
    }
*/
// Check if the record already exists based on eventId
$sql_check = "SELECT * FROM events WHERE Event_ID = ?";
if ($stmt_check = mysqli_prepare($link, $sql_check)) {
    mysqli_stmt_bind_param($stmt_check, "s", $eventId);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);
    
    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        // Update the existing record
        $sql_update = "UPDATE events SET eventName = ?, RpersonName = ?, RpersonContact = ?, RpersonEmail = ?, e_desc = ?, event_date = ?, academicYear = ?, committee_ID = ? WHERE Event_ID = ?";
        if ($stmt_update = mysqli_prepare($link, $sql_update)) {
            mysqli_stmt_bind_param($stmt_update, "ssssssiii", $eventName, $RpersonName, $RpersonContact, $RpersonEmail, $eventDescription, $eventDate, $academicYear, $committee_ID, $eventId);
            if (mysqli_stmt_execute($stmt_update)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($link);
            }
            mysqli_stmt_close($stmt_update);
        }
    } else {
        // Insert a new record
        $sql_insert = "INSERT INTO events (eventName, RpersonName, RpersonContact, RpersonEmail, e_desc, event_date, academicYear, committee_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt_insert = mysqli_prepare($link, $sql_insert)) {
            mysqli_stmt_bind_param($stmt_insert, "ssssssii", $eventName, $RpersonName, $RpersonContact, $RpersonEmail, $eventDescription, $eventDate, $academicYear, $committee_ID);
            if (mysqli_stmt_execute($stmt_insert)) {
                echo "New record inserted successfully";
            } else {
                echo "Error inserting record: " . mysqli_error($link);
            }
            mysqli_stmt_close($stmt_insert);
        }
    }
    mysqli_stmt_close($stmt_check);
} else {
    echo "ERROR: Could not prepare query: $sql_check. " . mysqli_error($link);
}
    // Close connection
    mysqli_close($link);

    // Redirect to the desired page after form submission
    header("Location: events copy.php?committee_ID=". $committee_ID);
    exit; // Ensure
}

?>
