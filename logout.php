<?php   
//this ensure the same session is used
session_start(); 
//end the session
unset($_SESSION['username']);
session_destroy(); 
//to redirect the page after logout
header("location: login.php");
ob_end_flush(); 
include 'menu.php';
exit();
?>