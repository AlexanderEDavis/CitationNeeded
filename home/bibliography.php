<?php

//include both the dbconnect and sescheck files
require('../conf/dbconnect.php');
require('../conf/sescheck.php');

$email = $_SESSION['email'];

$bid = htmlspecialchars($_GET["id"]);
$viewQry = "SELECT * FROM bibliographies WHERE bid = '$bid'";

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
                    <?php echo(htmlspecialchars($_GET["id"])); ?>
                </div>
            </main>
        </div>
    </body>
</html>
