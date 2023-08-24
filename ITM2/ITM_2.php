<?php include("header.php"); ?>
<?php date_default_timezone_set('America/Toronto'); 
session_start(); ?>
<!-- <html>  
    <head>   -->
        <!-- <title>Webslesson Demo - Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</title>   -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <!-- </head>  
    <body>   <form name = "add_item" action ="" method = "post" >
        <input type = "text" id = "txtnameis" placeholder="Item Name">
</form>-->

<!-- Search bar -->
<!-- update.php?search=<?php echo $_GET['search']; ?>&Action=disp -->
<form action="" method="GET">
    <div id = "searchbar" class="input-group mb-3" style="width: 95%;padding: 50px;">
        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search Inventory" >
        <button type="submit" class="btn btn-primary btn-block" id = "btn_search" >Search</button>
        <!-- Note: No requirement (required) for filling in the bar: easy to get all item. -->
    </div>
</form>
<div id = "notify" class="input-group mb-3" style = "text-align:center">
    <form action="" method="GET" style = "text-align:center">
        <input type="hidden" name="notify" value="True" class="form-control" style = "text-align:center" >
        <button type="submit" class="btn btn-primary btn-block" >Check Below Minimum Items</button>
    </form>
</div>

<div id = "logs" style="padding-left: 50px;" >
    <a href = "log_page.php">
        <button style = "background-color: transparent; font-size: 25px;border: none; text-decoration:underline"> Logs </button>
    </a>
</div>


<?php
$_SESSION["search"] = $_GET['search']; 
$_SESSION["notify"] = $_GET['notify']; ?>

        <div id = "export">
            <form method="post" action="ITM_export.php" style = "text-align:center">  
                <input type="submit" name="export" value="Export Inventory Database" class="btn btn-success" />  
            </form>
        </div>
        <script src="tablesort.js"></script>
        <div id = "disp_data"></div>

        <script>
