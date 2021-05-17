<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "bank";

//estahblishing a connection
$conn = mysqli_connect($dbHost,$dbUser,$dbPass, $dbName);

if(!$conn)
  {
      die("database connection failed");
  }

?>
