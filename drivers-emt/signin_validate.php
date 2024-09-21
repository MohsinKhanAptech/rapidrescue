<?php
session_start();
include '../conn.php';

if (isset($_POST['submit'])) {
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    $query = "SELECT * FROM driver WHERE contact = '$contact' AND password = '$password'";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);

    if (mysqli_num_rows($run) === 1) {
        $_SESSION['emt_id'] = $row['driver_id'];
        $_SESSION['emt_name'] = $row['first_name'];
        $_SESSION['emt_contact'] = $row['contact'];
        echo '<scrpit>alert("Record Submitted!")</script>';
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('wrong email or password!')</script>";
        echo "<script>window.location.href='signin.php'</script>";
    }
}
