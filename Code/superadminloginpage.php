

<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <style>
        /* Bordered form */
body{
    /* margin: 250px; */
    position: relative;
}
form {
    border: 5px solid #0f0101;
    height: 520px;
    width: fit-content;
    border-radius: 10px;
    box-shadow: 2px 2px 2px 2px #808080;
  }
  
  /* Full-width inputs */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 15px;
    margin: 5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    
  }
  
  /* Set a style for all buttons */
  button {
    background-color: rgb(175, 27, 27);
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: 2px solid black;
    cursor: pointer;
    width: 100%;
  }
  
  /* Add a hover effect for buttons */
  button:hover {
    opacity: 0.8;
  }
  
  /* Extra style for the cancel button (red) */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f11000;
    color: black;
  }
  
  /* Center the avatar image inside this container */
  .imgcontainer {
    text-align: center;
    margin: 4px 0 2px 0;
  }
  
  /* Avatar image 
  img.avatar {
    width: 40%;
    border-radius: 50%;
  }
  */
  
  /* Add padding to containers */
  .container {
    margin: 5cm;
    margin-top: 6px;
    height: 100;
    width:500;
    margin-left: 60;
    margin-top: 80;
  }
  
  /* The "Forgot password" text */
  span.psw {
    float: right;
    padding-top: 16px;
  }
  
  .column1 {
    float: left;
    width: 30%;

  }

  .column2 {
    float: right;
    width: 30%;

  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }
    .cancelbtn {
      width: 100%;
    }
  }



  /* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  box-shadow: 2px 2px 2px 2px #808080;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
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

.center{
  text-align: center;
  margin-left: 14.5%;
}

.background{
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  width: 100%;
  min-height: 50px;
  z-index: -100;
}
</style>
<body>
<img class="background" src="3433839.jpg" alt="backgrounds">
<footer class="topstrip">
    <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img class="img1" src="somaiyalogo.png" alt="SOMAIYA Logo"></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
    <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
</footer>
<div class="center">
<form action="superadminlogin.php" method="post">
    <h2><center>SUPERADMIN LOGIN</center></h2>

    <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pass" required>

        <a style="text-decoration: none; color: black" href ="addnew.php"><button type="submit">Login</button></a>       
    </div>
</form>
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



