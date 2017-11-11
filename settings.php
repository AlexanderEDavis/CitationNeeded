<?php

//include both the dbconnect and sescheck files
require('./conf/dbconnect.php');
require('./conf/sescheck.php');

?>

<html>
    <head>
        <title>Settings ~ HackPanel</title>
        <link rel="stylesheet" href="./css/main.css">
        <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </head>
    <body>
    <div class="mdl-layout mdl-js-layout">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">HackPanel: BullHacks 2018</span>
                <div class="mdl-layout-spacer"></div>
                <nav class="mdl-navigation">
                   <!-- <form action="logout.php">
						<input type="submit" value="Log Out">
						<button id="btnLogout" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">Log Out</button>
					</form> -->
					<!-- Right aligned menu below button -->
					<button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
  						<i class="material-icons">more_vert</i>
					</button>

					<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
    					for="demo-menu-lower-right">
						<li class="mdl-menu__item"><a style="text-decoration:none; color:black;" href="logout.php">Log Out</a></li>
						<li class="mdl-menu__item"><a style="text-decoration:none; color:black;" href="settings.php">Settings</a></li>
						<li class="mdl-menu__item"><a style="text-decoration:none; color:black;" href="https://airtable.com/shrCr68AzwBT4XyQD" target="_blank">Found a Bug?</a></li>
					</ul>
                </nav>
            </div>
        </header>
        <div id="sidebar" class="mdl-layout__drawer">
            <span class="mdl-layout-title">HackPanel</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="./home.php">Home</a>
                <a class="mdl-navigation__link" href="./attendees.php">Attendees</a>
                <a class="mdl-navigation__link" href="./timetable.php">Timetable</a>
                <a class="mdl-navigation__link" href="./sponsors.php">Sponsors</a>
                <!-- <a class="mdl-navigation__link" href="./otherstuff.php">Other Stuff</a> -->
            </nav>
        </div>
    	</div>
    </body>
</html>