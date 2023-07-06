<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>
<? declare(strict_types=1); ?>
<!-- <div id="dynamic_island">
  <a href="#A">A</a>
  <a href="#B">B</a>
  <a href="#C">C</a>
</div> -->
<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<style>
/* body {
  margin: 0;
  font-size: 28px;
  font-family: Arial, Helvetica, sans-serif;
} */

#dynamic_island {
  overflow: hidden;
  background-color: #63686e ;
}

#dynamic_island a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 30px;
  text-decoration: none;
  font-size: 20px;
  font-weight: 500;
  /* display:inline; */
  /* display: inline-block; */
  /* justify-content: space-between; */
  /* width: 30%; */
}

#dynamic_island h5 {
  float: left;
  display: block;
  color:green;
  text-align: left;
  padding: 10px 10px;
  /* text-decoration: none; */ 
  font-size: 25px;
  font-weight: 500;
  background-color: #fff;
  width: 100%;
  /* border-radius: 10px;  */
}
#dynamic_island button {
  float: left;
  /* display: block; */
  /* color: #4f5b66; */
  text-align: left;
  padding: 10px 10px;
  text-decoration: underline; 
  font-size: 25px;
  font-weight: 500;
  /* background-color: #fff; */
  width: 100%;
  /* border-radius: 12px;  */
}
#dynamic_island h4 {
  float: left;
  display: block;
  color:red;
  text-align: left;
  /* padding: 14px 16px; */
  /* text-decoration: none; */
  font-size: 25px;
  font-weight: 500;
  background-color: #fff;
  width: 100%;
  /* border-radius: 10px;  */
}

#dynamic_island a:hover {
  background-color: #ddd;
  color: black;
}

#dynamic_island a.active {
  background-color: #04AA6D;
  color: white;
}

/* .content {
  padding: 16px;
} */
html {
    scroll-behavior: smooth;
    /* padding-top: 60px; */
    /* padding-top:300px； */
  scroll-padding-top: 300px;
  /* scroll-padding-top: calc(var(--sticky-bar-height) + 100px); */
}

.sticky {
  position: fixed;
  top: 0%;
  width: 100%;
  /* padding-top: 60px; */
 
}

/* .sticky + .content {
  padding-top: 60px;
} */
</style>





<div id="dynamic_island">
<button class = "btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Item</button>
<br>
<?php if(isset($_GET['message'])){    
            echo "<h5>"."Message: ".$_GET['message']."</h5>";
        }
        ?>
    
    <?php if(isset($_GET['error'])){    
            echo "<h4>"."Message: ".$_GET['error']."</h4>";
        }
        ?>
    
    <?php if(isset($_GET['delete_message'])){    
            echo "<h5>"."Message: ".$_GET['delete_message']."</h5>";
        }
        ?>
    <?php if(isset($_GET['update_message'])){    
            echo "<h5>"."Message: ".$_GET['update_message']."</h5>";
        }
        ?><br>
  <a href="#Aanchor">A</a>
  <a href="#Banchor">B</a>
  <a href="#Canchor">C</a>
  <a href="#Danchor">D</a>
  <a href="#Eanchor">E</a>
  <a href="#Fanchor">F</a>
  <a href="#Ganchor">G</a>
</div>


<script>
window.onscroll = function() {myFunction()};

var dynamic_island = document.getElementById("dynamic_island");
var sticky = dynamic_island.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    dynamic_island.classList.add("sticky")
  } else {
    dynamic_island.classList.remove("sticky");
  }
}
</script>

<br>

<!-- 
<div class="message">
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
</div> -->

<!-- <script>
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the dynamic_island
var dynamic_island = document.getElementById("dynamic_island");

// Get the offset position of the dynamic_island
var sticky = dynamic_island.offsetTop;

// Add the sticky class to the dynamic_island when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    dynamic_island.classList.add("sticky")
  } else {
    dynamic_island.classList.remove("sticky");
  }
}
</script> -->

    <a name = "afterbar">
    <?php
    $array = array("A", "B", "C", "D", "E", "F", "G"); 
    
    foreach ($array as $shelf) {
        ?>

        <div class="<?php echo $shelf ?>">
        <a name = "<?php echo $shelf."anchor" ?>">
        <?php
        echo "<h2>". $shelf. "</h2>";
        include('build_table_starter.php');
        echo "<tbody>";

        //using the SELECT query style `table` 
        $query = "SELECT * FROM `inventory` WHERE `shelf` = '$shelf' ";

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
                        <td> <?php echo $row['shelf'] ?> </td>
                        <td> <?php echo $row['location'] ?> </td>
                        <td> <?php echo $row['division'] ?> </td>
                        <td> <a href="update_item.php?id=<?php echo $row['id'] ?>" class = "btn btn-success">Update</a>
                        <td> <a href="delete_item.php?id=<?php echo $row['id'] ?>&name= <?php echo $row['name'] ?>" class = "btn btn-danger">Delete</a>

                    </tr>
                
                    <?php
                
            }
        }
        
        echo "</tbody>";

        echo "</table>"; 
        
        
        // include('build_table_form.php');
        ?>
         <!-- <p><?php echo $shelf ?></p> -->
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
      <!-- <p><?php echo $shelf ?></p> -->
      <div class="modal-body">
            <div class = "form-group"> 
                <label for="item_id">1. Id:</label><br>
                <input type="text" name = "item_id" class = "form-control" required>
                <label for="item_name">2. Name:</label><br>
                <input type="text" name = "item_name" class = "form-control" required>
                <br><label for="item_quantity">3. Quantity:</label>
                <input type="number" name = "item_quantity" class = "form-control" value="1" required>
                <br><label for="item_shelf">4. Shelf:</label>
               
                <!-- <input type="text" name = "item_shelf" class = "form-control" value= <?php echo $shelf ?> > -->
                <select name="item_shelf" id="item_shelf">
                    <option value="A" <?php if ($shelf == 'A') echo 'selected'; ?>>A</option>
                    <option value="B" <?php if ($shelf == 'B') echo 'selected'; ?>>B</option>
                    <option value="C" <?php if ($shelf == 'C') echo 'selected'; ?>>C</option>
                    <option value="D" <?php if ($shelf == 'D') echo 'selected'; ?>>D</option>
                    <option value="E" <?php if ($shelf == 'E') echo 'selected'; ?>>E</option>
                    <option value="F" <?php if ($shelf == 'F') echo 'selected'; ?>>F</option>
                    <option value="G" <?php if ($shelf == 'G') echo 'selected'; ?>>G</option>
                </select>
                <br>
                <br><label for="item_location">5. Level:</label><br>
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
        <?php
       
        
    }    
        ?>
    
    
        


    
<?php include("footer.php");?>


