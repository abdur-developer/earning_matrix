<?php

$servername = "localhost";


$username = "root";
$password = "";
$dbname = "earning_matrix";


/*
$username = "vuflactn_mm";
$password = "Abdur7920#$%&";
$dbname = "vuflactn_mm"; */

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>