<?php
//include both the dbconnect and sescheck files
require('./conf/dbconnect.php');
require('./conf/sescheck.php');

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.airtable.com/v0/appxK235pwGiNXlk7/Attendees?maxRecords=100&view=Grid%20view",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer keyG31qdHfQ6RTJp4",
    "cache-control: no-cache",
    "postman-token: 59323f88-7e62-1edd-942e-cb60658639cb"
  ),
));

$response = curl_exec($curl);
$records = $response['records'];
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $records;
}
?>

<html>
    <head>
        <title>Attendees ~ HackPanel</title>
        <link rel="stylesheet" href="./css/attendees.css">
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
		
		<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
  			<thead>
    			<tr>
      				<th class="mdl-data-table__cell--non-numeric">First Name</th>
      				<th class="mdl-data-table__cell--non-numeric">Surname</th>
      				<th class="mdl-data-table__cell--non-numeric">Email Address</th>
					<th class="mdl-data-table__cell--non-numeric">HackPanel Role</th>
					<th class="mdl-data-table__cell--non-numeric">University</th>
    			</tr>
  			</thead>
  			<tbody>
    			<tr>
					<td class="mdl-data-table__cell--non-numeric"><?php echo($response['first_name']); ?></td>
					<td class="mdl-data-table__cell--non-numeric">User</td>
					<td class="mdl-data-table__cell--non-numeric">hacs@bullhacks.tech</td>
					<td>3</td>
					<td class="mdl-data-table__cell--non-numeric">Birmingham City University</td>
				</tr>
  			</tbody>
		</table>	
    	</div>
    </body>
</html>