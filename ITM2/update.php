<?php  
 
 $Action = $_POST["Action"];

 if ($Action == "disp"){

     $connect = mysqli_connect("localhost", "root", "", "inv");  
     $output = '';  
     $sql = "SELECT * FROM ITM_inventory ORDER BY Item_ID ASC";  
     $result = mysqli_query($connect, $sql);  
     
     $rows = mysqli_num_rows($result);
     $output .= '  
           <table class="table-hover table-bordered table-striped" style="width:95%;" align = "center" >  
           <tbody style="font-size: 21px;" align = "center">
           <tr>  
                    <th style = "text-align: center">Id</th>  
                    <th style = "text-align: center">Name</th>  
                    <th style = "text-align: center">Supplier</th>  
                    <th style = "text-align: center">Est. Quantity</th>  
                    <th style = "text-align: center">Exact Quantity</th>  
                    <th style = "text-align: center">Minimum</th>  
                    <th style = "text-align: center">No. Boxes</th>  
                    <th style = "text-align: center">Owner</th>  
                    <th style = "text-align: center">Status</th>  
                    <th style = "text-align: center">Room</th>  
                    <th style = "text-align: center">Section</th>  
                    <th style = "text-align: center">Shelf</th>  
                    <th style = "text-align: center">Level</th>  
                    <th style = "text-align: center">Note</th>
                    <th style = "text-align: center">Edit</th>
                    <th style = "text-align: center">Delete</th>
                </tr>';  
     echo $output;
?>
     <tr>  
     <td></td>  
               <td id="Item_Name" contenteditable></td>
               <td id="Supplier" contenteditable></td>
               <td id="Est_Quantity" contenteditable></td> 
               <td id="Exact_Quantity" contenteditable></td> 
               <td id="Boxes" contenteditable></td> 
               <td id="Owner_Name" contenteditable></td> 
               <td id="Status" contenteditable></td> 
               <td id="Room" contenteditable></td> 
               <td id="Section" contenteditable></td> 
               <td id="Shelf" contenteditable></td> 
               <td id="Level" contenteditable></td> 
               <td id="Note" contenteditable></td> 
          <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
     </tr>  
     <?php
     if($rows > 0)  
     {  
          
          while($row = mysqli_fetch_array($result))  
          {  
               
                   echo "<tr>"; 
                   echo "<td>"; echo $row["Item_ID"];  echo "</td>";   
                   echo "<td>";?> <div id = "Name<?php echo $row["Item_ID"]; ?>"><?php echo $row["Item_Name"]; ?></div> <?php echo "</td>";  
                   echo "<td>";?> <div id = "Supplier<?php echo $row["Item_ID"]; ?>"><?php echo $row["Supplier"]; ?></div> <?php echo "</td>";  
                   echo "<td>";?> <div id = "Est_Quantity<?php echo $row["Item_ID"]; ?>"><?php echo $row["Est_Quantity"]; ?></div> <?php echo "</td>";  
                   echo "<td>";?> <div id = "Exact_Quantity<?php echo $row["Item_ID"]; ?>"><?php echo $row["Exact_Quantity"]; ?></div> <?php echo "</td>"; 
                   echo "<td>";?> <div id = "Minimum<?php echo $row["Item_ID"]; ?>"><?php echo $row["Minimum"]; ?> </div> <?php echo "</td>";  
                   echo "<td>";?> <div id = "Boxes<?php echo $row["Item_ID"]; ?>"><?php echo $row["Boxes"]; ?></div> <?php echo "</td>";  
                   echo "<td>";?> <div id = "Owner_Name<?php echo $row["Item_ID"]; ?>"><?php echo $row["Owner_Name"]; ?></div> <?php echo "</td>";  
                   echo "<td>";?> <div id = "Status<?php echo $row["Item_ID"]; ?>"><?php echo $row["Status"]; ?></div> <?php echo "</td>";  
                   echo "<td>";?> <div id = "Room<?php echo $row["Item_ID"]; ?>"><?php echo $row["Room"]; ?></div> <?php echo "</td>";  
                   echo "<td>";?> <div id = "Section<?php echo $row["Item_ID"]; ?>"><?php echo $row["Section"]; ?></div> <?php echo "</td>";  
                   echo "<td>";?> <div id = "Shelf<?php echo $row["Item_ID"]; ?>"><?php echo $row["Shelf"]; ?></div> <?php echo "</td>";  
                   echo "<td>";?> <div id = "Level<?php echo $row["Item_ID"]; ?>"><?php echo $row["Level"]; ?></div> <?php echo "</td>";
                   echo "<td>";?> <div id = "Note<?php echo $row["Item_ID"]; ?>"><?php echo $row["Note"]; ?></div> <?php echo "</td>";  
                   echo "<td>";?>
                    <input type="button" name="<?php echo $row["Item_ID"]; ?>" id="<?php echo $row["Item_ID"]; ?>" class="btn btn-primary btn-block" value = "Edit" onclick="edit1(this.id)">
                    <input type="button" name="<?php echo $row["Item_ID"];?>" id="update<?php echo $row["Item_ID"]; ?>" value = "Update" class="btn btn-primary btn-block" onclick="update1(this.name)" style = "display:none" ><?php echo "</td>"; 
                   echo "<td>";?> <input type="button" name="<?php echo $row["Item_ID"]; ?>" id="<?php echo $row["Item_ID"]; ?>" class="btn btn-danger btn_delete" value = "Delete" onclick="delete1(this.id)"><?php echo "</td>"; 
                   echo "</tr>"; 
          }
     }



     echo "</table>";
     // echo "</div>";

}

