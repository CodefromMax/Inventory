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
    $name = $_POST["name"];
    $date = date('m/d/Y h:i a', time());


    mysqli_query($conn, "UPDATE `inventory` SET `last_audited` = '$date' WHERE `serial_number` = '$serial_number'");
    $log_date = date('Y-m-d h:i:s a', time());
    $query = "INSERT INTO `Logs`(`date`, `action`, `person`, `Note`) VALUES ('$log_date','Audited ($serial_number , $name)','Admin','')";
    mysqli_query($conn,$query);
    echo 1;
}