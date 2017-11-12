<?php

//include both the dbconnect and sescheck files
require('../conf/dbconnect.php');
require('../conf/sescheck.php');

$email = $_SESSION['email'];
$bid = $_GET["id"];

$viewQry = "SELECT * FROM bibliographies WHERE bid = '$bid'";
$bibSql_getBib = mysqli_query($conn,$viewQry) or die("You do not have permissions to read this bibliography.");
$row = mysqli_fetch_assoc($bibSql_getBib);

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $bibName = mysqli_real_escape_string($conn,$_POST['bibname']);
    $bibType = mysqli_real_escape_string($conn,$_POST['bibtype']);
    $bibQry_editBib = "UPDATE bibliographies SET name = '$bibName', bibtype = '$bibType' WHERE bid='$bid'";
    mysqli_query($conn,$bibQry_editBib) or die("Could not edit bibliography. $insert".mysqli_error($conn));
    header("Refresh:0 url=../home/bibliography?id=$bid");
}

?>

<html>
    <head>
        <link rel="stylesheet" href="../assets/style/style.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title>Editing <?php echo($row['name']); ?> ~ Citation Needed</title>
    </head>
    <body>

        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <span class="mdl-layout-title">Edit Bibliography: <em> <?php echo($row['name']); ?> </em></span>
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
        <div id="cardEditBib" class="mdl-card mdl-shadow--4dp">

        <!-- LOGIN FORM START -->
        <form method="POST" action="" id="editBib">

          <!-- MAIN CARD START -->
        <div class="mdl-card__supporting-text">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <input class="mdl-textfield__input" type="text" id="name" name="bibname" value="<?php echo($row['name']); ?>"></input>
              <label class="mdl-textfield__label" for="authors">Name</label>
            </div>

            <!-- Select with arrow-->
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
            <select class="mdl-textfield__input" type="text" id="bibtype" name="bibtype" readonly tabIndex="-1">
            <label for="refType" class="mdl-textfield__label">Bibliography Type</label>
            <ul for="refType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                <option class="mdl-menu__item" value="BCU Harvard" <?php if($row['bibtype']=="BCU Harvard"){ echo 'selected'; }?> >BCU Harvard</option>
                <option class="mdl-menu__item" value="Aston Harvard" <?php if($row['bibtype']=="Aston Harvard"){ echo 'selected'; }?>>Aston Harvard</option>
                <option class="mdl-menu__item" value="APA" <?php if($row['bibtype']=="APA"){ echo 'selected'; }?>>APA</option>
            </ul>
          </select>
        </div>

        </div>
          <!-- MAIN CARD END -->

        <!-- ACTIONS CARD START -->
        <div class="mdl-card__actions mdl-card--border">
          <input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" style="clear:both" type="submit" value="Save">
        </div>
        <!-- ACTIONS CARD END -->

      </form>
        <!-- FORM END -->
                </div>
                </div>
            </main>
        </div>
    </body>
</html>
