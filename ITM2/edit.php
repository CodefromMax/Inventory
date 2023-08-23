<?php  
	$connect = mysqli_connect("localhost", "root", "", "inv");
	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE `ITM_Inventory` SET ".$column_name."='".$text."' WHERE Item_ID='".$id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Updated';  
	}  
 ?>