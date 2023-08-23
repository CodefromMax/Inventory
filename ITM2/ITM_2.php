<?php include("header.php"); ?>
<!-- <html>  
    <head>   -->
        <!-- <title>Webslesson Demo - Live Table Add Edit Delete using Ajax Jquery in PHP Mysql</title>   -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <!-- </head>  
    <body>   -->
        <div id = "disp_data"></div>

        <script>
            function disp_data()
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "update.php?status=disp",false);
                xmlhttp.send(null);
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

                nameid = Column+id;
                txtnameid = "txt"+Column+id;
                var name =document.getElementById(nameid).innerHTML;
                document.getElementById(nameid).innerHTML="<input type = 'text' value='"+name+"' id ='"+txtnameid+"' size = '9'>";
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


        </script>
            

    </body>  
</html>  
 































