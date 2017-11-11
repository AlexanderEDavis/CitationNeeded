<html>
    <head>
        <link rel="stylesheet" href="../assets/style/style.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <title>Login ~ Citation Needed</title>
    </head>
    <body>
            <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
                    <header class="mdl-layout__header">
                      <div class="mdl-layout__header-row">
                        <!-- Title -->
                        <span class="mdl-layout-title">Welcome to Citation Needed</span>
                        <!-- Add spacer, to align navigation to the right -->
                        <div class="mdl-layout-spacer"></div>
                        <!-- Navigation. We hide it in small screens. -->
                        <!-- <nav class="mdl-navigation mdl-layout--large-screen-only">
                          <a class="mdl-navigation__link" href="">Link</a>
                          <a class="mdl-navigation__link" href="">Link</a>
                          <a class="mdl-navigation__link" href="">Link</a>
                          <a class="mdl-navigation__link" href="">Link</a>
                        </nav> -->
                      </div>
                    </header>
                    <!-- <div class="mdl-layout__drawer">
                      <span class="mdl-layout-title">Title</span>
                      <nav class="mdl-navigation">
                        <a class="mdl-navigation__link" href="">Link</a>
                        <a class="mdl-navigation__link" href="">Link</a>
                        <a class="mdl-navigation__link" href="">Link</a>
                        <a class="mdl-navigation__link" href="">Link</a>
                      </nav>
                    </div> -->
                    <main class="mdl-layout__content">
                      <div class="page-content">

                        <!-- LOGIN CARD START -->
                        <div id="cardLogin" class="mdl-card mdl-shadow--4dp">

                          <!-- CARD TITLE START -->
                          <div class="mdl-card__title mdl-color--primary">
                            <h2 class="mdl-card__title-text mdl-color-text--white">Login</h2>
                          </div>
                          <!-- CARD TITLE END -->

                          <!-- LOGIN FORM START -->
                          <form method="post" action="" id="loginform">

                              <!-- MAIN CARD START -->
                            <div class="mdl-card__supporting-text">

                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="email" name="email">
                                <label class="mdl-textfield__label" for="email">Email Address</label>
                              </div>

                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" id="password" name="password">
                                <label class="mdl-textfield__label" for="password">Password</label>
                              </div>

                              <!-- <div class="mdl-textfield is-invalid mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="email" name="email">
                                <label class="mdl-textfield__label" for="email">Email Address</label>
                              </div>

                              <div class="mdl-textfield is-invalid mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" id="password" name="password">
                                <label class="mdl-textfield__label" for="password">Password</label>
                              </div> -->

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