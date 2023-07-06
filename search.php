<?php
include('dbcon.php');
if(isset($_GET['search']))
{
    // echo $_GET['search'].$_GET['search'].$_GET['search'];
    $filtervalues = $_GET['search'];
    $query = "SELECT * FROM inventory WHERE CONCAT(`id`,`name`) LIKE '%$filtervalues%' ";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0)
    {


        
        foreach($query_run as $items)
        {
            ?>
            $array = array("A", "B", "C", "D", "E", "F", "G"); 
    
    foreach ($array as $shelf) {
        ?>

        <div class="<?php echo $shelf ?>">
        <a name = "<?php echo $shelf."anchor" ?>">
        <?php
        echo "<h2>". $shelf. "</h2>";
        include('build_table_starter.php');
        echo "<tbody>";

        //using the SELECT query style `table` 
        $query = "SELECT * FROM `inventory` WHERE `shelf` = '$shelf' ";

        //hold the database
        $result = mysqli_query($connection,$query);

        // check if the connection works
        if(!$result){
            die("query Failed".mysqli_error($connection));
        }
        else{

            //fetch each row        
            while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td> <?php echo $row['id'] ?> </td>
                        <td> <?php echo $row['name'] ?> </td>
                        <td> <?php echo $row['quantity'] ?> </td>
                        <td> <?php echo $row['shelf'] ?> </td>
                        <td> <?php echo $row['location'] ?> </td>
                        <td> <?php echo $row['division'] ?> </td>
                        <td> <a href="update_item.php?id=<?php echo $row['id'] ?>" class = "btn btn-success">Update</a>
                        <td> <a href="delete_item.php?id=<?php echo $row['id'] ?>&name= <?php echo $row['name'] ?>" class = "btn btn-danger">Delete</a>

                    </tr>
                
                    <?php
                
            }
        }
        
        echo "</tbody>";

        echo "</table>"; 
        
        
        // include('build_table_form.php');
        ?>
         <!-- <p><?php echo $shelf ?></p> -->
<form action="insert_data.php" method = "post">

<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Add item</h3>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <!-- <p><?php echo $shelf ?></p> -->
      <div class="modal-body">
            <div class = "form-group"> 
                <label for="item_id">1. Id:</label><br>
                <input type="text" name = "item_id" class = "form-control" required>
                <label for="item_name">2. Name:</label><br>
                <input type="text" name = "item_name" class = "form-control" required>
                <br><label for="item_quantity">3. Quantity:</label>
                <input type="number" name = "item_quantity" class = "form-control" value="1" required>
                <br><label for="item_shelf">4. Shelf:</label>
               
                <!-- <input type="text" name = "item_shelf" class = "form-control" value= <?php echo $shelf ?> > -->
                <select name="item_shelf" id="item_shelf">
                    <option value="A" <?php if ($shelf == 'A') echo 'selected'; ?>>A</option>
                    <option value="B" <?php if ($shelf == 'B') echo 'selected'; ?>>B</option>
                    <option value="C" <?php if ($shelf == 'C') echo 'selected'; ?>>C</option>
                    <option value="D" <?php if ($shelf == 'D') echo 'selected'; ?>>D</option>
                    <option value="E" <?php if ($shelf == 'E') echo 'selected'; ?>>E</option>
                    <option value="F" <?php if ($shelf == 'F') echo 'selected'; ?>>F</option>
                    <option value="G" <?php if ($shelf == 'G') echo 'selected'; ?>>G</option>
                </select>
                <br>
                <br><label for="item_location">5. Level:</label><br>
                <input type="radio" name="item_location" value="1" required>1<br>
                <input type="radio" name="item_location" value="2">2<br>
                <input type="radio" name="item_location" value="3">3<br>
                <input type="radio" name="item_location" value="4">4
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name = "add_item" value = "Add" >
      </div>
    </div>
  </div>
</div>
</form>
        <?php
       
        
    }    
        ?>
            <?php
        }
    }

    
    else
    {
        ?>
            <tr>
                <td colspan="4">No item Found</td>
            </tr>
        <?php
    }

?>

// <?php
    
    
    