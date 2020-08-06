<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
// $servername = "n_thekie@login.encs.concordia.ca";
// $username = "eyc353_1";
// $password = "Barr3lR0";
// Create connection
$conn = new mysqli($servername, $username, $password,"test");//the last para for database_name

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>