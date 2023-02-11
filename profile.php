<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="css/profile_style.css" rel="stylesheet" type="text/css">
		</head>
	<body class="loggedin">
        <div class="heading">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8YWj3YI1RZEONcUKqKl_cNkrpTmxsKik-Tg&usqp=CAU">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="logout.php"></i>Logout</a></li>
            </ul>
        </div>
        <hr>
		<div class="content">
			<h3>Account details</h3>
			<table>
				<tr>
					<td>Username:</td>
					<td><?=$_SESSION['name']?></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><?=$password?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?=$email?></td>
				</tr>
			</table>
	
		</div>
	</body>
</html>