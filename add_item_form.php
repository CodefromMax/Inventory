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
            <label for="item_part_number">1. Part Number:</label><br>
            <input type="text" name = "item_part_number" class = "form-control" required>
            <br>
            <label for="item_serial_number">2. Serial Number:</label><br>
            <input type="text" name = "item_serial_number" class = "form-control" required>
            <br>
            <label for="item_name">3. Name:</label><br>
            <!-- <input type="text" name = "item_name" class = "form-control" required> -->
            <input list="brow" >
            <datalist id="brow" name = "item_name" required>
              <option value="Quick Panel">
              <option value="R">
              <option value="Chrome">
              <option value="Opera">
              <option value="Safari">
            </datalist>  
          
            <br><br>
            <label for="item_quantity">4. Quantity:</label>
            <input type="number" name = "item_quantity" class = "form-control" value="1" required>
            <br>
            <label for="item_shelf">5. Shelf:</label><br>    
            <input type="radio" name="item_shelf" value="A" required style="margin-left: 10px; margin-right: 5px">A  
            <input type="radio" name="item_shelf" value="B" style="margin-left: 10px; margin-right: 5px">B  
            <input type="radio" name="item_shelf" value="C" style="margin-left: 10px; margin-right: 5px">C  
            <input type="radio" name="item_shelf" value="D" style="margin-left: 10px; margin-right: 5px">D  
            <input type="radio" name="item_shelf" value="E" style="margin-left: 10px; margin-right: 5px">E  
            <input type="radio" name="item_shelf" value="F" style="margin-left: 10px; margin-right: 5px">F  
            <br>
            <label for="item_level">6. Level:</label><br>
            <input type="radio" name="item_level" value="1" required style="margin-left: 10px; margin-right: 5px">1 (Top)
            <input type="radio" name="item_level" value="2" style="margin-left: 10px; margin-right: 5px">2
            <input type="radio" name="item_level" value="3" style="margin-left: 10px; margin-right: 5px">3
            <input type="radio" name="item_level" value="4" style="margin-left: 10px; margin-right: 5px">4
            
            <br>
            <label for="item_zone">7. Zone:</label><br>
            <input type="radio" name="item_zone" value="Left" required style="margin-left: 10px; margin-right: 5px">Left
            <input type="radio" name="item_zone" value="Middle" style="margin-left: 10px; margin-right: 5px">Middle
            <input type="radio" name="item_zone" value="Right" style="margin-left: 10px; margin-right: 5px">Right
            <br>
            <label for="item_depth">8. Depth:</label><br>
            <input type="radio" name="item_depth" value="1" required style="margin-left: 10px; margin-right: 5px">1 (Surface)
            <input type="radio" name="item_depth" value="2" style="margin-left: 10px; margin-right: 5px">2
            <input type="radio" name="item_depth" value="3" style="margin-left: 10px; margin-right: 5px">3
            <input type="radio" name="item_depth" value="4" style="margin-left: 10px; margin-right: 5px">4
            <input type="radio" name="item_depth" value="5" style="margin-left: 10px; margin-right: 5px">5  (Deepest)
            <br>
            <label for="item_note">9. Note:</label><br>
            <input type="text" name = "item_note" class = "form-control" >
            
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