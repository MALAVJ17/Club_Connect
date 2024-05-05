<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $committeeName = $_POST["committeeName"];
    $convenerName = $_POST["convenerName"];
    $email = htmlspecialchars($_POST["email"]);
    $contactNo = htmlspecialchars($_POST["contactNo"]);
    $department = htmlspecialchars($_POST["department"]);
    $remarks = htmlspecialchars($_POST["remarks"]);

    // Now you can use these variables as needed.
    echo "Committee Name: " . $committeeName . "<br>";
    echo "Convener Name: " . $convenerName . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Contact No: " . $contactNo . "<br>";
    echo "Department: " . $department . "<br>";
    echo "Remarks: " . $remarks . "<br>";
}
/*
    try {
        // Include your database connection file.
        require "includes\db.inc.php";

        // Define the SQL query to insert data into the database.
        $query = "INSERT INTO committee (committeeName, convenerName, email, contactNo, department, remarks) VALUES (?, ?, ?, ?, ?, ?);";

        // Prepare the SQL statement.
        $stmt = $pdo->prepare($query);

        // Execute the query with the provided data.
        $stmt->execute([$committeeName, $convenerName, $email, $contactNo, $department, $remarks]);

        // Close database connection.
        $pdo = null;
        $stmt = null;

        // Redirect to a success page or the form page.
        header("Location: htmlform.html");
        die();
    } catch (PDOException $e) {
        // Handle any database errors here.
        die("Query failed: " . $e->getMessage());
    }
} else
{
    // Redirect to the form page if the request method is not POST.
    header("Location: htmlform.html");
    die();
}

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
/*
$link = mysqli_connect("localhost", "root", "", "committees");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Prepare an insert statement
$sql = "INSERT INTO committee (committeeName, convenerName, email, contactNo, department, remarks) VALUES (?, ?, ?, ?, ?, ?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sss", $committeeName, $convenerName, $email, $contactNo, $department, $remarks);
    
    // Set parameters
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $committeeName = $_POST["committeeName"];
        $convenerName = $_POST["convenerName"];
        $email = ($_POST["email"]);
        $contactNo = ($_POST["contactNo"]);
        $department =($_POST["department"]);
        $remarks = ($_POST["remarks"]);
    }
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
    }
} else{
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}
 
// Close statement
mysqli_stmt_close($stmt);
 
// Close connection
mysqli_close($link);
*/

?>