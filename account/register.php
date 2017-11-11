<?php
//Start a session and include the config for connecting to the database
session_start();
include('../conf/dbconnect.php');
//Set the error variable so a undeclared variable exception doesn't occur
$err = "";
//If the form has been submitted and sends the post method...
if($_SERVER['REQUEST_METHOD'] == "POST"){
  /*-------------------------------------------------------------
    The generateSalt function was gotten from http://code.activestate.com/recipes/576894-generate-a-salt/
    @author AfroSoft
  -------------------------------------------------------------*/

  function generateSalt($max = 64) {
  	$characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?";
  	$i = 0;
  	$salt = "";
  	while ($i < $max) {
  	    $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
  	    $i++;
  	}
  	return $salt;
  }

  /*-------------------------------------------------------------
   Form data
  -------------------------------------------------------------*/
  $username = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);

  /*-------------------------------------------------------------
   Salting and Hashing
  -------------------------------------------------------------*/

  $user_salt = generateSalt(); // Generates a salt from the function above
  $combo = $user_salt . $password; // Appending user password to the salt
  $hashed_pwd = hash('sha512',$combo); // Using SHA512 to hash the salt+password combo string

  /*-------------------------------------------------------------
   Checks the connection to the DB has been made.
   If successful selects the database to be used, else exits
  -------------------------------------------------------------*/
  if(!$conn)
  {
  	die("Could Not Connect:".mysqli_error());
  }
  /*-------------------------------------------------------------
   Inserting Data
  -------------------------------------------------------------*/
  $insert="INSERT INTO users (email, salt, password) VALUES ('$username','$user_salt','$hashed_pwd')";
    mysqli_query($conn, $insert) or die("$insert".mysqli_error($conn));
    header('Location:login');
}
 ?>

<html>
    <head>
        <link rel="stylesheet" href="../assets/style/style.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title>Register ~ Citation Needed</title>
    </head>
    <body>
            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                    <header class="mdl-layout__header">
                      <div class="mdl-layout__header-row">
                        <!-- Title -->
                        <span class="mdl-layout-title">Welcome to Citation Needed</span>
                        <!-- Add spacer, to align navigation to the right -->
                        <div class="mdl-layout-spacer"></div>
                        <!-- Navigation. We hide it in small screens. -->
                        <nav class="mdl-navigation mdl-layout--large-screen-only">
                          <a class="mdl-navigation__link" href="./login">LOGIN</a>
                        </nav>
                      </div>
                    </header>
                    <!-- <div class="mdl-layout__drawer">
                      <span class="mdl-layout-title">Title</span>
                      <nav class="mdl-navigation">
                        <a class="mdl-navigation__link" href="./login">LOGIN</a>
                      </nav>
                    </div> -->
                    <main class="mdl-layout__content">
                      <div class="page-content">

                        <!-- LOGIN PAGE START -->
  <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
    <main class="mdl-layout__content">

      <!-- REGISTER CARD START -->
      <div id="cardRegister" class="mdl-card mdl-shadow--4dp">

        <!-- CARD TITLE START -->
        <div class="mdl-card__title mdl-color--primary">
          <h2 class="mdl-card__title-text mdl-color-text--white">Register</h2>
        </div>
        <!-- CARD TITLE END -->

        <!-- REGISTER FORM START -->
        <form method="post" action="" id="loginform">

          <!-- MAIN CARD START -->
        <div class="mdl-card__supporting-text">

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="email" name="email">
              <label class="mdl-textfield__label" for="email">Email Address</label>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="password" id="password" name="password">
              <label class="mdl-textfield__label" for="password">Password</label>
            </div>

        </div>
          <!-- MAIN CARD END -->

        <!-- ACTIONS CARD START -->
        <div class="mdl-card__actions mdl-card--border">
          <input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" type="submit" value="Register">
        </div>
        <!-- ACTIONS CARD END -->

      </form>
        <!-- REGISTER FORM END -->

                      </div>
                    </main>
                  </div>
    </body>
</html>