if ($Action == "Update")
{
     $connect = mysqli_connect("localhost", "root", "", "inv");
	
     $id = $_POST["id"];
     $Name = $_POST["Name"];
     $Supplier= $_POST["Supplier"];
     $Est_Quantity= $_POST["Est_Quantity"];
     $Exact_Quantity= $_POST["Exact_Quantity"];
     $Minimum = $_POST["Minimum"];
     $Boxes= $_POST["Boxes"];
     $Owner_Name= $_POST["Owner_Name"];
     $Status= $_POST["Status"];
     $Room= $_POST["Room"];
     $Section= $_POST["Section"];
     $Shelf= $_POST["Shelf"];
     $Level= $_POST["Level"];
     $Note= $_POST["Note"];
     
     $query = "UPDATE `ITM_Inventory` SET `Item_Name`='$Name',`Supplier`='$Supplier',`Est_Quantity`='$Est_Quantity',`Exact_Quantity`='$Exact_Quantity',`Minimum`='$Minimum',`Boxes`='$Boxes',`Owner_Name`='$Owner_Name',`Status`='$Status',`Room`='$Room',`Section`='$Section',`Shelf`='$Shelf',`Level`='$Level',`Note`='$Note' WHERE `Item_ID` = '$id' ";
     // $query = "UPDATE `ITM_Inventory` SET `Item_Name`='$Name', `Supplier`='$Supplier',`Est_Quantity`='$Est_Quantity',`Exact_Quantity`='$Exact_Quantity' WHERE `Item_ID` = '$id' ";
     // ,`Supplier`='$Supplier',`Est_Quantity`='$Est_Quantity',`Exact_Quantity`='$Exact_Quantity',`Minimum`='$Minimum',`Boxes`='$Boxes',`Owner_Name`='$Owner_Name',`Status`='$Status',`Room`='$Room',`Section`='$Section',`Shelf`='$Shelf',`Level`='$Level',`Note`='$Note' WHERE `Item_ID` = '$id' ";

     mysqli_query($connect, $query);

}

if ($Action == "Delete")
{
     $connect = mysqli_connect("localhost", "root", "", "inv");
	
     $id = $_POST["id"];
     $query = "DELETE FROM `ITM_Inventory` WHERE `Item_ID` = '$id'";
     mysqli_query($connect, $query);
}



?>