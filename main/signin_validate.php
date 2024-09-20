<?php
include '../conn.php';
session_start();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_BCRYPT);
    if (!$password) {
        echo "<script>alert('wrong email or password!')</script>";
        header('location:signin.php');
    }

    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);

    if (mysqli_num_rows($run) == 1) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['first_name'];
        header('location:index.php');
    } else {
        echo "<script>alert('wrong email or password!')</script>";
        header('location:signin.php');
    }
}
