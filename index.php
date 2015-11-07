<?php 
error_reporting(0); //Remove this if you do not seem to get your loading screen to work if you have tried other options

$APIKey = "8FC01A0822C9ED1E6E76CD12B82F931D"; // Go get your API here: http://steamcommunity.com/dev/apikey

include ('includes/errorcheck.php'); //To see whether or not you have the right extension in your URL

$steamid64 = $_GET["steamid"];

//This basically gets us the information needed to output information about the user.
$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=" . $APIKey . "&steamids=" . $steamid64;
$json = file_get_contents($url);
$table2 = json_decode($json, true);
$table = $table2["response"]["players"][0];

//This converts the 62bit ID to a 32bit ID - a commonly used ID.
$authserver = bcsub($steamid64, '76561197960265728') & 1;
$authid = (bcsub($steamid64, '76561197960265728')-$authserver)/2;
$steamid32 = "STEAM_0:$authserver:$authid";

//This selects the music in the music folder and plays it out in random order, just put your OGG files in the music folder and it'll pop up here!	
$dir = "music/";
$scan = scandir($dir);
$random = rand(2, sizeof($scan)-1);


?>

	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">

<head>
 <title>Striper Loading</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<script type="text/javascript" src="includes/jquery.js"></script>
<script type="text/javascript" src="includes/slider.js"></script>

 <script type="text/javascript">
	//Our cycle script so we can make the pictures fade between each other.
	$('#background').cycle({ 
			fx: 'fade', // You can change the FX way the pictures changes with, an example scrollDown. Check out http://jquery.malsup.com/cycle/ for more about that matter
			speed: 2000, 
			timeout: 4000 
		});
	

    </script>
	<script>
			$(document).ready(function() {
			music = document.getElementById("music");
			music.volume = 0.2;
			music.play();
		});
		</script>
</head>

<audio id="music" autoplay >
    <source src="music/<?php echo $scan[$random]; ?>" type="audio/ogg">
</audio>

