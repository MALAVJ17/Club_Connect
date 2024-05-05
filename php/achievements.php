<?php
include "db_connection.php";

if(isset($_GET['committee_ID'])) {
    // Retrieve the committee ID from the URL
    $committee_id = $_GET['committee_ID'];

    // Prepare SQL statement to retrieve data for the specific committee ID
    $sql_committees = "SELECT * FROM committees WHERE committee_ID = ?";
    
    // Prepare and bind parameter to the query
    $stmt = mysqli_prepare($conn, $sql_committees);
    mysqli_stmt_bind_param($stmt, "i", $committee_id);
    mysqli_stmt_execute($stmt);
    
    $result_committees = mysqli_stmt_get_result($stmt);

    // Fetch the committee name
    $committee_name = "";
    if (mysqli_num_rows($result_committees) === 1) {
        $row = mysqli_fetch_assoc($result_committees);
        $committee_name = $row["committeeName"];
    } else {
        echo "No committee found for ID: " . $committee_id;
    }

     // Fetch descriptions, background image, and logo position
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

     $sql_achievements = "SELECT * FROM achievements WHERE committee_ID = ?";
    $stmt_achievements = mysqli_prepare($conn, $sql_achievements);
    mysqli_stmt_bind_param($stmt_achievements, "i", $committee_id);
    mysqli_stmt_execute($stmt_achievements);
    $result_achievements = mysqli_stmt_get_result($stmt_achievements);

    $committee_achievements = [];
    while ($row = mysqli_fetch_assoc($result_achievements)) {
        $committee_achievements[] = $row;
    }

    mysqli_stmt_close($stmt_achievements);
   // mysqli_stmt_close($stmt_desc);
} else {
    echo "Committee ID not specified.";
}

mysqli_close($conn);
?>







