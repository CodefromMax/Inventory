<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

    


    <?php
    $array = array("Shelf A","Shelf B", "Shelf C","Shelf D");
    
    foreach ($array as $shelf) {
        ?>
        <div class="addb">
        <?php
        echo "<h2>". $shelf. "</h2>";
        include('build_table_step1.php');
        echo "<tbody>";

        //using the SELECT query style `table` 
        $query = "SELECT * FROM `inventory`";

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
                        <td> <?php echo $row['location'] ?> </td>
                        <td> <?php echo $row['division'] ?> </td>
                        <td> <?php echo $row['code'] ?> </td>
                        <td> <a href="update_item.php?id=<?php echo $row['id'] ?>" class = "btn btn-success">Update</a>
                        <td> <a href="delete_item.php?id=<?php echo $row['id'] ?>&name= <?php echo $row['name'] ?>" class = "btn btn-danger">Delete</a>

                    </tr>
                
                    <?php
                
            }
        }
        
        echo "</tbody>";

        echo "</table>"; 
        
        
        include('build_table_form.php');
        ?>

        <?php
       
        
    }    
        ?>
    
    
        



<?php include("footer.php");?>


