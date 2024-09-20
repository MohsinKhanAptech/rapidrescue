<?php
session_start();
if (isset($_SESSION['emt_contact'])) {
    $email = $_SESSION['emt_contact'];
} else {
    header('location: signin.php');
}
