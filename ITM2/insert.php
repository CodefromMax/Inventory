<?php  
$connect = mysqli_connect("localhost", "root", "", "inv");
$sql = "INSERT INTO `ITM_Inventory` (`Item_Name`, `Supplier`, `Est_Quantity`, `Exact_Quantity`, `Minimum`, `Boxes`, `Owner_Name`, `Status`, `Room`, `Section`, `Shelf`, `Level`, `Note`) VALUES('".$_POST["Item_Name"]."', '".$_POST["Supplier"]."', '".$_POST["Est_Quantity"]."', '".$_POST["Exact_Quantity"]."', '".$_POST["Minimum"]."', '".$_POST["Boxes"]."', '".$_POST["Owner_Name"]."', '".$_POST["Status"]."', '".$_POST["Room"]."', '".$_POST["Section"]."', '".$_POST["Shelf"]."', '".$_POST["Level"]."', '".$_POST["Note"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>