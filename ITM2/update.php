<?php  
 
 $status = $_GET["status"];

 if ($status == "disp"){

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
     // echo "<table>"; style="width:90%" align =  "center"
     //  <td class="Section" data-id9="'.$row["Section"].'-'.$row["Shelf"].'-'.$row["Level"].'"contenteditable>'.$row["Section"].'-'.$row["Shelf"].'-'.$row["Level"].'</td>  
     if($rows > 0)  
     {  
          //   if($rows > 10)
          //   {
          // 	  $delete_records = $rows - 10;
          // 	  $delete_sql = "DELETE FROM ITM_inventory LIMIT $delete_records";
          // 	  mysqli_query($connect, $delete_sql);
          //   }
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
                    <input type="button" name="<?php echo $row["Item_ID"];?>" id="update<?php echo $row["Item_ID"]; ?>" value = "Update" class="btn btn-primary btn-block" onclick="update1(this.id)" style = "display:none" ><?php echo "</td>"; 
                   echo "<td>";?> <input type="button" name="<?php echo $row["Item_ID"]; ?>" id="<?php echo $row["Item_ID"]; ?>" class="btn btn-danger btn_delete" value = "Delete" onclick="delete1(this.id)"><?php echo "</td>"; 
                   echo "</tr>"; 
          }
     }
     echo "</table>";
     // echo "</div>";

}
 
 
//  $connect = mysqli_connect("localhost", "root", "", "inv");  
//  $output = '';  
//  $sql = "SELECT * FROM ITM_inventory ORDER BY Item_ID ASC";  
//  $result = mysqli_query($connect, $sql);  
//  $output .= '  
//       <div class="table-responsive">  
//            <table class="table table-bordered">  
//                 <tr>  
// <th width="5%">Id</th>  
//                      <th width="30%">Name</th>  
//                      <th width="10%">Supplier</th>  
//                      <th width="3%">Est. Quantity</th>  
//                      <th width="3%">Exact Quantity</th>  
//                      <th width="3%">Minimum</th>  
//                      <th width="5%">No. Boxes</th>  
//                      <th width="10%">Owner</th>  
//                      <th width="10%">Status</th>  
//                      <th width="5%">Room</th>  
//                      <th width="2%">Section</th>  
//                      <th width="2%">Shelf</th>  
//                      <th width="2%">Level</th>  
//                      <th width="10%">Note</th>
//                      <th width="10%">Delete</th>
//                      <th width="5%">Id</th>  
//                      <th width="30%">Name</th>  
//                      <th width="10%">Supplier</th>  
//                      <th width="5%">Est. Quantity</th>  
//                      <th width="5%">Exact Quantity</th>  
//                      <th width="5%">No. Boxes</th>  
//                      <th width="10%">Owner</th>  
//                      <th width="10%">Status</th>  
//                      <th width="5%">Room</th>  
//                      <th width="2%">Section</th>  
//                      <th width="2%">Shelf</th>  
//                      <th width="2%">Level</th>  
//                      <th width="10%">Note</th>
//                      <th width="10%">Delete</th>
//                 </tr>';  
//  $rows = mysqli_num_rows($result);

