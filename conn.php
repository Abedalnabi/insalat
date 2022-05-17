<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'user');
  define('DB_PASSWORD', '0000');
  define('DB_NAME', 'db_name');

  $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if ($conn === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
?>