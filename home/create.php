<?php

//include both the dbconnect and sescheck files
require('../conf/dbconnect.php');
require('../conf/sescheck.php');

$email = $_SESSION['email'];

$bibQry_newBib = "INSERT INTO bibliographies (name, user) VALUES ('$bibName', '$email')";
$bibSql_newBib = mysqli_query($conn,$bibQry_newBib) or die("Could not create bibliography. ".mysqli_error($conn));

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $bibName = mysqli_real_escape_string($conn,$_POST['name']);
  $bibType = mysqli_real_escape_string($conn,$_POST['refType']);
  $bibQry_createBib = "INSERT INTO bibliographies (name, user, bibtype) VALUES ('$bibName', '$email', '$bibType')";
  var_dump($bibQry_createBib);
  //mysqli_query($conn,$bibQry_newBib) or die("Could not create bibliography. ".mysqli_error($conn));
  //header("Refresh:0 url=../home");
}

?>

<html>
    <head>
        <link rel="stylesheet" href="../assets/style/style.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title>Home ~ Citation Needed</title>
    </head>
    <body>

        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title">Create New Bibliography</span>
                    <div class="mdl-layout-spacer"></div>
                    <nav class="mdl-navigation mdl-layout--large-screen-only">
                          <!-- <a class="mdl-navigation__link" href="#">Create Bibliography</a> -->
                          <button id="btnNewBib" class="mdl-button mdl-button--raised mdl-js-button dialog-button">New Bibliography</button>
                        </nav>
                    <!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
                        <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
                            <i class="material-icons">search</i>
                        </label>
                        <div class="mdl-textfield__expandable-holder">
                            <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp">
                        </div>
                    </div> -->
                </div>
            </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Citation Needed</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="../home">Home</a>
                <a class="mdl-navigation__link" href="../account/settings">Account Settings</a>
                <a class="mdl-navigation__link" href="../account/logout">Logout</a>
            </nav>
        </div>
            <main class="mdl-layout__content">
                <div class="page-content">
                    <!-- Get User's Bibs -->
                    <!-- Create Delete buttons on each card -->

                    <!-- LOGIN CARD START -->
      <div id="cardNewBib"  class="mdl-card mdl-shadow--4dp">

        <!-- LOGIN FORM START -->
        <form method="post" action="" id="newBib">

          <!-- MAIN CARD START -->
        <div class="mdl-card__supporting-text">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="name">
              <label class="mdl-textfield__label" for="name">Bibliography Name</label>
            </div>

            <!-- Select with arrow-->
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
            <input class="mdl-textfield__input" type="text" id="refType" value="Belarus" readonly tabIndex="-1">
            <label for="refType" class="mdl-textfield__label">Referencing Method</label>
            <ul for="refType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                <li class="mdl-menu__item" data-val="DE">Germany</li>
                <li class="mdl-menu__item" data-val="BY">Belarus</li>
                <li class="mdl-menu__item" data-val="RU">Russia</li>
            </ul>
        </div>
        </div>
          <!-- MAIN CARD END -->

        <!-- ACTIONS CARD START -->
        <div class="mdl-card__actions mdl-card--border">
          <input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" type="submit" value="Create">
        </div>
        <!-- ACTIONS CARD END -->

      </form>
        <!-- LOGIN FORM END -->
                </div>
                </div>
            </main>
        </div>
    </body>
</html>
