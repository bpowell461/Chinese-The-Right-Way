<?php

session_start();

if (!isset($_SESSION['loggedin'])) {
	header('Location: ../pages/login.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT email, isTeacher, Progress, DateJoined FROM accounts WHERE id = ?');

$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($email, $isTeacher, $Progress, $DateJoined);
$stmt->fetch();
$stmt->close();

if ($isTeacher)
{
	$AccType = 'Teacher';
}
else
{
	$AccType = 'Student';
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
	<ul class="navbar">
    <li class="navbutton"><a href="../index.php" class="headerButton">Home</a></li>
    <li class="navbutton"><a href="../pages/flashcards.php" class="headerButton">Flashcards</a></li>
    <li class="navbutton"><a href="../pages/huamulan.php" class="headerButton">Hua Mulan</a></li>
    <li class="navbutton"><a href="../pages/resources.php" class="headerButton">Resources</a></li>
    <li class="navbutton"><a href="../pages/db.php" class="headerButton">Database</a></li>
    <!-- <li class="navbutton"><a href="../php/login.php" class="headerButton"><i class="fas fa-user-circle"></i> Account</a></li> -->
	<li class="navbutton"><a href="../php/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
</ul>

		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Progress Level:</td>
						<td><?=$Progress?></td>
					</tr>
					<tr>
						<td>Account Type:</td>
						<td><?=$AccType?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
					<tr>
						<td>Date Joined:</td>
						<td><?=$DateJoined?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>