<?php
session_start();
include '../conn.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);

    if (mysqli_num_rows($run) === 1) {
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        echo '<scrpit>alert("Record Submitted!")</script>';
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('wrong email or password!')</script>";
        echo "<script>window.location.href='signin.php'</script>";
    }
}
