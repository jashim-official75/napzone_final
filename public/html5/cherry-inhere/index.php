<?php
include_once("../DB.php");

$stmt = DB::connect()->prepare("SELECT * FROM subscribers WHERE `token`=:token");
$stmt->bindParam(':token', $_REQUEST['token']);
$stmt->execute();
$data = $stmt->fetch();

if ($data['otp_verified'] == 1) {
?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="UTF-8">
		<title>Cherry Inhere</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

		<meta name="generator" content="Construct 3">
		<meta name="author" content="NAPTECH LABS LTD">
		<meta name="description" content="Do you have the skills to keep something inside for long? Then Cherry Inhere brings you the perfect game to enhance your anticipating skills. The game that offers you the best feeling to witness one of the best ping pong games there is.  This pong ball game is ready to blow your mind. Your objective here will be to keep the ping ball in a circle. More of a tennis ball to keep within the circle. The more you keep the ping ball in the circle, the more you score!">
		<link rel="manifest" href="appmanifest.json">
		<link rel="apple-touch-icon" sizes="128x128" href="icons/icon-128.png">
		<link rel="apple-touch-icon" sizes="256x256" href="icons/icon-256.png">
		<link rel="icon" type="image/png" href="icons/icon-256.png">

		<link rel="stylesheet" href="style.css">

	</head>

	<body>
		<div id="fb-root"></div>

		<noscript>
			<div id="notSupportedWrap">
				<h2 id="notSupportedTitle">This content requires JavaScript</h2>
				<p class="notSupportedMessage">JavaScript appears to be disabled. Please enable it to view this content.</p>
			</div>
		</noscript>
		<script src="scripts/supportcheck.js"></script>
		<script src="scripts/main.js" type="module"></script>
		<script src="scripts/register-sw.js" type="module"></script>
	</body>

	</html>
<?php
} else {
	header("Location: https://test.napzone.games", true);
	die();
}

?>