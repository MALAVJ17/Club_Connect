<?php

if(isset($_GET['committee_ID'])) {
    // Retrieve the committee ID from the URL
    $committee_ID = $_GET['committee_ID'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if committee_ID is set and not empty
    if(!empty($_POST["committee_ID"])) {
        $committee_ID = $_POST["committee_ID"];
    } else {
        echo "Committee ID is missing.";
        exit; // Exit the script if committee_ID is not provided
    }

    $achievement_name = $_POST["name"];
    $achievement_desc = $_POST["desc"];
    $achievement_date = $_POST["date"];
    $achievement_photo = $_POST["photo"]; // Assuming this is a file upload, not a simple text input

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

    // Check if a row with the provided committee_ID already exists
    $sql_check = "SELECT * FROM achievements WHERE achievement_ID = ?";
    if ($stmt_check = mysqli_prepare($link, $sql_check)) {
        mysqli_stmt_bind_param($stmt_check, "s", $committee_ID);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);
        
        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            // Update the existing row
            $sql_update = "UPDATE achievements SET achievement_name = ?, achievement_desc = ?, achievements_date = ?, achievement_photo = ?, committee_ID= ? WHERE achievement_ID = ?";
            if ($stmt_update = mysqli_prepare($link, $sql_update)) {
                mysqli_stmt_bind_param($stmt_update, "sssss", $achievement_name, $achievement_desc, $achievement_date, $achievement_photo, $committee_ID);
                if (mysqli_stmt_execute($stmt_update)) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . mysqli_error($link);
                }
                mysqli_stmt_close($stmt_update);
            }
        } else {
            // Insert a new row
            $sql_insert = "INSERT INTO achievements (committee_ID, achievement_name, achievement_desc, achievements_date, achievement_photo) VALUES (?, ?, ?, ?, ?)";
            if ($stmt_insert = mysqli_prepare($link, $sql_insert)) {
                mysqli_stmt_bind_param($stmt_insert, "sssss", $committee_ID, $achievement_name, $achievement_desc, $achievement_date, $achievement_photo);
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
    header("Location: achievements copy.php?committee_ID=". $committee_ID);
    exit;
} else {
    echo "Failed submission";
}
?>
