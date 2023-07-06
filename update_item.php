<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>

<?php ini_set('display_errors', 1); error_reporting(-1);?>


<?php if (isset($_GET['id'])){
    $id = $_GET['id'];
    
    //using the SELECT query style `table` 
    $query = "SELECT * FROM `inventory` WHERE `id` = '$id'";
                
    //hold the database
    $result = mysqli_query($connection,$query);
    
    // check if the connection works
    if(!$result){
        die("query Failed".mysqli_error($connection));
    }
    else{
        // print_r($result);
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<?php if(isset($_POST['update_item'])){

    if (isset($_GET['id_new'])){
    $id = $_GET['id_new'];
    // $id = $_POST['id_new'];
    $name = $_POST['item_name'];
    $quantity = $_POST['item_quantity'];
    $shelf = $_POST['item_shelf'];
    $location = $_POST['item_location'];

    $query = "UPDATE `inventory` SET `name` = '$name', `quantity` = '$quantity', `shelf` = '$shelf', `location` = '$location' WHERE `id` = '$id'";
    
    $result = mysqli_query($connection, $query);
    // try{
    //     $result = mysqli_query($connection, $query);
    // } catch (Throwable $exception) { //Use Throwable to catch both errors and exceptions
    //     // header('HTTP/1.1 500 Internal Server Error'); //Tell the browser this is a 500 error
    //     header("location:index.php?error= Error 500: Failed to add.($id , $name) Please check the uniqueness of the id.");
    // }
    // $result = mysqli_query($connection, $query);
    // $mysqli -> close();
    if (!$result){
        
        // header("location:index.php?message= check the uniqueness of the id.");
        die("Failed to insert data.");
    }
    else {
        $date = date('Y-m-d h:i', time());
        header("location:index.php?update_message= Updated: ($id , $name) ($date) .");

    }
}
}
?>
<form action="update_item.php?id_new=<?php echo $row['id'] ?>" method = "post">
    <div class = "form-group"> 
        <label for="item_id">1.Immutable Id:</label><br>
        <!-- <input type="text" name = "item_id" class = "form-control"  value = "<?php echo $row['id']?>"> -->
        <p> <?php echo $row['id']?> </p>
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