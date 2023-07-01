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
    $location = $_POST['item_location'];

    $query = "UPDATE `inventory` SET `name` = '$name', `quantity` = '$quantity', `location` = '$location' WHERE `id` = '$id'";
    
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
        header("location:index.php?update_message= Updated item: ($id , $name)  .");

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
        <br><label for="item_location">4. Level:</label><br>
        <input type="radio" name="item_location" value="1" <?php if ($row['location'] == '1') echo 'checked="checked"'; ?> required>1<br>
        <input type="radio" name="item_location" value="2" <?php if ($row['location'] == '2') echo 'checked="checked"'; ?>>2<br>
        <input type="radio" name="item_location" value="3" <?php if ($row['location'] == '3') echo 'checked="checked"'; ?>>3<br>
        <input type="radio" name="item_location" value="4" <?php if ($row['location'] == '4') echo 'checked="checked"'; ?>>4
    </div>
    <input type="submit" class="btn btn-success" name = "update_item" value = "Update" >

</form>


<?php include("footer.php");?>