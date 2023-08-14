<?php  

//Connect database
include('dbcon.php');

//Session variable is a temporary variable used to store PHP variable across different PHP pages
//It will disappear upon closing the page
//Session_start is used to start a new or sync with a existing session
//Here, sql is the variable we want to get from the database page
//sql variable from the database page shows the current query
//Which will be used to gather data from MySQL database and convert it to CSV
session_start();

//If some one clicked export database
if(isset($_POST["export"]))  
{
    $query=$_SESSION['sql'];
    // echo $query;

    //Replace shelf condition in the query with "", since the query we got from the session variable is used for shelfs
    //If AND is in the query: it means there are other conditions (Division, search) applied
    if (str_contains($query,"AND"))
    {
        $regex = '/`shelf` = \'[A-F]\' AND /i';
        $updated_query = preg_replace($regex,"",$query );
        // echo $updated_query; 
        //Note: if original query is changed:
        //If searching is applied in index.page, preg_replace will work differently since it is the entire database) //(DNS,PCS,ITM) 
    }

    //If there is no AND in the query, replace WHERE `shelf` = A to F with ""
    else if (!str_contains($query,"AND"))
    {
        $regex = '/WHERE `shelf` = \'[A-F]\'/i';
        $updated_query = preg_replace($regex,"",$query);
        // echo $updated_query;
    }

    //CSV
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=inventory_database.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('part_number', 'serial_number', 'name', 'quantity', 'minimum','division', 'shelf', 'level', 'zone', 'depth','last_audited', 'creation_time', 'last_edited', 'note'));  
    $result = mysqli_query($connection,$updated_query);
    
    //Write each row into csv
    while($row = mysqli_fetch_assoc($result))  
    {  
        fputcsv($output, $row);  
    }  

    fclose($output);  
}  

//Debug Note: 
//If exporting is not working:
//Comment the //CSV section

// Uncomment 
// echo updated_query; in the second and third if statement and 
// the function below.

// Try to click the export from different pages (ALL,DNS)
// Check the query
// If the query is ok

// Try the function below and the useful links 

//This function is used to understand regex in PHP
// function useRegex($input) {
//     // $regex = '/`shelf` = \'[A-F]\'/i';
//     $regex = '/WHERE `shelf` = \'F\'/i';
//     // preg_match($regex, $input)
//     return preg_match($regex, $input);
// }

// Useful links:
// https://www.php.net/manual/en/function.str-contains.php
// https://regex-generator.olafneumann.org/?sampleText=WHERE%20%60shelf%60%20%3D%20%27F%27&flags=i&selection=12%7CCharacter,14%7CCharacter,16%7CCharacter,18%7CCharacter

 ?>  
