<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(!empty($_POST["committee_ID"])) {
        $committee_id = $_POST["committee_ID"];
    } else {
        echo "Committee ID is missing.";
        exit; // Exit the script if committee_ID is not provided
    }

    $member_name = $_POST["member_name"];
    $position = $_POST["position"];
    $photo = $_POST["photo"];
    $tenure_year = htmlspecialchars($_POST["tenure_year"]);
    $contact_no = htmlspecialchars($_POST["contact_no"]);
    
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "committee";

    // Create connection
    $link = mysqli_connect($servername, $username, $password, $database_name);

    // Check connection
    if (!$link) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Check if the record already exists based on member_name
    $sql_check = "SELECT * FROM members WHERE member_name = ?";
    if ($stmt_check = mysqli_prepare($link, $sql_check)) {
        mysqli_stmt_bind_param($stmt_check, "s", $member_name);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);
        
        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            // Update the existing record
            $sql_update = "UPDATE members SET position = ?, photo = ?, tenure_year = ?, contact_no = ?, committee_ID=? WHERE member_name = ?";
            if ($stmt_update = mysqli_prepare($link, $sql_update)) {
                mysqli_stmt_bind_param($stmt_update, "ssssss", $position, $photo, $tenure_year, $contact_no, $member_name, $committee_id);
                if (mysqli_stmt_execute($stmt_update)) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . mysqli_error($link);
                }
                mysqli_stmt_close($stmt_update);
            }
        } else {
            // Insert a new record
            $sql_insert = "INSERT INTO members (member_id, member_name, position, photo, tenure_year, contact_no, committee_ID) VALUES ('', ?, ?, ?, ?, ?, ?)";
            if ($stmt_insert = mysqli_prepare($link, $sql_insert)) {
                mysqli_stmt_bind_param($stmt_insert, "sssssi", $member_name, $position, $photo, $tenure_year, $contact_no, $committee_id);
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
    header("Location: members copy.php?committee_ID=". urlencode($committee_id));
    exit; // Ensure
}

?>
