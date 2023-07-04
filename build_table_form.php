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
                <br><label for="item_location">4. Level:</label><br>
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