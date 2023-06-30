<?php

define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","inv");

$connection = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);

if(!$connection) {
    die("Connection failed");
}

else {

    // $query = "INSERT INTO `inventory`(`id`, `name`, `quantity`, `location`) 
    // VALUES (1, 2, 20, 1)";
    
    // $result = mysqli_query($connection, $query);

    // $query = "select * from `inventory`";
    //             //hold the database
    //             $result = mysqli_query($connection,$query);
    //             print_r($result);
    //  echo "connected";
}

