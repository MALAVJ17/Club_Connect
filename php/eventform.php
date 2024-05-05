<?php
if(isset($_GET['committee_ID'])) {
    // Retrieve the committee ID from the URL
    $committee_id = $_GET['committee_ID'];
}
?>
<!DOCTYPE html>
<html>
<head>
  
  <title>Event Registration</title>
  <style>
    *{
      padding: 0;
      margin: 0;
      border: 0;
    }

    body, html {
      color: #9B2928;
      font-family: Verdana, Arial, Helvetica, sans-serif;
      height: 100%;
      background-color: #f0f0f0;
      margin: 10px;
    }

    body {
      font-size: 70%;
    }

    label {
      padding: 10px 0;
      font-weight: 500;
      font-size: 10pt;
      display: inline-block;
      width: 150px; /* Adjust label width as needed */
      text-align: right;
      margin-right: 10px; /* Add some margin between label and input */
    }

    h1 {
      height: 70px;
      border: 5px #9B2928;
      background-color: #9B2928;
      width: 100vw; 
      max-width: 95%;
      font-weight: 200;
      color: white;
      font-size: 20pt;
      text-align: center;
      padding: 18px;
      margin-left:1.9%;
      border-radius:10px;
    }

    form.register {
      margin: 20px auto 0px auto;
      background-color: #fff;
      padding: 20px;
      text-align:center;
    }

    .form-group {
      margin-bottom: 15px;
      text-align:left;
    }

    form.register legend {
      color: #9B2928;
      padding:2px;
      margin-left: 10px;
      font-weight:bold;
      font-size: 17px;
      font-weight:100;
      margin-bottom: 5px;
      text-align:center;
    }

    form.register input {
      border: 1px solid #E1E1E1;
      border: 1px solid #E1E1E1;
      padding: 12px; /* Increase padding for larger text boxes */
      width: calc(100% - 180px); /* Adjust width for padding */
      box-sizing: border-box; /* Include padding in the width */
      margin-bottom: 10px; /* Add some bottom margin for spacing */
      height: 30px; /* Increase height here */
    }

    input:focus, select:focus {
      background-color: #efffe0;
    }

    #registerButton {
      background: #9B2928;
      padding: 8px 10px 8px;
      color: #fff;
      text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
      cursor: pointer;
      float:center;
      font-size:18px;
      display: block;
      margin: 0 auto;
      text-align:center;
      margin-top:20px;
    }

    #registerButton:hover {
      transform: scale(1.1); 
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
    }

    #updatedProfile {
      display: none;
      margin: 20px auto 0px auto;
      background-color: #fff;
      padding: 20px;
      -moz-border-radius: 20px;
      -webkit-border-radius: 20px;
    }

    #updatedProfile h2 {
      color: #abda0f;
      padding:2px;
      margin-left: 10px;
      font-weight:bold;
      font-size: 14px;
      font-weight:100;
      margin-bottom: 5px;
    }

    #updatedProfile h3 {
      color: #abda0f;
      padding:2px;
      margin-left: 10px;
      font-weight:bold;
      font-size: 12px;
      font-weight:100;
      margin-bottom: 5px;
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

.bottomstrip{
  display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    background-color: #154a73;
    width: 100%;
    height: 80px;
}

  </style>
</head>
<body>
    <footer class="topstrip">
        <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img class="img1" src="somaiyalogo.png" alt="SOMAIYA Logo"></a></div>
        <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
        <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
        <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
        <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
    </footer>

<div class="container">
  <div id="newUser">
    <!-- New User Profile -->
    <form name="newUser" class="register" action="event.php" method="post">

      <h1>New Event Registration</h1>
      <fieldset class="row1">
        <left><legend>Event Details</legend></left>
        <!-- COMMITTEE DETAILS -->
        <div class="form-group">
          <label>Event Name</label>
          <input type="text" name="eventName" class="form-control">
        </div>
        <div class="form-group">
          <label>Resource Person Name</label>
          <input type="text" name="RpersonName" class="form-control">
        </div>
      

      
        <div class="form-group">
          <label>Resource Person Contact</label>
          <input type="text" name="RpersonContact" class="form-control">
        </div>
        <div class="form-group">
          <label>Resource Person Email</label>
          <input type="text" name="RpersonEmail" class="form-control">
        </div>
        <div class="form-group">
          <label>Event Description</label>
          <input type="text" name="eventDescription" class="form-control">
        </div>
        <div class="form-group">
          <label>Event Date</label>
          <input type="date" name="eventDate" class="form-control">
        </div>
        <div class="form-group">
            <label>Academic Year</label>
            <input type="text" name="academicYear" class="form-control">
          </div>
      </fieldset>

      <div>
      <input type="hidden" name="committee_ID" value="<?php echo isset($_GET['committee_ID']) ? $_GET['committee_ID'] : ''; ?>">
      <input type="hidden" name="redirect_url" value="events copy.php?committee_ID=<?php echo $committee_id?>">
        <button type="submit" id="registerButton">Register &raquo;</button>
      </div>
    </form>
  </div>
  <div id="updatedProfile">
    <!-- Updated Profile -->
    <h2>Thank you for registering!</h2>
  </div>
</div>
<footer class="bottomstrip">
    <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img src="Somaiya-white.svg" alt="somaiya"></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
    <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
</footer>


<script>
  function userRegistration(form) {
    // if any form field isn't filled don't go on
    if (!form.userFirst.value || !form.userLast.value || !form.userPhone.value || !form.userdepartment.value) {
      alert('Missing Data');
      return false;
    }
    return true;
  }

  document.getElementById('registerButton').addEventListener('click', function() {
    if (userRegistration(document.newUser)) {
      var clubName = document.newUser.userClubname.value;
      var convenerName = document.newUser.userConvenername.value;
      var userEmail = document.newUser.userFirst.value;
      var userPhone = document.newUser.userPhone.value;
      var userDepartment = document.newUser.userdepartment.value;
      var remarks = document.newUser.userLast.value;

      // You can do something with the collected data here, like sending it to a server or displaying it
      console.log("Club Name:", clubName);
      console.log("Convener Name:", convenerName);
      console.log("User Email:", userEmail);
      console.log("User Phone:", userPhone);
      console.log("User Department:", userDepartment);
      console.log("Remarks:", remarks);

      // Displaying updated profile
      document.getElementById('newUser').style.display = "none";
      document.getElementById('updatedProfile').style.display = "block";
    }
  });
</script>
</body>
</html>
