<!DOCTYPE html>
<html>
    <head>
        <title> LOGIN </title>
        <!--link rel="stylesheet" type="text/css" href="style.css"-->
        <style>
                /* Bordered form */
body{
    margin: 250px;
    position: relative;
}
form {
    border: 5px solid #0f0101;
    height: fit-content;
    width: fit-content;
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
            </style>
    </head>
    <body>

    <!-- <footer class="topstrip">
    <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img class="img1" src="somaiyalogo.png" alt="SOMAIYA Logo"></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
    <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
</footer> -->
        <form action="process_signup.php" method ="post">
        <h2><center> LOGIN </center> </h2>
        <!--div class="imgcontainer">
              <img src="tlogo.jpg" alt="Avatar" class="avatar">
            </div-->
        <?php if(isset($GET ['error'])) { ?>
            <p class="error"> <?php echo  $_GET['error']; ?></p>
        <?php } ?>


        <div class="container">
        <label for="uname"><b>Enter registered email:</b></label>
              <input type="text" placeholder="Enter registered email" name="email" required>
              <label for="uname"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="uname" required>
          
              <label for="psw"><b>Set Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" required>

              <label for="psw"><b>Confirm Password</b></label>
              <input type="password" placeholder="Enter Password" name="confirm_password" required>
        <!--label> User Name </label>
        <input type="text" name="uname" placeholder="User Name" ><br>
        <label> Password </label>
        <input type="password" name="password" placeholder="Password" ><br-->

        <a style="text-decoration: none;" href="index.php"><button type="submit">Login</button></a>
        </div>
        </form>
    </body>
</html>


