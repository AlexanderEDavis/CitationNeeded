<?php

//include both the dbconnect and sescheck files
require('../conf/dbconnect.php');
require('../conf/sescheck.php');

$email = $_SESSION['email'];
$bid = $_GET["id"];

// $viewQry = "SELECT * FROM bibliographies WHERE bid = $bid AND user = '$email'";
// $bibSql_getBib = mysqli_query($conn,$viewQry) or die("You do not have permissions to read this bibliography.");
// $row = mysqli_fetch_assoc($bibSql_getBib);
// $error = "You do not have permissions to read this bibliography.";

$refQry_getRef = "SELECT * FROM references WHERE bibliography=$bid ORDER BY authors ASC";
$refSql_getRef = mysqli_query($conn,$refQry_getRef) or die("Could not select results. ".mysqli_error($conn));

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
                    <span class="mdl-layout-title"><?php
                    if ($row['name'] == ""){
                      echo $error;
                    }
                    else {
                      echo $row['name'];
                    }
                    ?></span>
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

                    <div id="refButtons">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Add</button>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Edit</button>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Delete</button>
                    </div>
                    <div id="refTable">
                    <table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
                        <thead>
                            <tr>
                            <th class="mdl-data-table__cell--non-numeric">Type</th>
                            <th class="mdl-data-table__cell--non-numeric">Author</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            while($row = mysqli_fetch_assoc($refSql_getRef)) {?>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo($row['reftype']); ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo($row['authors']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
