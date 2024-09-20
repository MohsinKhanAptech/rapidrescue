<?php
session_start();
if (isset($_SESSION['admin_email'])) {
    $email = $_SESSION['admin_email'];
} else {
    header('location: signin.php');
}
