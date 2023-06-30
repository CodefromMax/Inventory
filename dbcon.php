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
    // $query = "select * from 'inventory'";
    //             //hold the database
    //             $result = mysqli_query($connection,$query);
    //             print_r($result);
    //  echo "connected";
}

