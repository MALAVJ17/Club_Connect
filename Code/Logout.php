<?php
session_start();

session_unset();
session_destroy();

header("Loaction: Index.php");