// function search(query)
// {  
//                 var xmlhttp = new XMLHttpRequest();
//                 xmlhttp.open("POST", "update.php",false);
//                 xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//                 xmlhttp.send("search="+query+"&Search_Action=disp");
//                 document.getElementById("disp_data").innerHTML=xmlhttp.responseText;
//             };
$(document).on('click', '#btn_add', function(){  
        var Item_Name = $('#Item_Name').text();  
        var Supplier = $('#Supplier').text();
        var Est_Quantity = $('#Est_Quantity').text(); 
        var Exact_Quantity = $('#Exact_Quantity').text(); 
        var Minimum = $('#Minimum').text();
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
            Minimum: Minimum,
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
                disp_data();  
            }  
        })  
    }); 



            function disp_data()
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("POST", "update.php",false);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("Action=disp");
                document.getElementById("disp_data").innerHTML=xmlhttp.responseText;
            }
            disp_data()
        
        function inner_edit(id,Column){
            // if (Column == "Status"){
            //     nameid = Column+id;
            //     txtnameid = "txt"+Column+id;
            //     var name =document.getElementById(nameid).innerHTML;
            //     if (name == "AVAILABLE"){
            //         input = "<select name='status_select' id='"+id+"'>"+"<option value='AVAILABLE' selected>AVAILABLE</option>"
            //         + "<option value='Hold' >Hold</option>" + "<option value='Missing' >Missing</option>"+"</select>";
            //     }
            //     else if (name == "Hold") {
            //         input = "<select name='status_select' id='"+id+"'>"+"<option value='AVAILABLE' >AVAILABLE</option>"
            //         + "<option value='Hold' selected >Hold</option>" + "<option value='Missing' >Missing</option>"+"</select>";
                
            //     }

            //     else if (name == "Missing") {
            //         input = "<select name='status_select' id='"+id+"'>"+"<option value='AVAILABLE' >AVAILABLE</option>"
            //         + "<option value='Hold'>Hold</option>" + "<option value='Missing' selected >Missing</option>"+"</select>";
                
            //     }
            //     document.getElementById(nameid).innerHTML=input;

            // }
            // else{

                replace_id = Column+id;
                txt_replace_id = "txt"+Column+id;
                var replace_input =document.getElementById(replace_id).innerHTML;
                document.getElementById(replace_id).innerHTML="<input type = 'text' value='"+replace_input+"' id ='"+txt_replace_id+"' size = '9'>";
            // }
            
        }


        function edit1(id)
        {
            inner_edit(id,"Name");
            inner_edit(id,"Supplier");
            inner_edit(id,"Est_Quantity");
            inner_edit(id,"Exact_Quantity");
            inner_edit(id,"Minimum");
            inner_edit(id,"Boxes");
            inner_edit(id,"Owner_Name");
            inner_edit(id,"Status");
            inner_edit(id,"Room");
            inner_edit(id,"Section");
            inner_edit(id,"Shelf");
            inner_edit(id,"Level");
            inner_edit(id,"Note");
        
            updateid = "update"+id;
            // document.getElementById(updateid).style.visibility= "visible";
            document.getElementById(id).style.display= "none";
            document.getElementById(updateid).style.display= "block";

        }

        function update1(id)
        {
            var Name_id = "txtName"+id;
            var Name = document.getElementById(Name_id).value;

            var Supplier_id = "txtSupplier"+id;
            var Supplier = document.getElementById(Supplier_id).value;

            var Est_Quantity_id = "txtEst_Quantity"+id;
            var Est_Quantity = document.getElementById(Est_Quantity_id).value;

            var Exact_Quantity_id = "txtExact_Quantity"+id;
            var Exact_Quantity = document.getElementById(Exact_Quantity_id).value;

            var Minimum_id = "txtMinimum"+id;
            var Minimum = document.getElementById(Minimum_id).value;

            var Boxes_id = "txtBoxes"+id;
            var Boxes = document.getElementById(Boxes_id).value;

            var Owner_Name_id = "txtOwner_Name"+id;
            var Owner_Name = document.getElementById(Owner_Name_id).value;

            var Status_id = "txtStatus"+id;
            var Status = document.getElementById(Status_id).value;

            var Room_id = "txtRoom"+id;
            var Room = document.getElementById(Room_id).value;

            var Section_id = "txtSection"+id;
            var Section = document.getElementById(Section_id).value;

            var Shelf_id = "txtShelf"+id;
            var Shelf = document.getElementById(Shelf_id).value;

            var Level_id = "txtLevel"+id;
            var Level = document.getElementById(Level_id).value;

            var Note_id = "txtNote"+id;
            var Note =document.getElementById(Note_id).value;

            // update_data(id, Name);
            update_data(id, Name, Supplier, Est_Quantity, Exact_Quantity, Minimum, Boxes, Owner_Name, Status, Room, Section, Shelf, Level, Note );

            document.getElementById("Name"+id).innerHTML= Name;

            document.getElementById("Supplier"+id).innerHTML= Supplier;

            document.getElementById("Est_Quantity"+id).innerHTML= Est_Quantity;

            document.getElementById("Exact_Quantity"+id).innerHTML= Exact_Quantity;

            document.getElementById("Minimum"+id).innerHTML= Minimum;

            document.getElementById("Boxes"+id).innerHTML= Boxes;

            document.getElementById("Owner_Name"+id).innerHTML= Owner_Name;
        
            document.getElementById("Status"+id).innerHTML= Status;

            document.getElementById("Room"+id).innerHTML= Room;

            document.getElementById("Section"+id).innerHTML= Section;

            document.getElementById("Shelf"+id).innerHTML= Shelf;

            document.getElementById("Level"+id).innerHTML = Level;

            document.getElementById("Note"+id).innerHTML = Note;
        }

        function update_data(id, Name, Supplier, Est_Quantity, Exact_Quantity, Minimum, Boxes, Owner_Name, Status, Room, Section, Shelf, Level, Note ){
            
            // function update_data(id, Name){
            // xmlhttp = new XMLHttpRequest();
            // xmlhttp.open("GET","update.php?id="+id+"&name="+Name+"&Supplier="+Supplier+"&Est_Quantity="+Est_Quantity+"&Exact_Quantity="+Exact_Quantity+"&Boxes="+Boxes+"&Owner_Name="+Owner_Name+"&Status="+Status+"&Room="+Room+"&Section="+Section+"&Shelf="+Shelf+"&Level="+Level+"&Note="+Note+"&Action=Update")
            
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "update.php", false);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");
            variable = "id="+id+"&Name="+Name+"&Supplier="+Supplier+"&Est_Quantity="+Est_Quantity+"&Exact_Quantity="+Exact_Quantity+"&Minimum="+Minimum+"&Boxes="+Boxes+"&Owner_Name="+Owner_Name+"&Status="+Status+"&Room="+Room+"&Section="+Section+"&Shelf="+Shelf+"&Level="+Level+"&Note="+Note+"&Action=Update";
            xmlhttp.send(variable);
            disp_data();
        }

        function delete1(id){
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST", "update.php", false);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=UTF-8");
            variable = "id="+id+"&Action=Delete";
            xmlhttp.send(variable);
            disp_data();
        }

        </script>
            

    </body>  
</html>  
 































