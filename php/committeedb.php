<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $committeeName = htmlspecialchars($_POST["committeeName"]);
    $convenerName = htmlspecialchars($_POST["convenerName"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $contactNo = htmlspecialchars($_POST["contactNo"]);
    $department = htmlspecialchars($_POST["department"]);
    $remarks = htmlspecialchars($_POST["remarks"]);

    // Include database connection
    include "db_connection.php";

    // Prepare SQL statement to insert into committees table
    $sql_committees = "INSERT INTO committees (committeeName, convenerName, email, contactNo, department, remarks) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Prepare and bind parameters for committees table
    $stmt_committees = $conn->prepare($sql_committees);
    $stmt_committees->bind_param("ssssss", $committeeName, $convenerName, $email, $contactNo, $department, $remarks);
    
    // Execute statement for committees table
    if ($stmt_committees->execute()) {
        // Fetch the committee ID
        $committee_ID_query = $conn->query("SELECT LAST_INSERT_ID()");
        $committee_ID_row = $committee_ID_query->fetch_assoc();
        $committee_ID = $committee_ID_row['LAST_INSERT_ID()'];

        // Prepare SQL statement to insert into users table
        $sql_users = "INSERT INTO users (committee_ID, email) VALUES (?, ?)";
        
        // Prepare and bind parameters for users table
        $stmt_users = $conn->prepare($sql_users);
        $stmt_users->bind_param("is", $committee_ID, $email);
        
        // Execute statement for users table
        if ($stmt_users->execute()) {
            // Close statements
            $stmt_committees->close();
            $stmt_users->close();
            
            // Close connection
            $conn->close();
            
            // Redirect upon successful insertion
            header("Location: addnew.php?registered=true");
            exit(); // Make sure no other output is sent
        } else {
            // Handle insertion error for users table
            echo "Error: " . $sql_users . "<br>" . $conn->error;
        }
    } else {
        // Handle insertion error for committees table
        echo "Error: " . $sql_committees . "<br>" . $conn->error;
    }
}
?>
