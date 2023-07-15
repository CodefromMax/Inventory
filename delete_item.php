<?php include('dbcon.php');

ini_set('display_errors', 1); error_reporting(-1);

date_default_timezone_set('America/Toronto');
if (isset($_GET['serial_number'])){

    $serial_number = $_GET['serial_number'];
    $name = $_GET['name'];
    $query = "DELETE FROM `inventory` where  `serial_number` = '$serial_number'";
}


$result = mysqli_query($connection,$query);
$date = date('m/d/Y h:i a', time());
if (!$result){
    die("query failed");
}

else{
    $log_date = date('m/d/Y h:i:s a', time());
    $query = "INSERT INTO `Logs`(`date`, `action`, `person`, `Note`) VALUES ('$log_date','Deleted ($serial_number , $name)','Admin','')";
    $result = mysqli_query($connection,$query);

    header("location:index.php?delete_message= Deleted ($serial_number , $name)($date)");
}