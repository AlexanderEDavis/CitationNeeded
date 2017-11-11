<?php
//Start a session and include the config for connecting to the database
session_start();
include('./conf/dbconnect.php');

//Set the error variable so a undeclared variable exception doesn't occur
$err = "";

//If the form has been submitted and sends the post method...
if($_SERVER['REQUEST_METHOD'] == "POST"){

  //escape the username and password fields - avoids SQL injection
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  
  //Hash username and password
  $hashemail = hash('sha512' , $email);
  $hashpassword = hash('sha512' , $password);

  //Run a query to find the row where username and password matches
  $qry = "SELECT * FROM users WHERE email='$hashemail' and password='$hashpassword'";
  $sql = mysqli_query($conn,$qry);

  //Count the number of rows
  $numrows = mysqli_num_rows($sql);


//If the number of rows the query produces is equal to 1...
if($numrows == 1){

  //Set the session username to username variable and redirect to home page
  $_SESSION['email'] = $hashemail;
  header('location:./home.php');

//If not, set the error message to display on the form
}else{
  $err = "Your login details are incorrect!";
}
}

if(isset($_SESSION['email'])){
  header('location:./home.php');
}
?>

<!-- START HTML -->
<html>

<head>
  <title>Login ~ HackPanel</title>
  <link rel="stylesheet" href="./css/login.css">
  <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>

<body>
  <!-- LOGIN PAGE START -->
  <div class="mdl-layout mdl-js-layout mdl-color--grey-100">
    <main class="mdl-layout__content">

      <!-- LOGIN CARD START -->
      <div class="mdl-card mdl-shadow--4dp">

        <!-- CARD TITLE START -->
        <div class="mdl-card__title mdl-color--primary">
          <h2 class="mdl-card__title-text mdl-color-text--white"><img class="logo" src="./img/bullhackswideborder.png"></h2>
        </div>
        <!-- CARD TITLE END -->

        <!-- LOGIN FORM START -->
        <form method="post" action="" id="loginform">

          <!-- MAIN CARD START -->
        <div class="mdl-card__supporting-text">

          <?php if($err == "") { ?>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="email" name="email">
              <label class="mdl-textfield__label" for="email">Email Address</label>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="password" id="password" name="password">
              <label class="mdl-textfield__label" for="password">Password</label>
            </div>

          <?php }else{ ?>

            <div class="mdl-textfield is-invalid mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="email" name="email">
              <label class="mdl-textfield__label" for="email">Email Address</label>
            </div>

            <div class="mdl-textfield is-invalid mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="password" id="password" name="password">
              <label class="mdl-textfield__label" for="password">Password</label>
            </div>

            <div class="mdl-color-text--red"><?php echo $err; ?></div>

        <?php }; ?>
        </div>
          <!-- MAIN CARD END -->

        <!-- ACTIONS CARD START -->
        <div class="mdl-card__actions mdl-card--border">
          <input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" type="submit" value="Log In">
        </div>
        <!-- ACTIONS CARD END -->

      </form>
        <!-- LOGIN FORM END -->

      </div>
    </main>
  </div>

</body>

</html>
<!-- END HTML -->
