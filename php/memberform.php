

<!DOCTYPE html>
<html>
<head>

<title>Member</title>
<style>
  * {
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
  body{
    font-size:70%;
  }

  label {
    padding: 10px 0;
      font-weight: 500;
      font-size: 12pt;
      display: inline-block;
      width: 150px; /* Adjust label width as needed */
      text-align: right;
      margin-right: 10px; /* Add some margin between label and input */
    }
  h1 {
    height: 70px;
    border: 5px solid #9B2928;
    background-color: #9B2928;
    width: 100vw; 
    max-width: 95%;
    font-weight: 200;
    color: white;
    font-size: 20pt;
    text-align: center;
    padding: 18px;
    margin-left: 1.9%;
    border-radius: 10px;
  }

  form.register {
    margin: 20px auto 0px auto;
    background-color: #fff;
    padding: 20px;
    text-align: center;
  }

  .form-group {
    margin-bottom: 15px;
      text-align:left;
    }
    
  

  form.register legend {
    color: #9B2928;
    padding: 2px;
    margin-left: 10px;
    font-weight: bold;
    font-size: 20px;
    font-weight: 100;
    margin-bottom: 10px;
    text-align: center;
  }

  form.register input {
    border: 1px solid #E1E1E1;
      padding: 12px; /* Increase padding for larger text boxes */
      width: calc(100% - 180px); /* Adjust width for padding */
      box-sizing: border-box; /* Include padding in the width */
      margin-bottom: 10px; /* Add some bottom margin for spacing */
      height: 30px; /* Increase height here */
    }

  form.register input[type=radio] {
    margin-left: 7px;
  }

  form.register select {
    border: 1px solid #E1E1E1;
    width: 130px;
    margin-bottom: 3px;
    color: #9B2928;
    margin-right: 5px;
    text-align: center;
  }

  input:focus, select:focus {
    background-color: #efffe0;
  }

  div.agreement {
    margin-left: 15px;
  }

  div.agreement label {
    text-align: left;
    margin-top: 3px;
  }

  #registerButton {
    background: #9B2928;
    padding: 8px 10px;
    color: #fff;
    text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
    cursor: pointer;
    font-size: 18px;
    display: block;
    margin: 0 auto;
    text-align: center;
    border: none;
    border-radius: 5px;
  }

  #registerButton:hover {
    transform: scale(1.1); 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
  }

  #updatedProfile {
    display: none;
    margin: 20px auto 0;
    background-color: #fff;
    padding: 20px;
    border-radius: 20px;
  }

  #updatedProfile h2 {
    color: #abda0f;
    padding: 2px;
    margin-left: 10px;
    font-weight: bold;
    font-size: 14px;
    font-weight: 100;
    margin-bottom: 5px;
  }

  #updatedProfile h3 {
    color: #abda0f;
    padding: 2px;
    margin-left: 10px;
    font-weight: bold;
    font-size: 12px;
    font-weight: 100;
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
    <form name="newUser" class="register" action="memberdb.php" method="post">
      <h1>Member</h1>
      <fieldset class="row1">
        <legend>Member Details</legend>
        <div class="form-group">
          <label>Member Name</label>
          <input type="text" name="member_name" class="form-control">
        </div>
        <div class="form-group">
          <label>Committee Name</label>
          <input type="text" name="userCommitteename" class="form-control">
        </div>
      </fieldset>

      <fieldset class="row2">
        <legend>Personal Details</legend>
        <div class="form-group">
          <label>Member Position</label>
          <input type="text" name="position" class="form-control">
        </div>
        <div class="form-group">
          <label>Contact Number</label>
          <input type="tel" name="contact_no" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Tenure</label>
            <input type="text" name="tenure_year" class="form-control">
          </div>
       
        <div class="form-group">
          <label>Add profile photo</label>
          <input type="file" name="photo" class="form-control">
        </div>
        
      

      <div>
      <input type="hidden" name="committee_ID" value="<?php echo isset($_GET['committee_ID']) ? $_GET['committee_ID'] : ''; ?>">

        <button type="submit" id="registerButton">Submit &raquo;</button>
      </div>
    </form>
  </div>

  <div id="updatedProfile">
    <!-- Updated Profile -->
    <h2>User Information</h2>
    <div id="userEmail"></div>
    <div id="userName"></div>
    <div id="userPhone"></div>
    <div id="userAddress"></div>
    <div id="userGender"></div>
    <div id="userBirthday"></div>
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
    const fields = ['userMembername', 'userCommitteename', 'userFirst', 'userLast', 'userPhone', 'userEmail', 'userdepartment', 'userLast', 'userRemarks'];
    const isMissing = fields.some(field => !form[field].value.trim());
    if (isMissing) {
      alert('Missing Data');
      return;
    }

    const emailInput = form.userEmail.value;
    const isValidEmail = /^[a-z0-9._%-]+@[a-z0-9.-]+\.[a-z]{2,5}$/.test(emailInput);
    if (!isValidEmail) {
      alert('Please enter a validated email');
      form.userEmail.focus();
      return false;
    }

    const registeredUser = Object.fromEntries(fields.map(field => [field.replace('user', '').toLowerCase(), form[field].value.trim()]));
    displayUser(registeredUser);
  }

  function displayUser(registeredUser) {
    console.log(registeredUser);
    Object.entries(registeredUser).forEach(([key, value]) => document.getElementById(key === 'email' ? 'userEmail' : 'user' + key.charAt(0).toUpperCase() + key.slice(1)).innerText = `${key === 'email' ? 'Email' : 'Member ' + key.charAt(0).toUpperCase() + key.slice(1)}: ${value}`);
    document.getElementById('newUser').style.display = "none";
    document.getElementById('updatedProfile').style.display = "block";
  }

  document.getElementById('registerButton').addEventListener('click', () => userRegistration(document.newUser));
</script>
</body>
</html>

