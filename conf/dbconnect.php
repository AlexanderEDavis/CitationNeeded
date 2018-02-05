<?php
//SET VARIABLES
$dbuser = "";
$dbpass = "";
$dbdatabase = "";
$dbserver = "";
//CONNECT TO DB
$conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbdatabase) or die("There was an error connecting to the database.");
?>
