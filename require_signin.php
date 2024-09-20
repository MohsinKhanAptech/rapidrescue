<?php
session_start();
if (isset($_SESSION['user_email'])) {
	$email = $_SESSION['user_email'];
} else {
	header('location: signin.php');
}
