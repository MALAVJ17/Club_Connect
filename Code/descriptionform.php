<?php
if(isset($_GET['committee_ID'])) {
  // Retrieve the committee ID from the URL
  $committee_ID = $_GET['committee_ID'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Description</title>
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
    
    body {
      font-size: 70%;
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
      text-align:left;
    }
    
    .form-group {
      font-size: 8pt;
      margin-bottom: 15px;
      text-align:left;
      /* align-items: center; */
    }
    
    form.register legend {
      color: #9B2928;
      padding:2px;
      /* margin-left: 10px; */
      font-weight:bold;
      font-size: 14px;
      font-weight:100;
      margin-right: 600px ;
      margin-bottom: 5px;
      text-align:center;
    }
    
    form.register input {
      border: 1px solid #E1E1E1;
      margin-top: 5px;
       /* Increase padding for larger text boxes */
      width: 1200px; /* Adjust width for padding */
      box-sizing: border-box; /* Include padding in the width */
      margin-bottom: 10px; /* Add some bottom margin for spacing */
      height: 30px; /* Increase height here */
    }
/*     
    form.register input[type=radio] {
      /* margin-left: 7px; 
    } */
    
    form.register select {
      border: 1px solid #E1E1E1;
      width: 130px;
      margin-bottom:3px;
      color: #9B2928;
      margin-right:5px;
      text-align:left;
    }
    
    form.register select.date {
      width: 40px;
    }
    
    input:focus, select:focus {
      background-color: #efffe0;
    }
    
    div.agreement {
      margin-left:15px;
    }
    
    div.agreement label {
      text-align:left;
      margin-top:3px;
    }
    
    #registerButton {

      padding: 8px 10px 8px;
      color: #fff;
      text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
      cursor: pointer;
      font-size:18px;
      display: block;
      margin: 0 auto;
      text-align:center;
      margin-top: 20px; /* Add margin to the button */
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
/* Style inputs, select elements and textareas */
.input-row {
  display: flex;
  align-items: flex-start; /* Align items to the start */
  margin-bottom: 10px;
}

.input-row label {
  margin-left: 30px;
  margin-bottom: 14px;
   /* Adjust label width */
  padding-right: 0px; /* Add some space between label and input */
  text-align: left; /* Align label text to the right */
}

.input-row input[type="text"],
.input-row textarea {
  margin-right: 650px;
  width: 1200px; /* Adjust input width */
  padding: 8px; /* Adjusted padding */
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

 
 
 /* Style the label to display next to the inputs */
 label {
   padding: 12px 12px 12px 0;
   margin-right: 0cm;
   display: inline-block;
 }
 
 .sbtbtn{

  width: 60px;
  margin-left: 700px;
 }

 .sbt{
  background-color: #9B2928;
  color: white;
  border-radius: 12%;
  
 }
 
 /* Style the file input */
 input[type=file] {
   padding: 2px;
   border: 1px solid #ccc;
   border-radius: 4px;
   box-sizing: border-box;
   /* width: calc(70% - 20px); */
   /* height: 40px; Reduced height */
   margin-bottom: 10px;
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
  <form name="newUser" class="register" action="desc.php" method="post">
    <h1>Add Description</h1>
    <fieldset class="row1">
      <left><legend>Description Details</legend></left>
      <div class="form-group">
        
        <div class="row input-row">
          <label for="objective">Objective</label>
          <textarea id="objective" name="objective" placeholder="Write something.." style="height:200px"></textarea>
        </div>
        <div class="row input-row">
          <label for="about_us">About Us</label>
          <textarea id="about_us" name="about_us" placeholder="Write something.." style="height:200px"></textarea>
        </div>
        <div class="row input-row">
          <label for="more_desc">More...</label>
          <textarea id="more_desc" name="more_desc" placeholder="Write something.." style="height:200px"></textarea>
        </div>
        <div class="row input-row">
          <label for="logo">Upload Logo</label>
          <input type="file" id="logo" name="logo" accept="image/*">
        </div>
      </div>
      <input type="hidden" name="committee_ID" value="<?php echo isset($_GET['committee_ID']) ? $_GET['committee_ID'] : ''; ?>">

      <input type="hidden" name="redirect_url" value="committeepg copy.php?committee_ID=<?php echo $committee_ID?>">
      <div class="sbtbtn row input-row">
        <input class="sbt" type="submit"  value="Submit">
      </div>
    </fieldset>
  </form>
</div>

<footer class="bottomstrip">
    <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img src="Somaiya-white.svg" alt="somaiya"></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
    <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
</footer>

<!--script>
  function userRegistration(form) {
    // Validation logic
    if (!form.committee_ID.value || !form.objective.value || !form.about_us.value || !form.more_desc.value || !form.logo.value) {
      alert("Please fill in all fields.");
      return false;
    }
    // Additional validation logic can be added here
    
    return true; // Return true to submit the form
  }
</script-->
</body>
</html>
