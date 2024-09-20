<?php
session_start();

include '../conn.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email = '$email'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);

    $hash = $row('password');

    if (mysqli_num_rows($run) === 1 && password_verify($password, $hash)) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['first_name'];
        header('location:index.php');
    } else {
        echo "<script>alert('wrong email or password!')</script>";
        echo "<script>window.location.href='signin.php'</script>";
    }
    echo '<h1>dookie</h1>';
}
