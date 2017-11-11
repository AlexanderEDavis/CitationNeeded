<?php

//Include the session check page
require('./conf/sescheck.php');

//Unset the session variables
session_unset();

//Delete the session
session_destroy();

//Redirect user back to the login page
header('Location:index.php');

?>