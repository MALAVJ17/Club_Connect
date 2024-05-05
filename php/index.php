<?php
include "db_connection.php";

// $sql_committees = "SELECT committeeName FROM committees WHERE ";
$objective = "";
$mission = "";
$background_image = "";
$logo_position = "";
// Prepare SQL statement with a parameterized query to prevent SQL injection
$sql = "SELECT * FROM descriptions WHERE committee_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $committee_id);
$stmt->execute();
$result = $stmt->get_result();

if(mysqli_num_rows($result) === 1) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $objective = $row["objective"];
        $mission = $row["misson"];
        $background_image = base64_encode($row["background"]);
        $logo_image = base64_encode($row["logo"]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Club Connect</title>
    <style>
      body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
}

header {
    padding: 10px;
    width: 90%;
    border-radius: 10px;
    margin-left: 4%;
    text-decoration: none;
  }

.topheader{
  background-color: #9B2928;
    color: #fff;
}

.belowheader{
  background-color: #bbb;
  color: #fff;
  text-decoration: none;
}

.linkdeco{
  text-decoration: none;
  color: black;
}

nav ul {
    list-style-type: none;
}

nav li {
    display: inline;
    margin-right: 20px;
    font-size: 20px;
    
}

nav a {
    text-decoration: none;
    color: black;
} 

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

label {
    margin-top: 10px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    box-sizing: border-box;
}

button {
    background-color: #ab0303;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.slideshow-container {
    
  position: relative;
  margin: auto;
  text-align: center;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: relative;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
  

  .align{
    text-align: center;
    text-decoration: none;
    color: black;
  }

  .images{
    display: flex;
    /* justify-content: space-around; */
    justify-content: space-evenly;
    align-items: center;
  }
  
  .font{
    font-family: 'Roboto', sans-serif;
    font-size: 36px;
    text-align: center;
  }


  h3{
    text-align: center;
  }

   .exception{
    /* display: block;
    margin-left: auto;
    margin-right: auto;
    width: 15%; */
    width: 15%;
  } 

  #shadow{
    text-shadow: 2px 2px 2px black;
  }

  #shadoww{
   opacity: 0.8;
  }

  .top{
    text-align: center;
  }

  .topstrip{
    display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    background-color: transparent;
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
}

.border{
  width: 15%;
  border-radius: 10px;
  box-shadow: 2px 2px 2px black;
}

.megamenu{
  display: flex;
  justify-content: space-around;
  text-decoration: none;
  align-items: center;
  padding: 5px;
  color: black;
  font-weight: 10px;
}

/* video {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  z-index:-100;
  background-repeat: repeat-x;
} */

.background{
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  width: 100%;
  max-height: 120%;
  z-index: -100;
}

body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  /* background-color: #004d00; dark green background */
}

.carousel-container {
  width: 80%;
  margin: 20px auto;
  overflow: hidden;
  position: relative;
}

