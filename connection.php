<?php
  // setting values for server, username, password, database name
  $servername="ecs-pd-proj-db.ecs.csus.edu";
  $username="CSC174130";
  $password="Csc134_925194197";
  $dbname="CSC174130";

  // Connecting to mysql
  $conn = new mysqli($servername, $username, $password,$dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else{
    //echo "Connected successfully";
  }
?>
