<?php

$dbHost = "sql301.epizy.com";
$dbUser = "epiz_28638124";
$dbPass = "BQAUmpxuHgEMEWd
";
$dbName = "epiz_28638124_bank";

//estahblishing a connection
$conn = mysqli_connect($dbHost,$dbUser,$dbPass, $dbName);

if(!$conn)
  {
      die("database connection failed");
  }

?>