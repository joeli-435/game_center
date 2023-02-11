<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="css/home_style.css" rel="stylesheet" type="text/css">
	</head>
	<body class="loggedin">
		<div class="heading">
			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8YWj3YI1RZEONcUKqKl_cNkrpTmxsKik-Tg&usqp=CAU">
			<ul>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="logout.php"></i>Logout</a></li>
			</ul>
		</div>
		<hr>

		<div class="content">
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
			<div class="game1">
				<a href="game/tictactoe/index.html">
					<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRH94Yxy0rFdICaosDLM4o-S6R9nSG5iASWFA&usqp=CAU">
					<br><br>
					<div class="game-title">Tic Tac Toe</div>
				</a>
			</div>
		</div>
	</body>
</html>