.carousel-inner {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.notice {
  flex: 0 0 25%; /* Adjusted width to fit four notices per line */
  margin: 0 10px;
  color: #fff;
  background-color: #9B2928; /* yellow notice card */
  padding: 20px;
  border-radius: 10px;
  /* border: 2px solid #003300; dark green border */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.carousel-controls {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 100%;
  display: flex;
  justify-content: space-between;
}

.carousel-btn {

  background-color: #fff;
  color: #000;
  border: none;
  border-radius: 50%;
  padding: 10px;
  cursor: pointer;
  font-size: 20px;
}

.carousel {
  width: 30vh;
  height: 30vh;
  position: relative;
}

.carousel > ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

.slide {
  position: absolute;
  inset: 0;
  opacity: 0;
  transition: 200ms opacity ease-in-out;
  transition-delay: 200ms;
}

.slide > img {
  display: block;
  width: 100%;
  /* height: 100%; */
  object-fit: cover;
  object-position: center;
}

.slide[data-active] {
  opacity: 1;
  z-index: 1;
  transition-delay: 0ms;
}

.carousel-button {
  position: absolute;
  z-index: 2;
  background: none;
  border: none;
  font-size: 2rem;
  top: 50%;
  transform: translateY(-10%);
  color: rgba(255, 255, 255, .5);
  cursor: pointer;
  border-radius: .25rem;
  padding: 0 .5rem;
  background-color: rgba(0, 0, 0, .1);
  display: flex;
  justify-content: space-around;
}

.carousel-button:hover,
.carousel-button:focus {
  color: white;
  background-color: rgba(0, 0, 0, .2);
}

.carousel-button:focus {
  outline: 1px solid black;
}

.carousel-button.prev {
  left: 0.1rem;
}

.carousel-button.next {
  right: 0.1rem;
}

/* Style the dropdown button */
.dropbtn {
  background-color:#f9f9f9;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown container (hidden by default) */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown content */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}


    </style>
</head>
<body>
  <img class="background" src="3433839.jpg" alt="backgrounds">
  <footer class="topstrip">
    <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img class="img1" src="Header transparent bg.png" alt="SOMAIYA Logo"></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
    <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
</footer>  
  <header class="topheader">
    <!-- <h1 class="top">KJ SOMAIYA INSTITUTE OF TECNOLOGY</h1>    -->
    <div>
        <h1 class="font">Club-Connect</h1>
    </div>
        <h3>Developed By Department Of <br> Computer Engineering</h3>
      </header>
      <header class="belowheader">
        <div class="megamenu">
          <div><a class="linkdeco" href="index.php">Home</a></div>
          <div><a class="linkdeco" href="about.html">About Us</a></div>
          <!-- <div><a class="linkdeco" href="#upcoming">Events</a></div> -->
          <div>
    <!--a class="linkdeco">Login</a-->
    <div class="dropdown">
        <a class="linkdeco">Login</a>
        <div class="dropdown-content">
            <a href="convenorloginpage.php">Convenor Login</a>
            <a href="superadminloginpage.php">Superadmin Login</a>
           
        </div>
    </div>
</div>
    </div> 
      </header>
      <div class="carousel-container">
      <?php
        // Step 2: Calculate the date for 30 days from the current date
    $currentDate = date('Y-m-d');
    $endDate = date('Y-m-d', strtotime('+30 days', strtotime($currentDate)));

    // Step 3: Write a SQL query to fetch events for the next 30 days
    $sql_notice = "SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date ";

    $result_notice = $conn->query($sql_notice);
    // Step 4: Iterate over the results and generate HTML for each event notice
    if ($result_notice->num_rows > 0) {
      echo '<div class="carousel-inner">';
      while($row = $result_notice->fetch_assoc()) {
          echo '<div class="notice">';
          echo '<h2>' . $row['eventName'] . '</h2>';
          echo '<p>' . date('d.m.Y', strtotime($row['event_date'])) . '</p>';
          echo '<p>'. $row['RpersonName']. ':  ' . $row['RpersonContact'] . '</p>';
          echo '</div>';
      }
      echo '</div>';
  } else {
      echo "No upcoming events found";
  }
      ?>
      
      <!--div class="carousel-container">
        <div class="carousel-inner">
            <div class="notice">
                <h2>Notice 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ultrices ligula nec massa efficitur, vel sollicitudin odio tincidunt.</p>
            </div>
            <div class="notice">
                <h2>Notice 2</h2>
                <p>Phasellus sed nibh eu felis cursus lacinia. Suspendisse fermentum, lorem a commodo fermentum, elit nisi tincidunt orci.</p>
            </div>
            <div class="notice">
                <h2>Notice 3</h2>
                <p>Quisque malesuada arcu in mauris facilisis, vitae scelerisque elit efficitur. Nulla facilisi. Nam sed viverra sapien.</p>
            </div>
            <div class="notice">
                <h2>Notice 4</h2>
                <p>Vivamus nec velit nec velit efficitur vulputate. Maecenas consequat elit nec justo dignissim, et rhoncus odio gravida.</p>
            </div>
            
        </div-->
        <div class="carousel-controls">
            <button class="carousel-btn" onclick="prevSlide()">&#10094;</button>
            <button class="carousel-btn" onclick="nextSlide()">&#10095;</button>
</div>
    </div>

    <div class="images">
    <div class="block"> 
    <a href="listcom.php" class="align"><h1 class="font" id="shadow">Committees</h1></a>
    <section aria-label="Newest Photos">
        <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev">&#10094;</button>
            <button class="carousel-button next" data-carousel-button="next">&#10095;</button>
                <ul data-slides>
                  
        <?php
        $sql_images = "SELECT logo FROM descriptions";

        $result_images = $conn->query($sql_images);
            
        if ($result_images->num_rows > 0) {
          while($row = $result_images->fetch_assoc()) {
            
              // Assuming image_data is stored as a blob in the database
              $imageData = base64_encode($row['logo']);        
              $src = 'data:image/jpeg;base64,'.$imageData;
              
              echo '<li class="slide" >';
              echo '<img src="' . $src . '" alt="Image">';
              echo '</li>';
             
              
          }
      } else {
          echo "No images found";
      }
     
        ?>
        <!--li class="slide" data-active>
          <img src="csi_kjsieit_student_s_chapter_logo.jpeg" alt="Nature Image #1">
        </li>
        <li class="slide">
          <img src="IEEE.jpeg" alt="Nature Image #2">
        </li>
        <li class="slide">
          <img src="ACS.jpg" alt="Nature Image #3">
        </li-->
      </ul>
    </div>
  </section>
  </div>
  <div class="block">
  <a href="listclub.html" class="align"><h1 class="font" id="shadow">Clubs</h1></a>
  <section aria-label="Newest Photos">
    <div class="carousel" data-carousel>
      <button class="carousel-button prev" data-carousel-button="prev">&#10094;</button>
      <button class="carousel-button next" data-carousel-button="next">&#10095;</button>
      <ul data-slides>
        <li class="slide" data-active>
          <img src="drama.jpg" alt="Nature Image #1">
        </li>
        <li class="slide">
          <img src="nli.jpeg" alt="Nature Image #2">
        </li>
        <li class="slide">
          <img src="spectrum.jpeg" alt="Nature Image #3">
        </li>
      </ul>
    </div>
  </section>
  </div>
  <div class="block">
  <a href="#Social Bodies" class="align"><h1 class="font" id="shadow">Social Bodies</h1></a>
  <section aria-label="Newest Photos">
    <div class="carousel" data-carousel>
      <button class="carousel-button prev" data-carousel-button="prev">&#10094;</button>
      <button class="carousel-button next" data-carousel-button="next">&#10095;</button>
      <ul data-slides>
        <li class="slide" data-active>
          <img src="nss.png" alt="Nature Image #1">
        </li>
        <li class="slide">
          <img src="nli.jpeg" alt="Nature Image #2">
        </li>
        <li class="slide">
          <img src="spectrum.jpeg" alt="Nature Image #3">
        </li>
      </ul>
    </div>
  </section>
    </div>
</div>
<br><br>
 
  
    <footer class="bottomstrip">
      <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img src="Somaiya-white.svg" alt="somaiya"></a></div>
      <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
      <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
      <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
      <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
    </footer>

    <script>
      let currentIndex = 0;
    const totalNotices = document.querySelectorAll(".notice").length;
    const carouselInner = document.querySelector(".carousel-inner");
    let intervalId;
/*
  function startAutoSlideshow() {
      intervalId = setInterval(nextSlide, 1400); // Change slide every 3 seconds (3000 milliseconds)
  }
  */
  function startAutoSlideshow() {
    intervalId = setInterval(() => {
        nextSlide();
        if (currentIndex === totalNotices - 1) {
            stopAutoSlideshow();
            currentIndex = 0; // Reset currentIndex to start from the beginning
            startAutoSlideshow();
        }
    }, 1400); // Change slide every 1.4 seconds (1400 milliseconds)
}


  function stopAutoSlideshow() {
      clearInterval(intervalId);
  }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalNotices) % totalNotices;
        updateCarousel();
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalNotices;
        updateCarousel();
    }

    function updateCarousel() {
        const offset = -currentIndex * document.querySelector(".notice").offsetWidth;
        carouselInner.style.transform = `translateX(${offset}px)`;
    }

    // Start auto slideshow when the page loads
  window.addEventListener("load", startAutoSlideshow);
    </script>

    <script>
      const buttons = document.querySelectorAll("[data-carousel-button]")

buttons.forEach(button => {
  button.addEventListener("click", () => {
    const offset = button.dataset.carouselButton === "next" ? 1 : -1
    const slides = button
      .closest("[data-carousel]")
      .querySelector("[data-slides]")

    const activeSlide = slides.querySelector("[data-active]")
    let newIndex = [...slides.children].indexOf(activeSlide) + offset
    if (newIndex < 0) newIndex = slides.children.length - 1
    if (newIndex >= slides.children.length) newIndex = 1

    slides.children[newIndex].dataset.active = true
    delete activeSlide.dataset.active
  })
})
    </script>
</body>
</html>
