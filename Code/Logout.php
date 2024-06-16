<?php
// Start session
session_start();

// Destroy all session data
session_destroy();

// Redirect to login page or another page after logout
header("Location: convenorloginpage.php");
exit;
?>
