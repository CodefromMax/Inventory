<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php ini_set('display_errors', 1); error_reporting(-1);?>


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
        echo $row;
    }
}
?>

<?php if(isset($_POST['update_item'])){

    if (isset($_GET['serial_number_new'])){
    $serial_number = $_GET['serial_number_new'];
    // $serial_number = $_POST['serial_number_new'];
    $name = $_POST['item_name'];
    $quantity = $_POST['item_quantity'];
    $shelf = $_POST['item_shelf'];
    $level = $_POST['item_level'];
    $level = $_POST['item_zone'];
    $level = $_POST['item_depth'];
    $last_edited = date('Y-m-d h:i', time());


    $part_number = $_POST['item_part_number'];
    $serial_number = $_POST['item_serial_number'];
    $name = $_POST['item_name'];
    $quantity = $_POST['item_quantity'];
    $shelf = $_POST['item_shelf'];
    $level = $_POST['item_level'];
    $zone = $_POST['item_zone'];
    $depth = $_POST['item_depth'];
    $last_edited = date('Y-m-d h:i', time());
    $note = $_POST['item_note'];
    // UPDATE `inventory` SET `name`='[value-3]',`quantity`='[value-4]',`shelf`='[value-5]',`level`='[value-6]',`zone`='[value-7]',`depth`='[value-8]',`last_edited`='[value-10]',`note`='[value-11]' WHERE 1
    $query = "UPDATE `inventory` SET `name` = '$name', `quantity` = '$quantity', `shelf` = '$shelf', `location` = '$location', `last_edited` = '$last_edited' WHERE `serial_number` = '$serial_number'";
    
    $result = mysqli_query($connection, $query);
    // try{
    //     $result = mysqli_query($connection, $query);
    // } catch (Throwable $exception) { //Use Throwable to catch both errors and exceptions
    //     // header('HTTP/1.1 500 Internal Server Error'); //Tell the browser this is a 500 error
    //     header("location:index.php?error= Error 500: Failed to add.($serial_number , $name) Please check the uniqueness of the serial_number.");
    // }
    // $result = mysqli_query($connection, $query);
    // $mysqli -> close();
    if (!$result){
        
        // header("location:index.php?message= check the uniqueness of the serial_number.");
        die("Failed to insert data.");
    }
    else {
        $date = date('Y-m-d h:i', time());
        header("location:index.php?update_message= Updated: ($serial_number , $name) ($date) .");

    }
}
}
?>
<form action="update_item.php?serial_number_new=<?php echo $row['serial_number'] ?>" method = "post">
    <div class = "form-group"> 
        <label for="item_serial_number">1.Immutable serial_number:</label><br>
        <!-- <input type="text" name = "item_serial_number" class = "form-control"  value = "<?php echo $row['serial_number']?>"> -->
        <p> <?php echo $row['serial_number']?> </p>
        <label for="item_name">2. Name:</label><br>
        <input type="text" name = "item_name" class = "form-control" required value = "<?php echo $row['name']?>">
        <br><label for="item_quantity">3. Quantity:</label>
        <input type="number" name = "item_quantity" class = "form-control"required value = "<?php echo $row['quantity']?>">
        <br><label for="item_shelf">4. Shelf:</label><br>
        <input type="radio" name="item_shelf" value="A" required style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'A') echo 'checked'; ?>>A  
        <input type="radio" name="item_shelf" value="B" style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'B') echo 'checked'; ?>>B  
        <input type="radio" name="item_shelf" value="C" style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'C') echo 'checked'; ?>>C  
        <input type="radio" name="item_shelf" value="D" style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'D') echo 'checked'; ?>>D  
        <input type="radio" name="item_shelf" value="E" style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'E') echo 'checked'; ?>>E  
        <input type="radio" name="item_shelf" value="F" style="margin-left: 10px; margin-right: 5px" <?php if ($row['shelf'] == 'F') echo 'checked'; ?>>F  

        <br><label for="item_location">5. Level:</label><br>
        <input type="radio" name="item_location" value="1" <?php if ($row['location'] == '1') echo 'checked="checked"'; ?> required>1
        <input type="radio" name="item_location" value="2" <?php if ($row['location'] == '2') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">2
        <input type="radio" name="item_location" value="3" <?php if ($row['location'] == '3') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">3
        <input type="radio" name="item_location" value="4" <?php if ($row['location'] == '4') echo 'checked="checked"'; ?> style="margin-left: 10px; margin-right: 5px">4
    </div>
    <input type="submit" class="btn btn-success" name = "update_item" value = "Update" >

</form>


<?php include("footer.php");?>