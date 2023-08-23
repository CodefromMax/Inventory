<?php  
	$connect = mysqli_connect("localhost", "root", "", "inv");
	$id = intval($_POST["Item_ID"]);
	$sql = "DELETE FROM `ITM_Inventory` WHERE `Item_ID` = $id";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>