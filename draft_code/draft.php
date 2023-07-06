<h2> Shelf A </h2>
    <?php include('build_table_step1.php'); ?>
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
            }
            ?>
            
            </tbody>

        </table>















































// echo "<tr>";
        // echo "<td>".$row['id']."</td>";
        // echo "<td>".$row['name']."</td>";
        // echo "<td>".$row['quantity']. "</td>";
        // echo "<td>".$row['location']. "</td>";
        // echo "<td>".$row['division']. " </td>";
        // echo "<td>".$row['code']. "</td>";
        // echo "<td>". <a href=update_item.php?id= $row['id'] class = "btn btn-success">Update</a>';
        // echo "<td>". <a href="delete_item.php?id=<?php echo $row['id'] ?>&name= <?php echo $row['name'] ?>" class = "btn btn-danger">Delete</a>

        </tr>
    
        <?php

echo "</tbody>";

        echo "</table>"; 
        
        ?>




<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

    <div class="addb">


    <?php
    $array = array("Shelf A","Shelf B");
    // $array = array("Shelf A");
    // foreach ($array as $shelf) {
    //     echo "<h2>". $shelf. "</h2>";}
    foreach ($array as $shelf) {
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

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <?php
       
        
    }    
        ?>


<?php include("footer.php");?>

<!-- select shelf for Update -->
                <!-- <input type="text" name = "item_shelf" class = "form-control" value= <?php echo $shelf ?> >
                <select name="item_shelf" id="item_shelf">
                    <option value="A" <?php if ($row['shelf'] == 'A') echo 'selected'; ?>>A</option>
                    <option value="B" <?php if ($row['shelf'] == 'B') echo 'selected'; ?>>B</option>
                    <option value="C" <?php if ($row['shelf'] == 'C') echo 'selected'; ?>>C</option>
                    <option value="D" <?php if ($row['shelf'] == 'D') echo 'selected'; ?>>D</option>
                    <option value="E" <?php if ($row['shelf'] == 'E') echo 'selected'; ?>>E</option>
                    <option value="F" <?php if ($row['shelf'] == 'F') echo 'selected'; ?>>F</option>
                    <option value="G" <?php if ($row['shelf'] == 'G') echo 'selected'; ?>>G</option>
                </select>
         -->