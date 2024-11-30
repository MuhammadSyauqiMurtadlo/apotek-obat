<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apotik_db";


// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
  die("Connection Failed:" . $conn->connect_error);
}
