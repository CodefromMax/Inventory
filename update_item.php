<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php ini_set('display_errors', 1); error_reporting(-1);?>

<?php date_default_timezone_set('America/Toronto'); ?>


<?php if (isset($_GET['serial_number'])){
    
    $serial_number = $_GET['serial_number'];
    
    //using the SELECT query style `table` 
    $query = "SELECT * FROM `inventory` WHERE `serial_number` = '$serial_number'";
                
    //hold the database
    $result = mysqli_query($connection,$query);
    
    // check if the connection works
    if(!$result){
        die("query Failed".mysqli_error($connection));
    }
    else{
        // print_r($result);
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
    }
}
?>

<?php if(isset($_POST['update_item'])){

    if (isset($_GET['serial_number_new'])){
    $serial_number = $_GET['serial_number_new'];
    $name = $_POST['item_name'];
    $quantity = $_POST['item_quantity'];
    $shelf = $_POST['item_shelf'];
    $level = $_POST['item_level'];
    $zone = $_POST['item_zone'];
    $depth = $_POST['item_depth'];
    $last_edited = date('Y-m-d h:i a', time());
    $note = $_POST['item_note'];
    
    $query = "UPDATE `inventory` SET `name` = '$name', `quantity` = '$quantity', `shelf` = '$shelf', `level` = '$level', `zone` = '$zone',`depth` = '$depth',`last_edited` = '$last_edited', `note` = '$note' WHERE `serial_number` = '$serial_number'";
    
    $result = mysqli_query($connection, $query);
    // try{
    //     $result = mysqli_query($connection, $query);
    // } catch (Throwable $exception) { //Use Throwable to catch both errors and exceptions
    //     // header('HTTP/1.1 500 Internal Server Error'); //Tell the browser this is a 500 error
    //     header("level:index.php?error= Error 500: Failed to add.($serial_number , $name) Please check the uniqueness of the serial_number.");
    // }
    // $result = mysqli_query($connection, $query);
    // $mysqli -> close();

    if (!$result){
        
        // header("level:index.php?message= check the uniqueness of the serial_number.");
        die("Failed to insert data.");
    }
    else {
        $date = date('Y-m-d h:i a', time());
        $log_date = date('Y-m-d h:i:s a', time());
        $query = "INSERT INTO `Logs`(`date`, `action`, `person`, `Note`) VALUES ('$log_date','Updated ($serial_number , $name)','Admin','')";
        $result = mysqli_query($connection,$query);
        header("location:index.php?update_message= Updated: ($serial_number , $name) ($date) .");

    }
}
}
?>
<form action="update_item.php?serial_number_new=<?php echo $row['serial_number'] ?>" method = "post">
    <div class = "form-group"> 
        <label for="item_part_number">1.Immutable Part Number:</label><br>
        <!-- <input type="text" name = "item_serial_number" class = "form-control"  value = "<?php echo $row['serial_number']?>"> -->
        <p> <?php echo $row['part_number']?> </p>
        <label for="item_serial_number">2.Immutable Serial Number:</label><br>
        <!-- <input type="text" name = "item_serial_number" class = "form-control"  value = "<?php echo $row['serial_number']?>"> -->
        <p> <?php echo $row['serial_number']?> </p>
        <label for="item_name">3. Name:</label><br>
        <input type="text" name = "item_name" class = "form-control" required value = "<?php echo $row['name']?>">
        <br><label for="item_quantity">4. Quantity:</label>
        <input type="number" name = "item_quantity" class = "form-control"required value = "<?php echo $row['quantity']?>">
        <br><label for="item_shelf">5. Shelf:</label><br>
        <input type="radio" name="item_shelf" value="A" required style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'A') echo 'checked'; ?>>A  
        <input type="radio" name="item_shelf" value="B" style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'B') echo 'checked'; ?>>B  
        <input type="radio" name="item_shelf" value="C" style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'C') echo 'checked'; ?>>C  
        <input type="radio" name="item_shelf" value="D" style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'D') echo 'checked'; ?>>D  
        <input type="radio" name="item_shelf" value="E" style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'E') echo 'checked'; ?>>E  
        <input type="radio" name="item_shelf" value="F" style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'F') echo 'checked'; ?>>F  

        <br><br><label for="item_level">6. Level:</label><br>
        <input type="radio" name="item_level" value="1" <?php if ($row['level'] == '1') echo 'checked="checked"'; ?> required>1
        <input type="radio" name="item_level" value="2" <?php if ($row['level'] == '2') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">2
        <input type="radio" name="item_level" value="3" <?php if ($row['level'] == '3') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">3
        <input type="radio" name="item_level" value="4" <?php if ($row['level'] == '4') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">4
    
    
        <br><br>
        <label for="item_zone">7. Zone:</label><br>
        <input type="radio" name="item_zone" value="Left" <?php if ($row['zone'] == 'Left') echo 'checked="checked"'; ?> required style="margin-left: 10px; margin-right: 5px">Left
        <input type="radio" name="item_zone" value="Middle" <?php if ($row['zone'] == 'Middle') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">Middle
        <input type="radio" name="item_zone" value="Right" <?php if ($row['zone'] == 'Right') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">Right
        <br><br>
        <label for="item_depth">8. Depth:</label><br>
        <input type="radio" name="item_depth" value="1" <?php if ($row['depth'] == '1') echo 'checked="checked"'; ?> required style="margin-left: 10px; margin-right: 5px">1 (Surface)
        <input type="radio" name="item_depth" value="2" <?php if ($row['depth'] == '2') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">2
        <input type="radio" name="item_depth" value="3" <?php if ($row['depth'] == '3') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">3
        <input type="radio" name="item_depth" value="4" <?php if ($row['depth'] == '4') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">4
        <input type="radio" name="item_depth" value="5" <?php if ($row['depth'] == '5') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">5  (Deepest)
        <br><br>
        <label for="item_note">9. Note:</label><br>
        <input type="text" name = "item_note" class = "form-control" value = "<?php echo $row['note']?>" >
    
    </div>
    <br><input type="submit" class="btn btn-success" name = "update_item" value = "Update" >

</form>


<?php include("footer.php");?>