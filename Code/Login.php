<?php 
// session_start();
// include "db_connection.php";

// if(isset($_GET['committee_ID'])) {
//     // Retrieve the committee ID from the URL
//     $committee_id = $_GET['committee_ID'];}

// if(isset($_POST['uname']) && isset($_POST['password'])) {

//     function validate($data) {
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }

// }

// $uname = validate($_POST['uname']);
// $pass = validate($_POST['password']);

// if(empty($uname)) {
//     header ("Location: convenorloginpage.php?error=User Name is required");
//     exit();
// }
// else if(empty($pass)) {
//     header ("Location: convenorloginpage.php?error=Password is required");
//     exit();
// }

// $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

// $result = mysqli_query($conn,$sql);

// if(mysqli_num_rows($result) === 1) {
//     $row = mysqli_fetch_assoc($result);
//     if($row['user_name'] === $uname && $row['password'] === $pass) {
//         echo "LOGGED IN ";
//         $_SESSION['user_name'] = $row['user_name'];
//         $_SESSION['name'] = $row['name'];
//         $_SESSION['id'] = $row['id'];
//         header("Location: committeepg copy.php?committe_ID=?".urlencode($committee_id));
//         exit();
//     }
//     else{
//         header("Location: convenorloginpage.php?error=INCORRECT USERNAME/PASSWORD");
//         exit();
//     }
// }

// else { 
//     header("Location: convenorloginpage.php");
//     exit();
// }















?>




<?php
// session_start();
// include "db_connection.php";

// // Define timeout duration (in seconds)
// define('SESSION_TIMEOUT', 18);

// // Set the default timezone to India
// date_default_timezone_set('Asia/Kolkata');

// // Function to validate input
// function validate($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

// // Check if the user is already logged in
// if (isset($_SESSION['user_name'])) {
//     // Check if the session has timed out
//     if (isset($_SESSION['last_activity'])) {
//         $elapsed_time = time() - $_SESSION['last_activity'];
//         if ($elapsed_time > SESSION_TIMEOUT) {
//             // Last activity was more than SESSION_TIMEOUT seconds ago
//             session_unset();
//             session_destroy();
//             header("Location: convenorloginpage.php?error=Session timed out");
//             exit();
//         } else {
//             // Update last activity timestamp
//             $_SESSION['last_activity'] = time();
//         }
//     } else {
//         // If last_activity is not set, initialize it
//         $_SESSION['last_activity'] = time();
//     }
// }

// // Check if committee_ID is set
// if (isset($_GET['committee_ID'])) {
//     // Retrieve the committee ID from the URL
//     $committee_id = $_GET['committee_ID'];
// }

// // Handle login form submission
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['uname']) && isset($_POST['password'])) {

//     $uname = validate($_POST['uname']);
//     $pass = validate($_POST['password']);

//     if (empty($uname)) {
//         header("Location: convenorloginpage.php?error=User Name is required");
//         exit();
//     } elseif (empty($pass)) {
//         header("Location: convenorloginpage.php?error=Password is required");
//         exit();
//     }

//     // Use prepared statements to prevent SQL injection
//     $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ? AND password = ?");
//     $stmt->bind_param("ss", $uname, $pass);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows === 1) {
//         $row = $result->fetch_assoc();
//         $_SESSION['user_name'] = $row['user_name'];
//         $_SESSION['name'] = $row['name'];
//         $_SESSION['id'] = $row['id'];
//         $_SESSION['last_activity'] = time(); // Set the time of the last activity
//         header("Location: committeepg copy.php?committee_ID=" . urlencode($committee_id));
//         exit();
//     } else {
//         header("Location: convenorloginpage.php?error=Incorrect username or password");
//         exit();
//     }

//     $stmt->close();
// } else {
//     // Redirect to login page if not logged in
//     if (!isset($_SESSION['user_name'])) {
//         header("Location: convenorloginpage.php");
//         exit();
//     }
// }
?>

<?php
session_start();
include "db_connection.php";

// Define SESSION_TIMEOUT if it is not already defined
// if (!defined('SESSION_TIMEOUT')) {
//     define('SESSION_TIMEOUT', 10); // Example: 1800 seconds = 30 minutes
// }


// // Set the default timezone to India
// date_default_timezone_set('Asia/Kolkata');

// Function to clean input
function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// if (isset($_SESSION['user_name'])) {
//     if (isset($_SESSION['last_activity'])) {
//         $elapsed_time = time() - $_SESSION['last_activity'];
//         if ($elapsed_time > SESSION_TIMEOUT) {
//             // Session timed out
//             session_unset();
//             session_destroy();
//             header("Location: convenorloginpage.php?error=Session timed out");
//             exit();
//         } else {
//             // Update last activity time
//             $_SESSION['last_activity'] = time();
//         }
//     } else {
//         // Initialize last activity time
//         $_SESSION['last_activity'] = time();
//     }
// }

// Check if committee_ID is set in the URL
$committee_id = isset($_GET['committee_ID']) ? cleanInput($_GET['committee_ID']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uname = cleanInput($_POST['uname']);
    $pass = cleanInput($_POST['password']);

    if (empty($uname)) {
        header("Location: convenorloginpage.php?error=User Name is required");
        exit();
    } elseif (empty($pass)) {
        header("Location: convenorloginpage.php?error=Password is required");
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ? AND password = ?");
    $stmt->bind_param("ss", $uname, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['last_activity'] = time();

        // Fetch committee_ID
        $committee_ID = $row['committee_ID'];

        header("Location: committeepg copy.php?committee_ID=" . urlencode($committee_ID));
        exit();
    } else {
        header("Location: convenorloginpage.php?error=Incorrect username or password");
        exit();
    }

    $stmt->close();
} else {
    if (!isset($_SESSION['user_name'])) {
        header("Location: convenorloginpage.php");
        exit();
    }
}

$conn->close();
?>




