<html>  
    <head>  
        <title>Webslesson Demo - Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</title>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>  
    <body>  
        <div class="container">  
            <br />  
            <br />
			<br />
			<div class="table-responsive">  
            <h3 align="center">ITM Inventory</h3>
            <br />

            
            <div id = "export">
                <form method="post" action="ITM_export.php" style = "text-align:center">  
                    <input type="submit" name="export" value="Export Inventory Database" class="btn btn-success" />  
                </form>
            </div>
				<!-- <h3 text-align="center">Back to Tutorial - <a href="http://www.webslesson.info/2016/02/live-table-add-edit-delete-using-ajax-jquery-in-php-mysql.html" title="Live Table Add Edit Delete using Ajax Jquery in PHP Mysql">Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</a></h3><br /> -->
				<!-- <span id="result"></span> -->
				<div id="live_data"></div>                 
			</div>  
		</div>
    </body>  
</html>  
<script>  
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
        var Item_Name = $('#Item_Name').text();  
        var Supplier = $('#Supplier').text();
        var Est_Quantity = $('#Est_Quantity').text(); 
        var Exact_Quantity = $('#Exact_Quantity').text(); 
        var Boxes = $('#Boxes').text(); 
        var Owner_Name = $('#Owner_Name').text(); 
        var Status = $('#Status').text(); 
        var Room = $('#Room').text(); 
        var Section = $('#Section').text(); 
        var Shelf = $('#Shelf').text(); 
        var Level = $('#Level').text(); 
        var Note = $('#Note').text(); 

        check_list = [Item_Name,Status,Room,Section,Shelf,Level];
        
        check_list_string = ["Item Name","Status","Room","Section","Shelf","Level"];
        for (var i = 0; i < check_list.length; i++) {
            var field = check_list[i];

            if (isEmpty(field)) {
                alert(check_list_string[i] + " is empty.");
                break; 
            }
        }
        
        if (isEmpty(Est_Quantity) && isEmpty(Exact_Quantity)){
            alert("Please enter the qunatity in Estimate or in Exact Quantity.");
        }
        function isEmpty(value) {
            return value.trim() === '';
        }

        $.ajax({  
            url:"insert.php",  
            method:"POST",  
            data:
            {
            Item_Name: Item_Name,
            Supplier: Supplier,
            Est_Quantity: Est_Quantity,
            Exact_Quantity: Exact_Quantity,
            Boxes: Boxes,
            Owner_Name: Owner_Name,
            Status: Status,
            Room: Room,
            Section: Section,
            Shelf: Shelf,
            Level: Level,
            Note: Note,
            },  
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"edit.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                alert(data);
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }  

    // when a user clicks on a text input field, 
    // that field gains focus. When the user clicks outside the input field
    //  or presses the Tab key to move to another element, 
    //  the input field loses focus, and the "blur" event is triggered. 
    
    function handleBlur(eventClass, idKey, dataKey) {
        $(document).on('blur', eventClass, function() {
            var id = $(this).data(idKey);
            var data = $(this).text();
            edit_data(id, data, dataKey);
        });}
    handleBlur('.Item_Name', 'id1', 'Item_Name');
    handleBlur('.Supplier', 'id2', 'Supplier');
    handleBlur('.Est_Quantity', 'id3', 'Est_Quantity');
    handleBlur('.Exact_Quantity', 'id4', 'Exact_Quantity');
    handleBlur('.Boxes', 'id5', 'Boxes');
    handleBlur('.Owner_Name', 'id6', 'Owner_Name');
    handleBlur('.Status', 'id7', 'Status');
    handleBlur('.Room', 'id8', 'Room');
    handleBlur('.Section', 'id9', 'Section');
    handleBlur('.Shelf', 'id10', 'Shelf');
    handleBlur('.Level', 'id11', 'Level');
    handleBlur('.Note', 'id12', 'Note');

    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id0");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{Item_ID:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>