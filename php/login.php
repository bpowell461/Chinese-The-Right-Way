<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../pages/login.html');
	exit();
} else {
	header('Location: profile.php');
	exit();
}
?>
