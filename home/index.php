<?php

//include both the dbconnect and sescheck files
require('../conf/dbconnect.php');
require('../conf/sescheck.php');

$email = $_SESSION['email'];

$bibQry_getBib = "SELECT * FROM bibliographies WHERE user='$email' ORDER BY 'name' ASC";
$bibSql_getBib = mysqli_query($conn,$bibQry_getBib) or die("Could not select results. ".mysqli_error($conn));

$bibQry_newBib = "INSERT INTO bibliographies (name, user) VALUES ('$bibName', '$email')";
$bibSql_newBib = mysqli_query($conn,$bibQry_newBib) or die("Could not create bibliography. ".mysqli_error($conn));

$bibQry_delBib = "DELETE FROM bibliographies WHERE name = '$bibName'";
$bibSql_delBib = mysqli_query($conn,$bibQry_delBib) or die("Could not delete bibliography. ".mysqli_error($conn));

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
                    <span class="mdl-layout-title">My Bibliographies</span>
                    <div class="mdl-layout-spacer"></div>
                    <nav class="mdl-navigation mdl-layout--large-screen-only">
                          <a class="mdl-navigation__link" href="#">Create Bibliography</a>
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
                   <?php
                    while($row = mysqli_fetch_assoc($bibSql_getBib)) {?>
                        <div class="demo-card-event mdl-card mdl-shadow--2dp">
                            <div class="mdl-card__title mdl-card--expand">
                                <h4> <?php echo($row['name']); ?> </h4>
                            </div>
                            <div class="mdl-card__title mdl-card--expand">
                                    <p class="bibType"><em> <?php echo($row['bibtype']); ?> </em></p>
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"> Open </a>
                                <div class="mdl-layout-spacer"></div>
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"> Delete </a>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </main>
        </div>
    </body>
</html>