<!DOCTYPE html>
<head>
    <title>Achievements</title>
    <style>
        /* -
-*-~*~-*-*-~*~-*-*-~*~* |
●▬▬▬▬▬▬▬๑۩۩๑▬▬▬▬▬▬▬●
Made by ~
Areal Alien ❥ 雷克斯
●▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬●
──────▄▀▄─────▄▀▄
─────▄█░░▀▀▀▀▀░░█▄
─▄▄──█░░░░░░░░░░░█──▄▄
█▄▄█─█░░▀░░┬░░▀░░█─█▄▄█
-*-~*~-*-*-~*~-*-*-~*~* |
- */
:root {
    /* Primary Colors */
    --bc: #0c0c0d;
    --bc-gray: #0d0e10;
    --bc-purple: #1e2731;
    --bc-purple-darker: #181c23;
    --bc-nav-foot: #101317;
    --section: #0e0e10;
    --primary: #94c2e3;
    --secondary: #4888b5;
    /* Colors */
    --white: #ffffff;
    --black: #000000;
    --dark-blue: #1f2029;
    --extra-dark-blue: #13141a;
    --red: #da2c4d;
    --orange: #fd7e14;
    --yellow: #f8ab37;
    --warning: #ffc107;
    --green: #28a745;
    --light-green: #24e33a;
    --teal: #20c997;
    --cyan: #17a2b8;
    --blue: #007bff;
    --indigo: #6610f2;
    --purple: #6f42c1;
    --pink: #e83e8c;
    --light-gray: #ebecf2;
    --bright-gray: #d9d5de;
    --gray: #6c757d;
    --gray-extra-dark: #343a40;
    --dark: #343a40;
    /* Minecraft Colors */
    --m-darkred: #aa0000;
    --m-red: #ff5555;
    --m-gold: #ffaa00;
    --m-yellow: #ffff55;
    --m-green: #55ff55;
    --m-darkgreen: #00aa00;
    --m-darkaqua: #00aaaa;
    --m-aqua: #55ffff;
    --m-blue: #94c2e3;
    --m-darkblue: #0000aa;
    --m-purple: #aa00aa;
    --m-pink: #ff55ff;
    --m-gray: #aaaaaa;
    --m-darkgray: #555555;
    /* Gradients */
    --gradient: linear-gradient(45deg, rgba(148,194,227,1) 0%, rgba(72,136,181,1) 100%);
    --gradient2: linear-gradient(45deg, rgba(148,194,227,1) 0%, rgba(72,136,181,1) 100%);
    /* Sizes */
    --heading: 3.4rem;
    --heading-medium: 2rem;
    --paragraph: 1.1rem;
    --button-large: 1.6rem;
    --button-small: 1.2rem;
    --button-smallest: 1rem;
    /* Fonts */
    --font-main: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    --font-secondary: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
    --font-slim: "Roboto";
  }
  * {
    box-sizing: border-box;
  }
  html, body {
    margin: 0;
    width: 100%;
    min-height: 100vh;
    overflow-x: hidden;
    font-family: var(--font-main);
    scroll-behavior: smooth;
    -webkit-font-smoothing: antialiased;
    background-color: var(--bright-gray);
    transition: background-color .2s ease-in-out;
  }
  main {
    min-height: 100vh;
  }
  footer {
    background-color: var(--bc);
  }
  /* Classes */
  /* ScrollTop */
  .back-to-top {
    position: fixed;
    right: 30px;
    bottom: 30px;
    display: none;
    z-index: 98;
  }
  .back-to-top a svg {
    fill: var(--bc-purple);
  }
  .back-to-top a {
    display: block;
    padding: 10px;
    cursor: pointer;
    opacity: 0;
    transition: all .35s ease-in-out;
  }
  .back-to-top a:hover {
    transform: scale(1.1, 1.1);
  }
  /* Space */
  .space {
    min-height: 15vh;
  }
  .large-space {
    min-height: 35vh;
  }
  /* Global Classes */
  .flexbox {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .flexbox-col {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }
  /* Normal classes */
  /* Navbar */
  #navbar {
    top: 0;
    width: 100%;
    height: 4.5em;
    background-color: var(--m-darkred);
    display: grid;
    grid-template-columns: 1fr 30% 35% 1fr;
    position: relative;
    z-index: 500;
  }
  .nav-left-space {
    grid-column: 1;
  }
  .nav-right-space {
    grid-column: 4;
  }
  .nav-left {
    height: 100%;
    grid-column: 2;
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }
  .nav-right {
    height: 100%;
    grid-column: 3;
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }
  /* Nav Button */
  .nav-button {
      margin: 0;
      width: 2em;
      height: 1.5em;
      position: relative;
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
      -webkit-transition: .35s cubic-bezier(.175,.685,.32,1.175);
      -moz-transition: .35s cubic-bezier(.175,.685,.32,1.175);
      -o-transition: .35s cubic-bezier(.175,.685,.32,1.175);
      transition: .35s cubic-bezier(.175,.685,.32,1.175);
      cursor: pointer;
      z-index: 110;
  }
  .nav-button span {
      display: block;
      position: absolute;
      height: 2px;
      width: 100%;
      background: var(--white);
      border-radius: 19px;
      opacity: 1;
      left: 0;
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
      -webkit-transition: .35s cubic-bezier(.175,.685,.32,1.175);
      -moz-transition: .35s cubic-bezier(.175,.685,.32,1.175);
      -o-transition: .35s cubic-bezier(.175,.685,.32,1.175);
      transition: .35s cubic-bezier(.175,.685,.32,1.175);
  }
  .nav-button span:nth-child(1) {
      top: 0;
  }
  .nav-button span:nth-child(2),.nav-button span:nth-child(3) {
      top: 0.75em;
  }
  .nav-button span:nth-child(4) {
      top: 1.5em;
  }
  .nav-button.open span:nth-child(1) {
      top: 2em;
      width: 0;
  }
  .nav-button.open span:nth-child(2) {
      width: 100%;
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      -o-transform: rotate(45deg);
      transform: rotate(45deg);
  }
  .nav-button.open span:nth-child(3) {
      width: 100%;
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      transform: rotate(-45deg);
  }
  .nav-button.open span:nth-child(4) {
      top: 18px;
      width: 0;
      left: 50%;
  }
  /* Navbar Items */
  #navbar-items {
    padding: 0;
    list-style-type: none;
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }
  .navbar-items {
    padding: 0;
    margin: .5em 0 2em 0;
    list-style-type: none;
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }
  .no-desk {
    display: none;
  }
  .navbar-item {
    margin: 0 .75em;
    line-height: 0;
    color: var(--white);
    font-size: 1.22rem;
    font-weight: 300;
    cursor: pointer;
  }
  .nb-item-last {
    margin: 0 0 0 1em;
  }
  .navbar-item-inner {
    margin: 0;
    text-decoration: none;
    color: var(--white);
    transition: color .3s;
  }
  .navbar-item-inner:hover {
    color: var(--primary);
  }
  .navbar-item-inner-red {
    margin: 0;
    position: relative;
    text-decoration: none;
    color: var(--white);
    transition: color .3s;
  }
  .navbar-item-inner-red:hover {
    color: var(--red);
  }
  .navbar-item-inner-red::before {
    content: 'We are working on this page';
    color: var(--red);
    padding: 1em;
    display: none;
    position: fixed;
    left: -100%;
    top: 50px;
    width: 300%;
    opacity: 0;
    transition: opacity .2s ease-in-out;
  }
  .navbar-item-inner-red:hover::before {
    display: inline-block;
    opacity: 1;
  }
  .navbar-item-inner-red::after {
    border-bottom: 2px solid var(--red);
    content: '';
    display: block;
    position: relative;
    left: 0;
    top: -10px;
    transition: width .3s;
    width: 0;
  }
  .navbar-item-inner-red:hover::after {
    width: 102%;
  }
  .navbar-item-inner::after {
    border-bottom: 2px solid var(--primary);
    content: '';
    display: block;
    position: relative;
    left: 0;
    top: 6px;
    transition: width .3s;
    width: 0;
  }
  .navbar-item-inner:hover::after {
    width: 102%;
  }
  .navbar-item-inner-active {
    margin: 0;
    text-decoration: none;
    color: var(--white);
  }
  .navbar-item-inner-active::after {
    border-bottom: 2px solid var(--primary);
    content: '';
    display: block;
    position: relative;
    left: 0;
    top: 14px;
    transition: width .3s;
    width: 100%;
  }
  /* Menu */
  #menu {
    top: 4.5em;
    width: 100%;
    background-color: var(--bc);
    display: none;
    grid-template-columns: 1fr 21.66% 21.66% 21.66% 1fr;
    position: fixed;
    overflow: hidden;
    z-index: 450;
  }
  .menu-left-space {
    display: inline-block;
    grid-column: 1;
  }
  .menu-right-space {
    display: inline-block;
    grid-column: 5;
  }
  .menu-left {
    display: inline-block;
    grid-column: 2;
    color: var(--white);
  }
  .menu-left h3 {
    margin: 0 .75em .5em .75em;
  }
  .menu-center {
    display: inline-block;
    grid-column: 3;
    color: var(--white);
  }
  .menu-center h3 {
    margin: 0 .75em .5em .75em;
  }
  .menu-right {
    display: inline-block;
    grid-column: 4;
    color: var(--white);
  }
  .menu-right h3 {
    margin: 0 .75em .5em .75em;
  }
  /* Menu Items */
  .menu-items {
    margin: 0 .75em;
    padding: 0 0 2em 0;
    list-style-type: none;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-direction: column;
  }
  .menu-item {
    margin: .45em 0;
    line-height: 0;
    color: var(--white);
    font-size: 1.22rem;
    font-weight: 300;
    cursor: pointer;
  }
  .menu-item-inner {
    margin: 0;
    text-decoration: none;
    color: var(--white);
    transition: color .3s;
  }
  .menu-item-inner:hover {
    color: var(--primary);
  }
  .menu-item-inner::after {
    border-bottom: 2px solid var(--primary);
    content: '';
    display: block;
    position: relative;
    left: 0;
    top: 6px;
    transition: width .3s;
    width: 0;
  }
  .menu-item-inner:hover::after {
    width: 102%;
  }
  .menu-item-inner-active {
    margin: 0;
    text-decoration: none;
    color: var(--white);
  }
  .menu-item-inner-active::after {
    border-bottom: 2px solid var(--primary);
    content: '';
    display: block;
    position: relative;
    left: 0;
    top: 14px;
    transition: width .3s;
    width: 100%;
  }
  /* User Profile */
  .user-header-wrapper {
    width: 100%;
    position: relative;
  }
  .user-icon-wrapper {
    width: 100%;
    position: relative;
    z-index: 12;
  }
  .user-icon {
    width: 100%;
    display: block;
    border-radius: 50%;
    border: .5em solid var(--bc);
    background-color: var(--m-darkred);
    z-index: 12;
  }
  .user-header-inner {
    z-index: 5;
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
  }
  .user-header-overlay {
    width: 100%;
    height: 100%;
    position: absolute;
    background-color: rgba(0, 0, 0, .15);
    z-index: 6;
  }
  .user-header {
    width: 100%;
    height: 100%;
  }
  .username-wrapper {
    width: 100%;
    position: relative;
  }
  .username-dev {
    margin: 0;
    display: inline-block;
    color: var(--white);
    font-size: 2em;
    cursor: default;
  }
  .uname-verified {
    margin: 0 0 0 .25em;
    width: 25px;
    cursor: default;
  }
  .verified {
    width: 100%;
    color: var(--black);
    background-color: var(--white);
    font-family: var(--font-slim);
    text-transform: uppercase;
    letter-spacing: .05em;
    font-weight: 900;
    text-align: center;
    border-radius: 5px;
    font-size: 1em;
    padding: .25em;
    position: absolute;
    pointer-events: none;
    top: 150%;
    left: 0;
    opacity: 0;
    transition: all .5s cubic-bezier(.175,.885,.32,1.275);
  }
  .verified::before {
    content: "";
    display: block;
    width: 0;
    height: 0;
    transform: rotateZ(-90deg);
    border-top: 12px solid transparent;
    border-bottom: 12px solid transparent;
    border-left: 12px solid var(--white);
    position: absolute;
    top: -15px;
    left: 50%;
  }
  .user-info-bar {
    width: 100%;
    display: grid;
    padding: .75em 0 1em 0;
    background-color: var(--m-darkred);
    grid-template-columns: 1fr 10% 35% 20% 1fr;
    grid-template-rows: auto;
    grid-template-areas:
            ".ufo-bar-col1 .ufo-bar-col2 .ufo-bar-col3 .ufo-bar-col4 .ufo-bar-col5";
  }
  .ufo-bar-col2-inner {
    display: flex;
    position: relative;
    justify-content: center;
    align-items: center;
  }
  .ufo-bar-col3-inner {
    display: flex;
    padding: .5em 0;
    position: relative;
    justify-content: flex-start;
    align-items: center;
  }
  .username-wrapper-outer {
    display: flex;
    margin: 0 0 0 1.5em;
    justify-content: center;
    flex-direction: column;
    align-items: flex-start;
  }
  .ufo-bar-bio {
    color: var(--gray);
  }
  .ufo-bar-col3-inner {
    width: 100%;
    height: 100%;
  }
  .ufo-bar-fff {
    margin: .25em .5em 0 0;
    color: var(--dark);
    display: inline-block;
    text-decoration: none;
    cursor: pointer;
  }
  .ufo-bar-fff span {
    color: var(--dark);
    font-weight: 600;
  }
  .ufo-bar-fff-active {
    margin: .25em .5em;
    color: var(--primary);
    display: inline-block;
    text-decoration: none;
    cursor: pointer;
  }
  .ufo-bar-fff-active span {
    font-weight: 600;
  }
  .ufo-bar-col4-inner {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: flex-end;
    align-items: center;
  }
  /*.ufo-bar-col5 {
  }*/
  .user-info-bar2 {
    width: 100%;
    display: grid;
    color: var(--white);
    background-color: var(--m-darkred);
    grid-template-columns: 1fr 16.25% 16.25% 16.25% 16.25% 1fr;
    grid-template-rows: auto;
    grid-template-areas:
            ".ufo-bar2-col1 .ufo-bar2-col2 .ufo-bar2-col3 .ufo-bar2-col4 .ufo-bar2-col6 .ufo-bar2-col7";
  }
  .ufo-bar2-block-active {
    position: relative;
    cursor: default;
  }
  .ufo-bar2-block {
    border-bottom: 3px solid var(--bc);
    cursor: pointer;
  }
  .ufo-bar2-block span {
    margin: 0 .3em;
    color: var(--dark);
  }
  .ufo-bar2-block h3 {
    color: var(--white);
    font-weight: 500;
  }
  .ufo-bar2-block:after {
    content:"";
    background: var(--white);
    background-size: 700%;
    display: block;
    height: 3px;
    width: 100%;
    bottom: 0;
  }
  .ufo-bar2-col2-inner {
    width: 100%;
  }
  .ufo-bar2-col3-inner {
    width: 100%;
  }
  .ufo-bar2-col4-inner {
    width: 100%;
  }
  .ufo-bar2-col5-inner {
    width: 100%;
  }
  .ufo-bar2-col6-inner {
    width: 100%;
  }
  /* Button 2 */
  .button2, .btn-secondary2 {
    margin: 0 .4em;
    position: relative;
    cursor: pointer;
    padding: .9em 1em;
    letter-spacing: .1em;
    text-align: center;
    font-weight: 300;
    color: var(--bc);
    font-size: var(--button-small);
    background: var(--gradient2);
    background-size: 1100%;
    border-radius: 50px;
    border: none;
    transform: scaleX(1);
    transition: background-position 3s cubic-bezier(.455,.03,.515,.955),-webkit-transform .3s cubic-bezier(.175,.885,.32,1.275);
    transition: transform .3s cubic-bezier(.175,.885,.32,1.275),background-position 3s cubic-bezier(.455,.03,.515,.955);
    transition: transform .3s cubic-bezier(.175,.885,.32,1.275),background-position 3s cubic-bezier(.455,.03,.515,.955),-webkit-transform .3s cubic-bezier(.175,.885,.32,1.275);
  }
  .button2 {
    transition: bottom .3s cubic-bezier(.175,.885,.32,1.275),background-position 3s cubic-bezier(.455,.03,.515,.955),-webkit-transform .3s cubic-bezier(.175,.885,.32,1.275);
    transition: transform .3s cubic-bezier(.175,.885,.32,1.275),bottom .3s cubic-bezier(.175,.885,.32,1.275),background-position 3s cubic-bezier(.455,.03,.515,.955);
    transition: transform .3s cubic-bezier(.175,.885,.32,1.275),bottom .3s cubic-bezier(.175,.885,.32,1.275),background-position 3s cubic-bezier(.455,.03,.515,.955),-webkit-transform .3s cubic-bezier(.175,.885,.32,1.275);
  }
  .button2, .button2 .btn-secondary2 {
    background-position: 0 50%;
    bottom: 0;
  }
  .button2 .btn-secondary2 {
    left: 0;
    width: 90%;
    position: absolute;
    filter: blur(16px);
    opacity: .9;
    z-index: -1;
    transform: scale3d(.9, .9, 1);
    transition: bottom .3s cubic-bezier(.175,.885,.32,1.275),background-position 3s cubic-bezier(.455,.03,.515,.955),-webkit-transform .3s cubic-bezier(.175,.885,.32,1.275),-webkit-filter .3s cubic-bezier(.175,.885,.32,1.275);
    transition: transform .3s cubic-bezier(.175,.885,.32,1.275),filter .3s cubic-bezier(.175,.885,.32,1.275),bottom .3s cubic-bezier(.175,.885,.32,1.275),background-position 3s cubic-bezier(.455,.03,.515,.955);
    transition: transform .3s cubic-bezier(.175,.885,.32,1.275),filter .3s cubic-bezier(.175,.885,.32,1.275),bottom .3s cubic-bezier(.175,.885,.32,1.275),background-position 3s cubic-bezier(.455,.03,.515,.955),-webkit-transform .3s cubic-bezier(.175,.885,.32,1.275),-webkit-filter .3s cubic-bezier(.175,.885,.32,1.275);
  }
  .button2:focus, .button2:hover {
    transform: scale3d(1.1, 1.1, 1);
    background-position: 100% 50%;
    outline: none;
    bottom: 2px;
  }
  .button2:focus .btn-secondary2, .button2:hover .btn-secondary2 {
    background-position: 100% 50%;
    filter: blur(25px);
    bottom: -5px;
  }
  /* Footer */
  #footer {
    width: 100%;
    padding: 25vh 0 0 0;
    background-color: #1b3e75;
  }
  .footer-logo-wrapper {
    width: 100%;
  }
  .footer-logo {
    padding: 5vh 0 10vh 0;
    width: 115px;
    opacity: 1;
  }
  .footer-inner {
    width: 80%;
    min-height: 25vh;
  }
  .footer-left {
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
  }
  .footer-left a {
    color: var(--white);
    font-size: 1.11rem;
    letter-spacing: .1em;
    font-weight: 300;
    cursor: pointer;
    transition: color .2s ease-in-out;
  }
  .footer-left a:hover {
    color: var(--primary);
  }
  .footer-ico {
    width: 25px;
  }
  .footer-right {
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
    align-items: flex-start;
  }
  .footer-links {
    margin: 0 0 1.5em 0;
  }
  .footer-link {
    margin: 0 1em;
    color: var(--white);
    cursor: pointer;
    text-decoration: none;
    transition: color .2s ease-in-out;
  }
  .footer-link:hover {
    color: var(--primary);
  }
  .fl-first {
    margin: 0 1em 0 0;
  }
  .fl-last {
    margin: 0 0 0 1em;
  }
  .footer-text {
    margin: 1em .5em;
    color: var(--gray);
    font-size: .85em;
    width: 50%;
    transition: color .2s ease-in-out;
  }
  .footer-sites {
    color: var(--gray);
    font-size: .85em;
  }
  .footer-sites a {
    margin: 0 .5em;
    color: var(--white);
    border-bottom: 1px solid var(--white);
    text-decoration: none;
    font-size: .8em;
    cursor: pointer;
    transition: all .2s ease-in-out;
  }
  .footer-sites a:hover {
    color: var(--primary);
    border-bottom: 1px solid var(--primary);
  }
  /* Selection */
  ::selection {
    color: var(--white);
    background: var(--primary);
  }
  /* SCROLLBAR */
  ::-webkit-scrollbar-track {
        background-color: #F5F5F5;
  }
  ::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
  }
  ::-webkit-scrollbar-thumb {
        background-color: var(--primary);
  }
  /* @keyframes */
  @keyframes menufade {
    0% { opacity: 0; }
    100% { opacity: 1; }
  }
  @keyframes menufade-back {
    0% { opacity: 1; }
    100% { opacity: 0; }
  }
  @keyframes header-btn {
    0% { top: 0; }
    50% { top: 8px; }
    100% { top: 0; }
  }
  /* @media rules */
  @media (max-width: 1440px) {
    #navbar {
      grid-template-columns: 1fr 30% 45% 1fr;
    }
    #menu {
      grid-template-columns: 1fr 25% 25% 25% 1fr;
    }
    .user-info-bar {
      grid-template-columns: 1fr 13% 42% 20% 1fr;
    }
    .user-info-bar2 {
      grid-template-columns: 1fr 18.75% 18.75% 18.75% 18.75% 1fr;
    }
  }
  @media (max-width: 1024px) {
    #navbar {
      grid-template-columns: 1fr 25% 60% 1fr;
    }
    #menu {
      grid-template-columns: 1fr 28.33% 28.33% 28.33% 1fr;
    }
    .user-info-bar {
      grid-template-columns: 1fr 18% 46% 21% 1fr;
    }
    .user-info-bar2 {
      grid-template-columns: 1fr 21.25% 21.25% 21.25% 21.25% 1fr;
    }
    .user-info-inner {
      width: 80%;
    }
    .ufo-text {
      display: none;
    }
    .ufo-num {
      color: var(--white);
    }
    .footer-inner {
      width: 100%;
      flex-direction: column;
    }
    .footer-left {
      width: 100%;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .footer-right {
      width: 100%;
      align-items: center;
      justify-content: center;
    }
    .footer-mail {
      margin: 2em 0 0 0;
    }
    .footer-links {
      margin: 1.5em 0 1.5em 0;
    }
    .footer-text {
      text-align: center;
    }
    .footer-sites {
      margin: .5em 0 4em 0;
    }
    .fl-first {
      margin: 0 1em 0 1em;
    }
    .fl-last {
      margin: 0 1em 0 1em;
    }
    .button2, .btn-secondary2 {
      letter-spacing: 0;
      font-size: var(--button-smallest);
    }
  }
  @media (max-width: 767px) {
    #navbar {
      grid-template-columns: 1fr 25% 65% 1fr;
    }
    #menu {
      grid-template-columns: 1fr 30% 30% 30% 1fr;
    }
    .user-info-bar {
      grid-template-columns: 1fr 21% 44% 25% 1fr;
    }
    .user-info-bar2 {
      grid-template-columns: 1fr 23.75% 23.75% 23.75% 23.75% 1fr;
    }
    .user-info-inner {
      width: 100%;
    }
    .username-dev {
      font-size: 1.5em;
    }
    .uname-verified {
      width: 19px;
    }
    .no-mob {
      display: none;
    }
    .no-desk {
      display: block;
    }
    .button2, .btn-secondary2 {
      padding: .8em .8em;
      letter-spacing: 0;
    }
  }
  @media (max-width: 560px) {
    #menu {
      background-color: var(--bc);
      grid-template-columns: 90%;
      grid-template-rows: 1fr 1fr 1fr;
      justify-content: center;
      flex-direction: column;
      align-items: center;
    }
    .menu-left {
      grid-area: 1;
    }
    .menu-center {
      grid-area: 2;
    }
    .menu-right {
      grid-area: 3;
    }
    .menu-left-space {
      display: none;
    }
    .menu-right-space {
      display: none;
    }
    .username-dev {
      font-size: 1.6em;
    }
    .uname-verified {
      width: 21px;
    }
    .footer-link {
      display: block;
      margin: 1em 0 1em 0;
    }
  }
  @media (max-width: 420px) {
    .username-dev {
      font-size: 1.5em;
    }
    .uname-verified {
      width: 20px;
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

.bottomstrip{
  display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    background-color: #154a73;
    width: 100%;
    height: 80px;
}

.about{
    width: 50%;
    align-self: center;
    margin-left: 25%;
    padding: 20px;
    background-color: #f4f4f4;
    border-radius: 10px;
    justify-content: center;
  }

  .about-flex{
    display: flex;
    justify-content: space-evenly;
  }

  .about-align{
    text-align: center;
  }

  #title{
    font-size: 30px;
    font-weight: 1000;
  }

  #desc{
    font-size: 25px;
    font-weight: 500;
  }

  .rectangle{
    width: 200px;
    height: 300px;
    background-color: rgba(155, 42, 40, .8);
    border-radius: 10px;
    text-align: center;
    color: #fff;
    font-size: 40px;
    padding: 20px;
  }

  .carousel {
  width: 60vh;
  height: 60vh;
  position: relative;
  margin-left: 20%;
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


<!-- <nav id="navbar">
    <div class="nav-left">
        <div id="button1" class="nav-button">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
    </div> -->
    </nav>
<div id="menu">
    <div class="menu-left-space"></div>
    <div class="menu-left">
        <h3>General</h3>
        <ul class="menu-items">
            <li class="menu-item"><a class="menu-item-inner" href=""><span><i class='uil uil-home-alt'></i> Home</span></a></li>
            <li class="menu-item"><a class="menu-item-inner" href=""><span><i class='uil uil-comment-image'></i> Forum</span></a></li>
            <li class="menu-item"><a class="menu-item-inner" href=""><span><i class="uil uil-shopping-bag"></i> Store</span></a></li>
        </ul>
    </div>
    <div class="menu-center">
        <h3>Useful Links</h3>
        <ul class="menu-items">
            <li class="menu-item"><a class="menu-item-inner" href=""><span><i class="uil uil-bookmark"></i> Tutorials</span></a></li>
            <li class="menu-item"><a class="menu-item-inner" href=""><span><i class="uil uil-map-marker-info"></i> Dynmap</span></a></li>
            <li class="menu-item"><a class="menu-item-inner" href=""><span><i class='uil uil-server-alt'></i> Servers</span></a></li>
        </ul>
    </div>
    <div class="menu-right">
        <h3>Admin Tools</h3>
        <ul class="menu-items">
            <li class="menu-item"><a class="menu-item-inner" href=""><span><i class="uil uil-lightbulb"></i> Control Panel</span></a></li>
            <li class="menu-item"><a class="menu-item-inner" href=""><span><i class="uil uil-brackets-curly"></i> Code Editor</span></a></li>
            <li class="menu-item"><a class="menu-item-inner" href=""><span><i class="uil uil-window"></i> Info & Status</span></a></li>
        </ul>
    </div>
    <div class="menu-right-space"></div>
</div>
<div class="back-to-top" style="display: block; opacity: 1;">
    <a class="semplice-event" href="#" data-event-type="helper" data-event="scrollToTop" style="opacity: 1;">
        <svg version="1.1" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="53px" height="20px" viewBox="0 0 53 20" enable-background="new 0 0 53 20" xml:space="preserve">
            <g id="Ebene_3"></g>
            <g><polygon points="43.886,16.221 42.697,17.687 26.5,4.731 10.303,17.688 9.114,16.221 26.5,2.312 	"></polygon></g>
        </svg>
    </a>
</div>
<main>
    <!-- <div class="user-header-wrapper flexbox">
        <div class="user-header-inner flexbox">
            <div class="user-header-overlay"></div>
            <img class="user-header" src="images.jfif.jpg" alt="">
        </div>
    </div> -->
    <div class="user-info-bar">
        <div class="ufo-bar-col1">
        </div>
        <div class="ufo-bar-col2">
            <div class="ufo-bar-col2-inner">
                <div class="user-icon-wrapper">
                <?php if (!empty($logo_image)): ?>
                <img class="user-icon" src="data:image/jpeg;base64,<?php echo $logo_image; ?>" alt="">
            <?php else: ?>
                <img class="user-icon" src="csi_kjsieit_student_s_chapter_logo.jpeg" alt="Default Background Image">
            <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="ufo-bar-col3">
            <div class="ufo-bar-col3-inner">
                <div class="username-wrapper-outer">
                    <div class="username-wrapper">
                        <!--div class="verified" style="opacity: 0; top: 150%;"><p>Verified Account</p></div-->
                        <h3 class="username-dev"><?php echo $committee_name?></h3>
                        <!--svg class="uname-verified" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1350.03 1326.16"-->
                            <defs><style>.cls-11{fill:var(--bc);}.cls-12{fill:#000000;}</style></defs><title>verified</title>
                            <g id="Layer_3" data-name="Layer 3">
                                <polygon class="cls-11" points="0 747.37 120.83 569.85 70.11 355.04 283.43 292.38 307.3 107.41 554.93 107.41 693.66 0 862.23 120.83 1072.57 126.8 1112.84 319.23 1293.35 399.79 1256.05 614.6 1350.03 793.61 1197.87 941.29 1202.35 1147.15 969.64 1178.48 868.2 1326.16 675.02 1235.17 493.77 1315.72 354.99 1133.73 165.58 1123.29 152.16 878.64 0 747.37"/></g>
                            <g id="Layer_2" data-name="Layer 2">
                                <path class="cls-12" d="M755.33,979.23s125.85,78.43,165.06,114c34.93-36,234.37-277.22,308.24-331.94,54.71,21.89,85,73.4,93,80.25-3.64,21.89-321.91,418.58-368.42,445.94-32.74-3.84-259-195.16-275.4-217C689.67,1049.45,725.24,1003.85,755.33,979.23Z" transform="translate(-322.83 -335.95)"/></g>
                        </svg>
                    </div>
                    <!--div>
                        <a class="ufo-bar-fff" href=""><span>857</span> Followers</a>
                        <a class="ufo-bar-fff" href=""><span>137</span> Following</a>
                    </div-->
                </div>
            </div>
        </div>
        <div class="nav-right">
        <!-- <ul id="navbar-items">
            <li class="navbar-item no-mob"><a class="navbar-item-inner" href="hptrial.php"><span><i class='uil uil-home-alt'></i> Home</span></a></li>
            <li class="navbar-item no-mob"><a class="navbar-item-inner" href=""><span><i class='uil uil-comment-image'></i> Forum</span></a></li>
            <li class="navbar-item no-mob"><a class="navbar-item-inner" href=""><span><i class="uil uil-shopping-bag"></i> Store</span></a></li>
            <li class="navbar-item"><a class="navbar-item-inner" href=""><span><i class='uil uil-user'></i></span></a></li>
        </ul> -->
    </div>
        <!--div class="ufo-bar-col4">
            <div class="ufo-bar-col4-inner">
                <button class="button2 btn-primary2"><i class="uil uil-plus"></i> Subscribe<div class="btn-secondary2"></div></button>
            </div>
        </div-->
        <!-- <div class="ufo-bar-col5"> -->
        </div>
    </div>
    <div class="user-info-bar2">
        <div class="ufo-bar2-col1">
        </div>
        <div id="ufo-home" class="ufo-bar2-col2 ufo-bar2-block">
            <div class="ufo-bar2-col2-inner flexbox">
                <span><i class="uil uil-trophy"></i></span>
                <a style="text-decoration: none;" href="committeepg.php?committee_ID=<?php echo $committee_id; ?>"><h3>About</h3></a>
            </div>
        </div>
        <div id="ufo-videos" class="ufo-bar2-col3 ufo-bar2-block">
            <div class="ufo-bar2-col3-inner flexbox">
                <span><i class="uil uil-star"></i></span>
                <a style="text-decoration: none;" href="events.php?committee_ID=<?php echo $committee_id; ?>"><h3>Events</h3></a>
            </div>
        </div>
        <div id="ufo-images" class="ufo-bar2-col4 ufo-bar2-block">
            <div class="ufo-bar2-col4-inner flexbox">
                <span><i class="uil uil-comment-alt"></i></span>
                <a style="text-decoration: none;" href="achievements.php?committee_ID=<?php echo $committee_id; ?>"><h3>Achievements</h3></a>
            </div>
        </div>
        <div id="ufo-about" class="ufo-bar2-col6 ufo-bar2-block">
            <div class="ufo-bar2-col6-inner flexbox">
                <span><i class="uil uil-user"></i></span>
                <!--a style="text-decoration: none;" href="members.php"><h3>Members</h3></a-->
                <a style="text-decoration: none;" href="members.php?committee_ID=<?php echo $committee_id; ?>"><h3>Members</h3></a>

            </div>
        </div>
        <div class="ufo-bar2-col7">
        </div>
    </div> <br><br>
    <!--section class="about">
        <div class="about-align" id="title">Title</div><br>
        <div class="about-align" id="desc">Description</div><br>
        <section aria-label="Newest Photos">
          <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev">&#10094;</button>
            <button class="carousel-button next" data-carousel-button="next">&#10095;</button>
            <ul data-slides>
              <li class="slide" data-active>
                <img src="csi_kjsieit_student_s_chapter_logo.jpeg" alt="Nature Image #1">
              </li>
              <li class="slide">
                <img src="IEEE.jpeg" alt="Nature Image #2">
              </li>
              <li class="slide">
                <img src="ACS.jpg" alt="Nature Image #3">
              </li>
            </ul>
          </div>
        </section>
        </section><br><br>
        <section class="about">
          <div class="about-align" id="title">Title</div><br>
          <div class="about-align" id="desc">Description</div><br>
          <section aria-label="Newest Photos">
            <div class="carousel" data-carousel>
              <button class="carousel-button prev" data-carousel-button="prev">&#10094;</button>
              <button class="carousel-button next" data-carousel-button="next">&#10095;</button>
              <ul data-slides>
                <li class="slide" data-active>
                  <img src="csi_kjsieit_student_s_chapter_logo.jpeg" alt="Nature Image #1">
                </li>
                <li class="slide">
                  <img src="IEEE.jpeg" alt="Nature Image #2">
                </li>
                <li class="slide">
                  <img src="ACS.jpg" alt="Nature Image #3">
                </li>
              </ul>
            </div>
          </section>
          </section-->
          <?php
if (count($committee_achievements) > 0) {
    foreach ($committee_achievements as $row) {
        echo '<section class="about">';
        echo '<div class="about-align" id="title">' . $row['achievement_name'] . '</div><br>';
        echo '<div class="about-align" id="desc">' . $row['achievement_desc'] . '</div><br>';
        // echo '<div class="about-align" id="date">' . $row['achievement_date'] . '</div><br>';

        echo '<section aria-label="Newest Photos">';
        echo '<div class="carousel" data-carousel>';
        echo '<button class="carousel-button prev" data-carousel-button="prev">&#10094;</button>';
        echo '<button class="carousel-button next" data-carousel-button="next">&#10095;</button>';
        echo '<ul data-slides>';

        echo '<li class="slide" data-active>';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['achievement_photo']) . '" alt="Achievement Image">'; 
        echo '</li>';

        echo '</ul>';
        echo '</div>';
        echo '</section>';
        echo '</section>';
        echo '<br>';
    }
    
} else {
    echo "No achievements found.";
}
?>
    
</main><br><br>
<footer class="bottomstrip">
    <div style="align-self: flex-start; align-self: center;"><a href="https://kjsit.somaiya.edu.in/"><img src="Somaiya-white.svg" alt="somaiya"></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.facebook.com/kjsieitofficial"><img class="logofb" src="fb logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a href="https://www.twitter.com/kjsieit1"><img class="logotit" src="twitter logo.png" alt=""></a></div>
    <div style="align-self: flex-end; align-self: center;"><a target="_blank" href="https://www.instagram.com/kjsit_official/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA=="><img class="logoinsta" src="insta logo.png" alt="insta"></a></div>
    <div style="align-self: flex-end; align-self: center;"><img class="img2" src="somaiya trust logo.jpg" alt="SOMAIYA trust"></div>
</footer>

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
if (newIndex >= slides.children.length) newIndex = 0

slides.children[newIndex].dataset.active = true
delete activeSlide.dataset.active
})
})
</script>
</body>
</html>