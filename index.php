<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>
<?php date_default_timezone_set('America/Toronto'); 
session_start();
$_SESSION["current_page"] = "index.php";?>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>

<!-- Search bar -->
<form action="" method="GET">
    <div id = "searchbar" class="input-group mb-3">
        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search Inventory">
        <button type="submit" class="btn btn-primary btn-block">Search</button>
        <!-- Note: No requirement (required) for filling in the bar: easy to get all item. -->
    </div>
</form>

<!-- Note: Giving each division a different page makes search function easy to apply -->
<div class = "division">
    <a href = "index.php"> <button name = "ALL" class="btn btn-light" >ALL</button> </a>
    <a href = "DNS_page.php"> <button name = "ALL" class="btn btn-light" >DNS</button> </a>
    <a href = "PCS_page.php"> <button name = "PCS" class="btn btn-light" >PCS</button> </a>
    <a href = "ITM_page.php"> <button name = "ITM" class="btn btn-light" >ITM</button> </a>
</div>

<div id = "export">
    <form method="post" action="export.php" style = "text-align:center">  
        <input type="submit" name="export" value="Export Inventory Database" class="btn btn-success" />  
    </form>
</div>

<div id = "logs">
    <a href = "log_page.php">
        <button style = "text-align: left; background-color: transparent; color: black; font-size: 25px;border: none;text-decoration:underline;"> Logs </button>
    </a>
</div>

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
                    // Note: using the SELECT query style `table` #Order by Shelf is used in downloading the data
                    $query = "SELECT * FROM `inventory` WHERE `shelf` = '$shelf' ORDER BY `shelf`,`level`,`zone`,`depth` ";
                }

                // Search bar used: filter based on query
                else{
                    $val = $_GET['search'];
                    $query = "SELECT * FROM `inventory` WHERE `shelf` = '$shelf' AND CONCAT(`part_number`,`serial_number`,`name`) LIKE '%$val%' ORDER BY `shelf`,`level`,`zone`,`depth`";
                }
                $_SESSION["sql"] = "$query";

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

                            <!-- Note: Design choice: Putting the three action buttons first can reduce scrolling for mobile users. -->
                            <div id = "each<?php echo $row['serial_number'] ?>">
                            <tr>
                                <td><a href="update_item.php?serial_number=<?php echo $row['serial_number']; ?>" class = "btn btn-success">Update</a>
                                <!-- Note: Design choice: Once the audit button is clicked: 1. The button will be replaced with a check mark. 2. Date for last audited will be updated in the database (but it won be displayed until reloading the page.) -->
                                <td><input type="button" id="<?php echo $row['serial_number']; ?>" value="&#10003;" style="display:none" class = "btn btn-success">  <button type="button" name="button" id = "audit" onclick = "style.display = 'none';document.getElementById('<?php echo $row['serial_number']; ?>').style.display = 'block';audit_item('<?php echo $row['serial_number']; ?>','<?php echo $row['name']; ?>');" class = "btn btn-success">Audit</button></td>
                                <td><a href="delete_item.php?serial_number=<?php echo $row['serial_number'] ?>&name= <?php echo $row['name'] ?>" onclick = "document.getElementById('each<?php echo $row['serial_number']; ?>').style.display = 'none';" class = "btn btn-danger">Delete</a>
                                <td><?php echo $row['part_number'] ?></td>
                                <td><?php echo $row['serial_number'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $row['division'] ?></td>
                                <td><?php echo $row['shelf']."-".$row['level']."-".$row['zone']."-".$row['depth']?></td>
                                <td><?php echo $row['last_audited'] ?></td> 
                                <td><?php echo $row['creation_time'] ?></td> 
                                <td><?php echo $row['last_edited'] ?></td> 
                                <td><?php echo $row['note'] ?></td>   
                            </tr> 
                            </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <tr>
                            <td colspan="13">No Record Found</td>
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

<!-- audit item -->
<!-- Note: it is different from update and delete button, 
the page won't be refreshed. The display of the actual 
updated last_audited date will be deleyed until next refresh,
and the responsive audit button is enough for user to
acknowledge the change  -->
<script type="text/javascript">
    // Function
    function audit_item(id,name){
        $(document).ready(function(){
            $.ajax({
            // Action
            url: 'audit_item.php',
            // Method
            type: 'POST',
            data: {
                // Get value
                serial_number: id,
                name:name,
                action: "audit"
            },
            success:function(response){

                // Response is the output of action file
                if(response == 1){
                // Response is already covered in onclick event of the audit button.
                // alert("Item Audited");
                // $('div').html('<div id = "my-app"> <h1>Audited</h1> </div>');
                
                }

                else if(response == 0){
                alert("item cannot Be Audited");
                }
            }
            });
        });
    }
</script>

<?php include("footer.php");?>


