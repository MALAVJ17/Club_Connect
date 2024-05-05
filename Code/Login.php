<?php 
session_start();
include "db_connection.php";

if(isset($_GET['committee_ID'])) {
    // Retrieve the committee ID from the URL
    $committee_id = $_GET['committee_ID'];}

if(isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}

$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

if(empty($uname)) {
    header ("Location: convenorloginpage.php?error=User Name is required");
    exit();
}
else if(empty($pass)) {
    header ("Location: convenorloginpage.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if($row['user_name'] === $uname && $row['password'] === $pass) {
        echo "LOGGED IN ";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: committeepg copy.php?committe_ID=?".urlencode($committee_id));
        exit();
    }
    else{
        header("Location: convenorloginpage.php?error=INCORRECT USERNAME/PASSWORD");
        exit();
    }
}

else { 
    header("Location: convenorloginpage.php");
    exit();
}