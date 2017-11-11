<?php

//start and set a session
session_start();
$sescheck = $_SESSION['email'];

//Check to see if it exists - If not, send them back to the login page
if($sescheck != "") {

}else{
    header('location:./index.php');
}
?>