<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

    <div class="addb">

    
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


        <!-- addbutton  add data-bs- version solution: https://stackoverflow.com/a/56461232/22155977-->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->

    <?php include('build_table_form.php'); ?>

<?php include("footer.php");?>