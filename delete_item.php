<?php include('dbcon.php');

ini_set('display_errors', 1); error_reporting(-1);


if (isset($_GET['id'])){

    $id = $_GET['id'];
    $name = $_GET['name'];
    $query = "DELETE FROM `inventory` where  `id` = '$id'";
}


$result = mysqli_query($connection,$query);
$date = date('m/d/Y h:i:s a', time());
if (!$result){
    die("query failed");
}

else{
    header("location:index.php?delete_message= Deleted ($id , $name,)($date)");
}

    
