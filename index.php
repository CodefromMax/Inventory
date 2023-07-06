<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>
<? declare(strict_types=1); ?>


<!-- Search bar -->
<form action="" method="GET">
    <div id = "searchbar" class="input-group mb-3">
        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search Inventory">
        <button type="submit" class="btn btn-primary btn-block">Search</button>
        <!-- Note: No requirement (required) for filling in the bar: easy to get all item. -->
    </div>
</form>


<!-- Dynamic Island: Sticky Navigation bar upon scrolling -->
<div id="dynamic_island">
    
    <!-- Add item button -->
    <button class = "btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Item</button>
    
    <!-- Display the last action (Gathered from Add & Update & Delete) -->
    <?php 
        if(isset($_GET['add_message'])){    
            echo "<h5>"."Log:".$_GET['add_message']."</h5>";
        }
    
        if(isset($_GET['error'])){    
            echo "<h4>"."Log:".$_GET['error']."</h4>";
        }

        if(isset($_GET['delete_message'])){    
            echo "<h5>"."Log:".$_GET['delete_message']."</h5>";
        }

        if(isset($_GET['update_message'])){    
            echo "<h5>"."Log:".$_GET['update_message']."</h5>";
        }
    ?>

    <br>

    <!-- Navigation buttons -->
    <a href="#searchbar">Top</a>
    <a href="#Aanchor">A</a>
    <a href="#Banchor">B</a>
    <a href="#Canchor">C</a>
    <a href="#Danchor">D</a>
    <a href="#Eanchor">E</a>
    <a href="#Fanchor">F</a>

</div>
<br>

<!-- Function for the Navigation bar -->
<script src="sticky_bar.js"></script>

<!-- Link for Navigation button -->
<a name = "afterbar">
<!-- Loop through shelf list -->
<?php

    $shelf_list = array("A", "B", "C", "D", "E", "F"); 

    foreach ($shelf_list as $shelf) {
        ?>

        <!-- Note: Required for style -->
        <div class="<?php echo $shelf ?>">
        
            <!-- Create shelf anchors for Navigation bar -->
            <a name = "<?php echo $shelf."anchor" ?>">
            
            <?php
                
                // HTML for table header
                include('build_table_starter.php');


                // Connect MySQL Database to display
                // No Search query: Display all
                if(!isset($_GET['search'])){
                    // Note: using the SELECT query style `table` 
                    $query = "SELECT * FROM `inventory` WHERE `shelf` = '$shelf' ";
                }

                // Search bar used: filter based on query
                else{
                    $val = $_GET['search'];
                    $query = "SELECT * FROM inventory WHERE CONCAT(`id`,`name`) LIKE '$val%' AND `shelf` = '$shelf' ";
                }

                // hold the database
                $result = mysqli_query($connection,$query);

                // check if the connection works
                if(!$result){
                    die("query Failed".mysqli_error($connection));
                }

                else{
                    // Shelf is not empty
                    if(mysqli_num_rows($result) > 0){

                        //fetch each item       
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <!-- Note: Putting the two actions first can reduce scrolling for mobile users. -->
                            <tr>
                                <td><a href="update_item.php?id=<?php echo $row['id'] ?>" class = "btn btn-success">Update</a>
                                <td><a href="delete_item.php?id=<?php echo $row['id'] ?>&name= <?php echo $row['name'] ?>" class = "btn btn-danger">Delete</a>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $row['shelf'] ?></td>
                                <td><?php echo $row['location'] ?></td>
                                <td><?php echo $row['division'] ?></td>       
                            </tr> 
                            <?php
                            
                        }
                    }
                    else{
                        ?>
                        <tr>
                        <td colspan="10">No Record Found</td>
                        </tr>
                        <?php
                    }
                }    
                echo "</tbody>";

                echo "</table>"; 
                
                // Update form
                include('add_item_form.php');
        

               

    }
    echo "</div>";     
?>
</div>

<?php include("footer.php");?>


