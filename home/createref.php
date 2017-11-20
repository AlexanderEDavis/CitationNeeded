<?php

//include both the dbconnect and sescheck files
require('../conf/dbconnect.php');
require('../conf/sescheck.php');

$email = $_SESSION['email'];
$bid = $_GET["id"];

// $refQry_newRef = "INSERT INTO reference (bibliography, reftype, authors) VALUES ('$bid', '$reftype', '$authors')";
// $refSql_newRef = mysqli_query($conn,$refQry_newRef) or die("Could not create reference. ".mysqli_error($conn));

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $refAuthors = mysqli_real_escape_string($conn,$_POST['authors']);
  $refName = mysqli_real_escape_string($conn,$_POST['refName']);
  $refType = mysqli_real_escape_string($conn,$_POST['refType']);
  $refURL = mysqli_real_escape_string($conn,$_POST['url']);
  $refYear = mysqli_real_escape_string($conn,$_POST['year']);
  $refDate = mysqli_real_escape_string($conn,$_POST['refdate']);
  $refEdition = mysqli_real_escape_string($conn,$_POST['refedition']);
  $refPop = mysqli_real_escape_string($conn,$_POST['refpop']);
  $refPublish = mysqli_real_escape_string($conn,$_POST['refpub']);
  $refQry_createRef = "INSERT INTO reference (bibliography, refname, reftype, refurl, authors, year, refdate, refedition, refpop, refpub) VALUES ('$bid', '$refName', '$refType', '$refURL', '$refAuthors', '$refYear', '$refDate', '$refEdition', '$refPop', '$refPublish')";
  mysqli_query($conn,$refQry_createRef) or die("Could not create reference. $insert".mysqli_error($conn));
  header("Refresh:0 url=../home/bibliography?id=$bid");
}

?>

<html>
    <head>
        <link rel="stylesheet" href="../assets/style/style.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title>Create Reference ~ Citation Needed</title>
        <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    </head>
    <body>

        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title">Create New Reference</span>
                    <div class="mdl-layout-spacer"></div>
                    <nav class="mdl-navigation mdl-layout--large-screen-only">
                          <!-- <a class="mdl-navigation__link" href="#">Create Bibliography</a> -->
                          <!-- <button id="btnNewBib" class="mdl-button mdl-button--raised mdl-js-button dialog-button">New Bibliography</button> -->
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
        <div id="cardNewRef" class="mdl-card mdl-shadow--4dp">

        <!-- LOGIN FORM START -->
        <form method="POST" action="" id="newRef">

          <!-- MAIN CARD START -->
        <div class="mdl-card__supporting-text">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="refName"></input>
              <label class="mdl-textfield__label" for="authors">Name</label>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="authors"></input>
              <label class="mdl-textfield__label" for="authors">Author(s): Please enter authors as Surname, Initial.</label>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="year"></input>
              <label class="mdl-textfield__label" for="year">Year</label>
            </div>

            <!-- Select with arrow-->
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
            <select class="mdl-textfield__input" type="text" id="refType" value="Belarus" name="refType" readonly tabIndex="-1">
            <label for="refType" class="mdl-textfield__label">Source Type</label>
            <ul for="refType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                <option class="mdl-menu__item" value="Website">Website</option>
                <option class="mdl-menu__item" value="Book">Book</option>
                <option class="mdl-menu__item" value="Article">Article</option>
            </ul>
          </select>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="url"></input>
              <label class="mdl-textfield__label" for="year">URL</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="refdate"></input>
              <label class="mdl-textfield__label" for="year">Access Date: Please enter dates as Day Month(Word) Year</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="refedition"></input>
              <label class="mdl-textfield__label" for="refedition">Edition: xth edn.</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="refpop"></input>
              <label class="mdl-textfield__label" for="refpop">Place of Publication</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="refpub"></input>
              <label class="mdl-textfield__label" for="refpub">Publisher</label>
        </div>

        </div>
          <!-- MAIN CARD END -->

        <!-- ACTIONS CARD START -->
        <div class="mdl-card__actions mdl-card--border">
          <input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" style="clear:both" type="submit" value="Create">
        </div>
        <!-- ACTIONS CARD END -->

      </form>
        <!-- FORM END -->
                </div>
                </div>
            </main>
            <?php include("../scripts/footer.php"); ?>
        </div>
    </body>
</html>
