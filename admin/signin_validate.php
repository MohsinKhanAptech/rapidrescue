<?php
include '../conn.php';
include 'signinsession.php';
session_start();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
    if (mysqli_num_rows($run) == 1) {
        $_SESSION['email'] = $row['user_id'];
        echo '<scrpit>alert("Record Submitted!")</script>';
        header('location:ambulance.php');
    } else {
        echo "<script>alert('wrong email or password!')</script>";
    }
}
