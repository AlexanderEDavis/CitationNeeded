<?php
include('../conf/dbconnect.php');
include('../conf/sescheck.php');
  $email = $_SESSION['email'];

if($_SERVER['REQUEST_METHOD'] == "POST"){
  //escape the username and password fields - avoids SQL injection
  var_dump($_POST);
  $current_password = mysqli_real_escape_string($conn,$_POST['currentpass']);
  $newpass1 = mysqli_real_escape_string($conn,$_POST['newpass']);
  $newpass2 = mysqli_real_escape_string($conn,$_POST['confpass']);


      /*-------------------------------------------------------------
  	The query to the database and getting the value from it
      -------------------------------------------------------------*/

      $find_user = "SELECT salt, password FROM users WHERE email='$email'";
      $result = mysqli_query($conn, $find_user) or die("$find_user".mysqli_error($conn));
      $row = mysqli_fetch_assoc($result);

      /*-------------------------------------------------------------
      	Getting the value from the database
      	&
      	salting,hashing of the password from the form
      -------------------------------------------------------------*/
      $stored_salt = $row['salt'];
      $stored_hash = $row['password'];
      $check_pass = $stored_salt . $current_password;
      $check_hash = hash('sha512',$check_pass);

      /*-------------------------------------------------------------
      	Comparing the two hashed values
      -------------------------------------------------------------*/

      if(($check_hash === $stored_hash)&&($newpass1 === $newpass2)){
          echo "Password Changed";
          header('Location: ../home');
      }
      else{
          echo "Not authenticated";
          var_dump(array($stored_salt, $stored_hash, $check_pass, $check_hash));
      }
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="../assets/style/style.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title>Account Settings ~ Citation Needed</title>
    </head>
    <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <div class="mdl-layout-spacer"></div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
                        <div class="mdl-textfield__expandable-holder">
                            <input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp">
                        </div>
                    </div>
                </div>
            </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Citation Needed</span>
            <span><h6><?php echo($email); ?></h6></span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="../home">Home</a>
                <a class="mdl-navigation__link" href="../account/settings">Account Settings</a>
                <a class="mdl-navigation__link" href="../account/logout">Logout</a>
            </nav>
        </div>
            <main class="mdl-layout__content">
                <div class="page-content">
                  <!-- Simple Textfield -->
                  <form method="POST" id="passreset" action="">
                    <div class="mdl-textfield mdl-js-textfield">
                      <input class="mdl-textfield__input" type="password" name="currentpass" id="currentpass">
                      <label class="mdl-textfield__label" for="currentpass">Current password</label>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="password" name="newpass" id="newpass">
                    <label class="mdl-textfield__label" for="newpass">New password</label>
                    </div>
                    <br>
                    <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="password" name="confpass" id="confpass">
                    <label class="mdl-textfield__label" for="confpass">Confirm password</label>
                    </div>
                    <br>
                    <div class="mdl-card__actions mdl-card--border">
                      <input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--primary" type="submit" value="Confirm">
                    </div>
                    <br>
                    <div id="refButtons">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="show-dialog" type="button" class="mdl-button">Delete my account!!!</button>
                        <dialog class="mdl-dialog">
                        <div class="mdl-dialog__content">
                          <p>
                            Are you sure you want to delete your account:
                          </p>
                        </div>
                        <div class="mdl-dialog__actions">
                          <button type="button" class="mdl-button">Yes</button>
                          <button type="button" class="mdl-button close">No</button>
                        </div>
                      </dialog>
                      <script>
                        var dialog = document.querySelector('dialog');
                        var showDialogButton = document.querySelector('#show-dialog');
                        if (! dialog.showModal) {
                          dialogPolyfill.registerDialog(dialog);
                        }
                        showDialogButton.addEventListener('click', function() {
                          dialog.showModal();
                        });
                        dialog.querySelector('.close').addEventListener('click', function() {
                          dialog.close();
                        });
                      </script>
                    </div>
                  </form>
                </div>
            </main>
        </div>
    </body>
</html>
