<?php
include "../conn.php";

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $DOB = $_POST['DOB'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $query = "INSERT INTO user ( first_name, last_name, email, contact, date_of_birth, password, address )
    VALUES ( '$firstname', '$lastname', '$email', '$contact', '$DOB', '$password', '$address' )";

    $run = mysqli_query(mysql: $conn, query: $query);
    if ($run) {
        echo "<script>alert('Record Submitted!')</script>";
    }
}
