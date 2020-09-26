<?php

// server information
$servername = "localhost";
$username = "root";
$password= "";
$dbname = "library";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($db -> connect_errno) {
  echo "Failed to connect to the system: " . $db -> connect_error;
  exit();
}
?>

