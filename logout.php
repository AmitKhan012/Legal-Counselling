<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_destroy(); 
//$_SESSION['username'] = "Amit";
include 'login.php';
?>