<body>
		<div id="background"><!--The pictures are located here, if you want to add more you need to add another div and change its name to +1 of whatever the first one was and go to the stylesheet and add duplicate another style div and do the same thing as with the div in this document -->
			<div id="bg1"> </div>
			<div id="bg2"> </div>
			<div id="bg3"> </div>
			<div id="bg4"> </div>
		</div>
		
	<div class="content"> <!--Opens up our content for editing-->
		<div class="top-box">
			<img src="images/logo.png" class="logo" style="margin-top: 10px; margin-left: -90px;"> 
		</div>
		
			<!--Where the first picture is put in to display -->
				<div class="left-side">
					<div class="top-left-box"></div>
					
					<!--Where the second picture with text is. If you do not want the text to change and want a static text, please delete the script that is marked of the bottom of the HTML code-->
					
					<div class="middle-left-box">
						<!--Want more quotes? Just copy paste the p. div and it will appear in the order it is shown in this document-->
						<p class="middle-left-box-text">
							Welcome to this server. We here at this server look forward to roleplay and assist you if needed. To call an admin, use the @ command and an admin will arrive to you shortly.
						</p>
						
						<p class="middle-left-box-text">
							We hope you have a good time playing TypicalGaming remember to add us to your favourtie servers!
						</p>
						
						<p class="middle-left-box-text">
							The server was made year 2015 and has been run by the original owner (xTypicalZx) and (AnonymousAiden).
						</p>
						
					</div>
					
					<!--Where the third picture is put in to display -->
					<div class="bottom-left-box"></div>
				</div>
			
				<!--The rule list is here. Edit it as you wish! -->
				<div class="middle-box">
					<p class="box-title">Server Rules</p>
					<hr class="blue-line2">
					<table class="server-info-table" style="width:100%">
						<td style="width:15%">
							<div class="server-rule-number">1.</div>
						</td>
						<td style="width:85%">
							You may not use your weapon unless needed
						</td>
					</table>
					<hr class="blue-line2">
					<table class="server-info-table" style="width:100%">
						<td style="width:15%">
							<div class="server-rule-number">2.</div>
						</td>
						<td style="width:85%">
							Using the props in order to break the listed rules is not permitted
						</td>
					</table>
					<hr class="blue-line2">
					<table class="server-info-table" style="width:100%">
						<td style="width:15%">
							<div class="server-rule-number">3.</div>
						</td>
						<td style="width:85%">
							Using your physgun as a laserpointer is not allowed
						</td>
					</table>
						<hr class="blue-line2">
					<table class="server-info-table" style="width:100%">
						<td style="width:15%">
							<div class="server-rule-number">4.</div>
						</td>
						<td style="width:85%">
							Do not go up on the rooftops by building contraptions
						</td>
					</table>
						<hr class="blue-line2">
					<table class="server-info-table" style="width:100%">
						<td style="width:15%">
							<div class="server-rule-number">5.</div>
						</td>
						<td style="width:85%">
							Killing without a reason will lead to a permanent ban
						</td>
					</table>
						<hr class="blue-line2">
					<table class="server-info-table" style="width:100%">
						<td style="width:15%">
							<div class="server-rule-number">6.</div>
						</td>
						<td style="width:85%">
							If a gun is pointed at you, fear it at all times
						</td>
					</table>
						<hr class="blue-line2">
					<table class="server-info-table" style="width:100%">
						<td style="width:15%">
							<div class="server-rule-number">7.</div>
						</td>
						<td style="width:85%">
							Only 2 contrabands in a base at once for equality
						</td>
					</table>
					
				</div>
				
				<!--Information about the server and the connecting user is displayed here. I advise you not to touch any of the codes here as it may cause faults -->
				<div class="right-side">
					<!--The connecting users information is displayed here -->
					<div class="top-right-box">
						<div class="avatar">
						<?php	echo "<img class='avatar-img' src=\"" . $table["avatarfull"] . "\" />";
						?> </div>
						<?php	echo "<p class=\"persona-name\">" . $table["personaname"] . "</p>"; 
						?>
						
						<p class="steam-id"><?php echo $steamid32 ?></p>
					</div>
					<!--The servers information such as gamemode, map and server name is displayed here-->
					<div class="bottom-right-box">
						<p class="box-title">Server Information</p>
						<hr class="blue-line">
						<table class="server-info-table1" style="width:100%">
							<td style="width:25%">
								<div class="server-info-icon1"><i class="fa fa-inbox"></i></div>
							</td>
							<td style="width:85%">
							<div id="server">Server Name</div>
							</td>
						</table>
						<hr class="blue-line">
						<table class="server-info-table1" style="width:100%">
							<td style="width:25%">
								<div class="server-info-icon1"><i class="fa fa-gamepad"></i></div>
							</td>
							<td style="width:85%">
							<div id="gamemode">Server Gamemode</div>
							</td>
						</table>
						<hr class="blue-line">
						<table class="server-info-table1" style="width:100%">
							<td style="width:25%">
								<div class="server-info-icon1"><i class="fa fa-map-marker"></i></div>
							</td>
							<td style="width:85%">
							<div id="map">Server Map</div>
							</td>
						</table>
					</div>
				</div>
			

	</div> 
	<!--Closes our content div-->
	
	<!--We put scripts at the bottom to load the HTML faster -->
	<script type="text/javascript" src="includes/progress-bar.js"></script> <!--The script so we can have a progress bar! -->
	<script type="text/javascript" charset="utf-8">
	// Fetch information about the server, do not touch this or modify this as it tends to break otherwise
	function GameDetails( servername, serverurl, mapname, maxplayers, steamid, gamemode ) { 
	document.getElementById("gamemode").innerHTML = gamemode;
	document.getElementById("server").innerHTML = servername;
	document.getElementById("map").innerHTML = mapname;
	}
	
	//Delete this function if you do not want the text to change and delete the p.divs (except one) and remove the "display: none;" in the middle-left-box-text style line in css/styles.css
	(function() {

    var quotes = $(".middle-left-box-text");
    var quoteIndex = -1;
    
    function showNextQuote() {
        ++quoteIndex;
        quotes.eq(quoteIndex % quotes.length)
            .fadeIn(1000)//How long it will take to fade the message in
            .delay(5000) //For how long the message will show
            .fadeOut(1000, showNextQuote); //How long it will take for the message to fade out and then the next quote showing.
    }
    
    showNextQuote();
    
})();

	
	</script>
</body>
