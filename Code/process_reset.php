<?php
// Start the session to get user info, if applicable
session_start();

// Include the database connection file
require 'db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate form data
    if (empty($password) || empty($confirm_password)) {
        header("Location: reset_password.php?error=All fields are required");
        exit();
    }
    
    // Validate password strength
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        header("Location: reset_password.php?error=Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: reset_password.php?error=Passwords do not match");
        exit();
    }

    // Hash the new password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Get email from URL
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    } else {
        header("Location: reset_password.php?error=Email is required");
        exit();
    }

    // Update the password in the database
    $sql = "UPDATE users SET password = ? WHERE email = $email";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $hashed_password, $email);

        if ($stmt->execute()) {
            // Redirect to a success page
            header("Location: index.php?message=Password updated successfully");
        } else {
            // Redirect back with an error message
            header("Location: reset_password.php?error=Failed to update password");
        }

        $stmt->close();
    } else {
        // Redirect back with an error message
        header("Location: reset_password.php?error=Database error");
    }

    $conn->close();
} else {
    header("Location: reset_password.php");
    exit();
}
?>