// //  <td class="Section" data-id9="'.$row["Section"].'-'.$row["Shelf"].'-'.$row["Level"].'"contenteditable>'.$row["Section"].'-'.$row["Shelf"].'-'.$row["Level"].'</td>  
//  if($rows > 0)  
//  {  
// 	//   if($rows > 10)
// 	//   {
// 	// 	  $delete_records = $rows - 10;
// 	// 	  $delete_sql = "DELETE FROM ITM_inventory LIMIT $delete_records";
// 	// 	  mysqli_query($connect, $delete_sql);
// 	//   }
//       while($row = mysqli_fetch_array($result))  
//       {  
//            $output .= '  
//                 <tr>  
//                      <td class="Item_ID" data-id0 = "'.$row["Item_ID"].'">'.$row["Item_ID"].'</td>  
//                      <td class="Item_Name" data-id1="'.$row["Item_ID"].'" contenteditable>'.$row["Item_Name"].'</td>  
//                      <td class="Supplier" data-id2="'.$row["Item_ID"].'" contenteditable>'.$row["Supplier"].'</td>  
//                      <td class="Est_Quantity" data-id3="'.$row["Item_ID"].'" contenteditable>'.$row["Est_Quantity"].'</td>  
//                      <td class="Exact_Quantity" data-id4="'.$row["Item_ID"].'" contenteditable>'.$row["Exact_Quantity"].'</td>  
//                      <td class="Boxes" data-id5="'.$row["Item_ID"].'" contenteditable>'.$row["Boxes"].'</td>  
//                      <td class="Owner_Name" data-id6="'.$row["Item_ID"].'" contenteditable>'.$row["Owner_Name"].'</td>  
//                      <td class="Status" data-id7="'.$row["Item_ID"].'" contenteditable>'.$row["Status"].'</td>  
//                      <td class="Room" data-id8="'.$row["Item_ID"].'" contenteditable>'.$row["Room"].'</td>  
//                      <td class="Section" data-id9="'.$row["Item_ID"].'"contenteditable>'.$row["Section"].'</td>  
//                      <td class="Shelf" data-id10="'.$row["Item_ID"].'"contenteditable>'.$row["Shelf"].'</td>  
//                      <td class="Level" data-id11="'.$row["Item_ID"].'"contenteditable>'.$row["Level"].'</td>  
//                      <td class="Note" data-id12="'.$row["Item_ID"].'"contenteditable>'.$row["Note"].'</td>  
//                      <td><button type="button" name="delete_btn" data-id13="'.$row["Item_ID"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
//                 </tr>  
//            ';  
//       }  
//       $output .= '  
//            <tr>  
//            <td></td>  
//                      <td id="Item_Name" contenteditable></td>
//                      <td id="Supplier" contenteditable></td>
//                      <td id="Est_Quantity" contenteditable></td> 
//                      <td id="Exact_Quantity" contenteditable></td> 
//                      <td id="Boxes" contenteditable></td> 
//                      <td id="Owner_Name" contenteditable></td> 
//                      <td id="Status" contenteditable></td> 
//                      <td id="Room" contenteditable></td> 
//                      <td id="Section" contenteditable></td> 
//                      <td id="Shelf" contenteditable></td> 
//                      <td id="Level" contenteditable></td> 
//                      <td id="Note" contenteditable></td> 
//                 <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
//            </tr>  
//       ';  
//  }  
//  else  
//  {  
//       $output .= '
// 				<tr>  
// 					<td></td>  
// 					<td id="Item_Name" contenteditable></td>
//                          <td id="Supplier" contenteditable></td>
//                          <td id="Est_Quantity" contenteditable></td> 
//                          <td id="Exact_Quantity" contenteditable></td> 
//                          <td id="Boxes" contenteditable></td> 
//                          <td id="Owner_Name" contenteditable></td> 
//                          <td id="Status" contenteditable></td> 
//                          <td id="Room" contenteditable></td> 
//                          <td id="Section" contenteditable></td> 
//                          <td id="Shelf" contenteditable></td> 
//                          <td id="Level" contenteditable></td> 
//                          <td id="Note" contenteditable></td> 
// 					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
// 			   </tr>';  
//  }  
//  $output .= '</table>  
//       </div>';  
//  echo $output;  

//  Note:
// data-id1
// Above Jquery code is write for Live Update or Edit of table column first_name, 
// We have write JQuery code on <td> tag with class selector on blur event, 
// So when we have leave first_name <td> tag then this code will execute. 
// Under this function it will received id from data-id1 attribute and text 
// of first name get from <td> class attribute with text() method. 
// This method will fetch text from <td> tag and store into one variable. 
// Then after we have called edit_data() function which send Ajax request to edit.php
//  page and then after it will update or edit first_name table column data.

     //  $(document).on('blur', '.last_name', function(){  
     //       var id = $(this).data("id2");  
     //       var last_name = $(this).text();  
     //       edit_data(id,last_name, "last_name");  
     //  });
 ?>