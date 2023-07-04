<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

    <div class="addb">
    <h2> Shelf A </h2>
    <button class = "btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Item</button>
    <!-- display query result -->
    <?php if(isset($_GET['message'])){    
            echo "<h5>".$_GET['message']."</h5>";
        }
        ?>
    
    <?php if(isset($_GET['error'])){    
            echo "<h4>".$_GET['error']."</h4>";
        }
        ?>
    
    <?php if(isset($_GET['delete_message'])){    
            echo "<h5>".$_GET['delete_message']."</h5>";
        }
        ?>
    <?php if(isset($_GET['update_message'])){    
            echo "<h5>".$_GET['update_message']."</h5>";
        }
        ?>
    </div>
    <!-- <br style="line-height:10px;"> -->
    <h5></h5>
        <table class = "table table-hover table-bordered table-striped">   
            <thead>
                <tr> 
                    <th>Id</th>
                    <th>name</th>
                    <th>quantity</th>
                    <th>location</th>
                    <th>division</th>
                    <th>code</th>
                    <th>Update</th>
                    <th>Delete</th>
                

                </tr> 
            </thead>

            <tbody>
                <?php

                //using the SELECT query style `table` 
                $query = "SELECT * FROM `inventory`";
                
                //hold the database
                $result = mysqli_query($connection,$query);
                
                // check if the connection works
                if(!$result){
                    die("query Failed".mysqli_error($connection));
                }
                else{
                    // print_r($result);
                    
                    //fetch each row        
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td> <?php echo $row['id'] ?> </td>
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo $row['quantity'] ?> </td>
                            <td> <?php echo $row['location'] ?> </td>
                            <td> <?php echo $row['division'] ?> </td>
                            <td> <?php echo $row['code'] ?> </td>
                            <td> <a href="update_item.php?id=<?php echo $row['id'] ?>" class = "btn btn-success">Update</a>
                            <td> <a href="delete_item.php?id=<?php echo $row['id'] ?>&name= <?php echo $row['name'] ?>" class = "btn btn-danger">Delete</a>

                        </tr>
                    
                        <?php
                    }
                    
                    // while($row = mysqli_fetch_assoc($result)){
                    
                    //     echo "<tr><td>" . $row["name"] . "</td><td>" . $row["quantity"] . "</td></tr>";
                    // }
                }
                ?>
            
            </tbody>

        </table>


        <!-- addbutton  add data-bs- version solution: https://stackoverflow.com/a/56461232/22155977-->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
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
      <div class="modal-body">
            <div class = "form-group"> 
                <label for="item_id">1. Id:</label><br>
                <input type="text" name = "item_id" class = "form-control" required>
                <label for="item_name">2. Name:</label><br>
                <input type="text" name = "item_name" class = "form-control" required>
                <br><label for="item_quantity">3. Quantity:</label>
                <input type="number" name = "item_quantity" class = "form-control" value="1" required>
                <br><label for="item_location">4. Level:</label><br>
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


<?php include("footer.php");?>