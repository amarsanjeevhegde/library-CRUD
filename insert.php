<?php
include 'connect.php';

if (isset($_POST['username'])) { 
  $uname = $_POST['username'];//Initialize variables 
  //hash the password
  $pword = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $em = $_POST['email'];  
  $stmt = $db->prepare("INSERT into users (username, password, email) VALUES (?,?,?)");
  $stmt->bind_param("sss",$uname, $pword, $em);
  $success = $stmt->execute(); 
  //If the query was executed, than the data is inserted to the system
  if ($success) {
  session_start();
  $_SESSION['login'] = TRUE;
  $_SESSION['user'] = $em;
  header("Location: menu.php");
  } else {

  }
}
?>
