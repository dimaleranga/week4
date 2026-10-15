<?php
  // Replace with your actual MySQL credentials
  $mysqli = new mysqli("localhost", "2648116", "University1448", "db2648116");
  
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
  }
?>