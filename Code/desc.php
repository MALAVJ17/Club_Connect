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


    
    $objective = $_POST["objective"];
    $about_us = $_POST["about_us"];
    $more_desc = $_POST["more_desc"];
    $logo = $_POST["logo"];

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
    $sql_check = "SELECT * FROM descriptions WHERE committee_ID = ?";
    if ($stmt_check = mysqli_prepare($link, $sql_check)) {
        mysqli_stmt_bind_param($stmt_check, "s", $committee_ID);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);
        
        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            // Update the existing row
            $sql_update = "UPDATE descriptions SET objective = ?, misson = ?, more = ?, logo= ? WHERE committee_ID = ?";
            if ($stmt_update = mysqli_prepare($link, $sql_update)) {
                mysqli_stmt_bind_param($stmt_update, "ssssi", $objective, $about_us, $more_desc, $logo, $committee_ID);
                if (mysqli_stmt_execute($stmt_update)) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . mysqli_error($link);
                }
                mysqli_stmt_close($stmt_update);
            }
        } else {
            // Insert a new row
            $sql_insert = "INSERT INTO descriptions (misson, objective, more, logo, committee_ID) VALUES (?, ?, ?, ?, ?)";
            if ($stmt_insert = mysqli_prepare($link, $sql_insert)) {
                mysqli_stmt_bind_param($stmt_insert, "ssssi", $objective, $about_us, $more_desc, $logo, $committee_ID);
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
    header("Location: committeepg copy.php?committee_ID=". urlencode($committee_ID));
    exit;
}
else {
    echo "Failed submission";
}
?>