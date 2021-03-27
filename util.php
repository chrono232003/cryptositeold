<?php

class connection {
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $db = "game";
}


// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>
