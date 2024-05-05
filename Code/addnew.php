<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
  header {
    background-color: #9B2928;
    color: white;
    text-align: center;
    padding: 1em;
    /* font-family: Verdana, Geneva, Tahoma, sans-serif; */
  }


  body{
    background-color: #eee;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    
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

.committee {
    background-color: #9B2928; /* Red color */
    color: #fff; /* White text */
    width: 1200px; /* Adjust the width as needed */
    margin: 10px auto;
    padding: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Grey shadow background */
    font-size: 20px;
    border-radius: 10px; /* Add rounded corners */
    text-align: center;
}

.new{
    text-decoration: none;
}

.notification {
  background-color: #ff0000; /* Red background color */
  color: white; /* White text color */
  text-align: center; /* Center-align text */
  padding: 15px; /* Add padding */
  margin-bottom: 20px; /* Add some bottom margin */
  border-radius: 5px; /* Add rounded corners */
  position: fixed; /* Fixed positioning */
  top: 20px; /* Position from the top */
  left: 50%; /* Center horizontally */
  transform: translateX(-50%); /* Center horizontally */
  width: 300px; /* Set width */
  z-index: 1000; /* Set higher z-index to appear above other elements */
}
</style>
  <title>Superadmin</title>
</head>
<?php
    // Check if registered query parameter is set
    if (isset($_GET["registered"]) && $_GET["registered"] === "true") {
        echo '<div id="notification" class="notification">Committee registered successfully!</div>';
    }
  ?>
  
  <script>
    // Auto-dismiss notification after 5 seconds
    setTimeout(function() {
        var notification = document.getElementById('notification');
        if (notification) {
            notification.style.display = 'none';
        }
    }, 2000); // Adjust time as needed (5000 milliseconds = 5 seconds)
  </script>
<body>
  <footer class="topstrip">
    <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img class="img1" src="somaiyalogo.png" alt="SOMAIYA Logo"></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
    <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
</footer>
<header>
		<h1>Welcome Admin</h1>
	  </header>	

    
        <div class="fullscreen-container">
            
            <div class="committees">
                <br><br><br>
                <a class="new" href="committeeform.html"><div class="committee">Add New Committee</div></a>
                <br><br><br><br>
                <a class="new" href="new club.html"><div class="committee">Add New Club</div></a>
                <br><br><br><br>
                <a class="new" href="Event form.html"><div class="committee">Add New Social Body</div></a>
            </div>
        </div>

        </body>

        <footer class="bottomstrip">
          <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img src="Somaiya-white.svg" alt="somaiya"></a></div>
          <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
          <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
          <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
          <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
        </footer>
</html>