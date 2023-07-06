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

        <div class="modal-body">
          <div class = "form-group"> 
            <label for="item_id">1. Id:</label><br>
            <input type="text" name = "item_id" class = "form-control" required>
            <label for="item_name">2. Name:</label><br>
            <input type="text" name = "item_name" class = "form-control" required>
            <br><label for="item_quantity">3. Quantity:</label>
            <input type="number" name = "item_quantity" class = "form-control" value="1" required>
            <br><label for="item_shelf">4. Shelf:</label><br>    
            <input type="radio" name="item_shelf" value="A" required style="margin-left: 10px; margin-right: 5px">A  
            <input type="radio" name="item_shelf" value="B" style="margin-left: 10px; margin-right: 5px">B  
            <input type="radio" name="item_shelf" value="C" style="margin-left: 10px; margin-right: 5px">C  
            <input type="radio" name="item_shelf" value="D" style="margin-left: 10px; margin-right: 5px">D  
            <input type="radio" name="item_shelf" value="E" style="margin-left: 10px; margin-right: 5px">E  
            <input type="radio" name="item_shelf" value="F" style="margin-left: 10px; margin-right: 5px">F  
            <br><br>
            <label for="item_location">5. Level:</label><br>
            <input type="radio" name="item_location" value="1" required style="margin-left: 10px; margin-right: 5px">1
            <input type="radio" name="item_location" value="2" style="margin-left: 10px; margin-right: 5px">2
            <input type="radio" name="item_location" value="3" style="margin-left: 10px; margin-right: 5px">3
            <input type="radio" name="item_location" value="4" style="margin-left: 10px; margin-right: 5px">4
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