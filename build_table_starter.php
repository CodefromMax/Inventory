<button class = "btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Item</button>
    <!-- display query result -->
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
    </div>
    <!-- <br style="line-height:10px;"> -->
    <h5></h5>
        <table class = "table table-hover table-bordered table-striped">   
            <thead>
                <tr> 
                    <th>Id</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Shelf</th>
                    <th>Level</th>
                    <th>Division</th>
                    <th>Update</th>
                    <th>Delete</th>
                

                </tr> 
            </thead>
