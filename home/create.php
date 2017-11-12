<?php

//include both the dbconnect and sescheck files
require('../conf/dbconnect.php');
require('../conf/sescheck.php');

$email = $_SESSION['email'];

$bibQry_newBib = "INSERT INTO bibliographies (name, user) VALUES ('$bibName', '$email')";
$bibSql_newBib = mysqli_query($conn,$bibQry_newBib) or die("Could not create bibliography. ".mysqli_error($conn));

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $bibName = mysqli_real_escape_string($conn,$_POST['createBtn']);
  $bibQry_delBib = "INSERT INTO bibliographies (name, user) VALUES ('$bibName', '$email')";
  mysqli_query($conn,$bibQry_newBib) or die("Could not create bibliography. ".mysqli_error($conn));
  header("Refresh:0 url=../home");
}

?>

<html>
    <head>
        <link rel="stylesheet" href="../assets/style/style.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title>Home ~ Citation Needed</title>
    </head>
    <body>

        <script>
            function bibOpen(name) {
                <?php $_SESSION['bibName'] = $name; ?>
            };
        </script>

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
      <div id="cardLogin"  class="mdl-card mdl-shadow--4dp">

        <!-- CARD TITLE START -->
        <div class="mdl-card__title mdl-color--primary">
          <h2 class="mdl-card__title-text mdl-color-text--white">Login</h2>
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
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="./bibliography?id=<?php echo($row['bid']); ?>"> Open </a>
                                <div class="mdl-layout-spacer"></div>
                                  <form method="post" action="" id="delReq">
                                    <button style="margin-top:15px; color: white;" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" name="createBtn" type="submit" value=<?php echo($row['bid'])?>>Submit</button>
                                  </form>
                                </div>
                            </div>

                    <?php } ?>
                </div>
            </main>
        </div>
    </body>
</html>
