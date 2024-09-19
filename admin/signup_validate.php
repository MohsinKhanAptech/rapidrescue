<?php
include "../conn.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO admin ( name , email , password )
    VALUES ( '$name', '$email' , '$password' )";

    $run = mysqli_query(mysql: $conn, query: $query);
    if ($run) {
        echo "<script>alert('Record Submitted!')</script>";
    }
}
