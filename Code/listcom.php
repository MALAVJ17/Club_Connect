<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername = "localhost";
$database_name = "committee";
$username = "root";
$password = "";

$link = mysqli_connect($servername, $username, $password,$database_name);
 
// Check connection
if(!$link){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//echo "Connected Successfully";

//$query = mysql_query("select * from descriptions", $link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Connect</title>
    <style>
/* Reset some default styles */
body, html {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f4;
}

header{
    background-color: #9B2928;
    color: white;
    text-align: center;
    padding: 1em;
}

/* Title and Navigation */
.sub-title {
    text-align: center;
    font-size: 30px;
    margin: 20px 0;
}

.committees {
    text-align: left;
    padding: 50px;
}

.committee {
    text-decoration: none;
    background-color: #9B2928; /* Red color */
    color: #fff; /* White text */
    width: 1200px; /* Adjust the width as needed */
    margin: 10px auto;
    padding: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Grey shadow background */
    font-size: 20px;
    border-radius: 10px; /* Add rounded corners */
}

.topstrip{
    display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    background-color: #fff;
    bottom: 0;
    width: 100%;
  }

  .img1{
    width: 300px;
    margin-left: -10px;
  }
  
  .img2{
    width: 60px;
    margin-left: 10px;
  }

  .logoinsta{
    width: 15px;
}
.logofb{
    width: 15px;
    margin-right: 10px;
    margin-left: 1050px;
}
.logotit{
    width: 15px;
    margin-right: 10px;;
}

ul{
    list-style-type: circle;
    
}

.bottomstrip{
  display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    background-color: #154a73;
    width: 100%;
    height: 80px;
    bottom: 0;
    position: fixed;
}
  .new{
    text-decoration: none;
  }
    </style>
</head>
<footer class="topstrip">
    <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img class="img1" src="Header transparent bg.png" alt="SOMAIYA Logo"></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
    <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
</footer>
<header>
    <h2 class="sub-title">List of Committees</h2>
</header>
<body>
    <div class="fullscreen-container">
        <div class="committees">
            <?php
            

            // Step 2: Retrieve the list of committees from the database
            $sql = "SELECT * FROM committees";
            $result = $link->query($sql);

            // Step 3: Loop through the retrieved data to display each committee
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    
                    //echo '<a class="new" href="committeepg.php?id=' . $row["committee_ID"] . '"><div class="committee">' . $row["committeeName"] . '</div></a>';
                    ?>
                    <a class="new" href="committeepg.php?committee_ID=<?php echo $row["committee_ID"]; ?>"><div class="committee"><?php echo $row["committeeName"]; ?></div></a>

                <?php
                }
            } else {
                echo "0 results";
            }

            $link->close();
            ?>
        </div>
    </div>
    <footer class="bottomstrip">
      <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img src="Somaiya-white.svg" alt="somaiya"></a></div>
      <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
      <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
      <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
      <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
    </footer>
</body>
</html>
