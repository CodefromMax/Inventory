<?php 
ini_set('display_errors', 1); error_reporting(-1);
include("dbcon.php");

if(isset($_POST['add_item'])){
    $id = $_POST['item_id'];
    $name = $_POST['item_name'];
    $quantity = $_POST['item_quantity'];
    $location = $_POST['item_location'];

    $query = "INSERT INTO `inventory`(`id`, `name`, `quantity`, `location`) VALUES ('$id', $name, $quantity, $location)";
    try{
        $result = mysqli_query($connection, $query);
    } catch (Throwable $exception) { //Use Throwable to catch both errors and exceptions
        // header('HTTP/1.1 500 Internal Server Error'); //Tell the browser this is a 500 error
        header("location:index.php?error= Error 500: Failed to add.($id , $name) Please check the uniqueness of the id.");
    }
    // $result = mysqli_query($connection, $query);
    // $mysqli -> close();
    if (!$result){
        
        // header("location:index.php?message= check the uniqueness of the id.");
        die("Failed to insert data.");
    }
    else {
        header("location:index.php?message=Added item: ($id , $name)  .");

    }




}


?>