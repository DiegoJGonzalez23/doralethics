<?php

// FOR WHEN UPLOADING TO WEBSITE

$dbHost = "localhost"; //  where to  host the stuff, right now its manual
$dbUser = "doraleth_diegog"; // normal
$dbPass = "Diegogamer#2005"; // xampp usually contains no database password
$dbName = "doraleth_ethicsdb"; // name of database



/// FOR WHEN MAKING EDITS ON THE LOCALHOST
//$dbHost = "localhost"; //  where to  host the stuff, right now its manual
//$dbUser = "root"; // normal
//$dbPass = ""; // xampp usually contains no database password
//$dbName = "doraleth_ethicsdb"; // name of database

// my sql improved connect
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if(!$conn){
    echo "{$dbHost}  and {$dbPass}  .";
    die("Database conn failed" );
}
?>