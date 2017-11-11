<?php

//start and set a session
session_start();
$sescheck = $_SESSION['username'];

//Check to see if it exists - If not, send them back to the login page
if($sescheck != "") {

}else{
    header('location:./index.php');
}
?>