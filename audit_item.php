<?php
$conn = mysqli_connect("localhost", "root", "", "inv");
date_default_timezone_set('America/Toronto');

if(isset($_POST["action"])){
  // Choose a function depends on value of $_POST["action"]
  if($_POST["action"] == "audit"){
    audit();
  }
}

function audit(){
  global $conn;

  $serial_number = $_POST["serial_number"];
    $date = date('m/d/Y h:i a', time());


    mysqli_query($conn, "UPDATE `inventory` SET `last_audited` = '$date' WHERE `serial_number` = '$serial_number'");
    echo 1;
}
