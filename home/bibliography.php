<?php

//include both the dbconnect and sescheck files
require('../conf/dbconnect.php');
require('../conf/sescheck.php');

$email = $_SESSION['email'];
$bid = $_GET["id"];

$viewQry = "SELECT * FROM bibliographies WHERE bid = $bid AND user = '$email'";
$bibSql_getBib = mysqli_query($conn,$viewQry) or die("You do not have permissions to read this bibliography.");
$row = mysqli_fetch_assoc($bibSql_getBib);
$error = "You do not have permissions to read this bibliography.";

$refQry_getRef = "SELECT * FROM reference WHERE bibliography=$bid ORDER BY authors ASC";
$refSql_getRef = mysqli_query($conn,$refQry_getRef) or die("Could not select results. ".mysqli_error($conn));

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $rid = mysqli_real_escape_string($conn,$_POST['btnDelRef']);
    $refQry_delRef = "DELETE FROM reference WHERE rid = $rid";
    mysqli_query($conn,$refQry_delRef) or die("Could not delete reference. ".mysqli_error($conn));
    header("Refresh:0");
}

$pageTitle = "";
if ($row['name'] == ""){
  echo $error;
  $pageTitle = "Permission Error";
} else {
  $pageTitle = $row['name'];
}

?>

<html>
    <head>
        <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../assets/style/style.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title><?php echo $pageTitle; ?> ~ Citation Needed</title>
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
                    </nav>
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
                        <button id="addRefMenu" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                          <p>Add</p>
                        </button>

                        <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="addRefMenu">
                          <a href="./createref?id=<?php echo($row['bid']); ?>&reftype=article"><li class="mdl-menu__item"> Add Article </li></a>
                          <a href="./createref?id=<?php echo($row['bid']); ?>&reftype=blog"><li class="mdl-menu__item"> Add Blog </li></a>
                          <a href="./createref?id=<?php echo($row['bid']); ?>&reftype=book"><li class="mdl-menu__item"> Add Book </li></a>
                          <a href="./createref?id=<?php echo($row['bid']); ?>&reftype=email"><li class="mdl-menu__item"> Add Email </li></a>
                          <a href="./createref?id=<?php echo($row['bid']); ?>&reftype=interview"><li class="mdl-menu__item"> Add Interview </li></a>
                          <a href="./createref?id=<?php echo($row['bid']); ?>&reftype=pdf"><li class="mdl-menu__item"> Add PDF </li></a>
                          <a href="./createref?id=<?php echo($row['bid']); ?>&reftype=presentation"><li class="mdl-menu__item"> Add Presentation </li></a>
                          <a href="./createref?id=<?php echo($row['bid']); ?>&reftype=report"><li class="mdl-menu__item"> Add Report </li></a>
                          <a href="./createref?id=<?php echo($row['bid']); ?>&reftype=software"><li class="mdl-menu__item"> Add Software </li></a>
                          <a href="./createref?id=<?php echo($row['bid']); ?>&reftype=website"><li class="mdl-menu__item"> Add Website </li></a>
                        </ul>

                    </div>
                    <div id="refTable">
                    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                        <thead>
                            <tr>
                            <th class="mdl-data-table__cell--non-numeric">Type</th>
                            <th class="mdl-data-table__cell--non-numeric">Name</th>
                            <th class="mdl-data-table__cell--non-numeric">Authors</th>
                            <th class="mdl-data-table__cell--non-numeric">Year</th>
                            <th class="mdl-data-table__cell--non-numeric">Access Date</th>
                            <th class="mdl-data-table__cell--non-numeric">View</th>
                            <th class="mdl-data-table__cell--non-numeric">Edit</th>
                            <th class="mdl-data-table__cell--non-numeric">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            while($row = mysqli_fetch_assoc($refSql_getRef)) {?>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo($row['reftype']); ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo($row['refname']); ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo($row['authors']); ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo($row['year']); ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo($row['refdate']); ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><a href="../home/viewref?id=<?php echo($bid);?>&rid=<?php echo($row['rid']); ?>"><button style="margin-top: 11px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">View More</button></a></td>
                                    <td class="mdl-data-table__cell--non-numeric"><a href="../home/editref?id=<?php echo($bid);?>&rid=<?php echo($row['rid']); ?>"><button style="margin-top: 11px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Edit</button></a></td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <form method="post" action="" id="delRef">
                                            <button style="margin-top: 11px;" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" name="btnDelRef" type="submit" value=<?php echo($row['rid'])?>>Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </main>
            <?php include("../scripts/footer.php"); ?>
        </div>
    </body>
</html>
