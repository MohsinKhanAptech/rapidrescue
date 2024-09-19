<?php
include "../conn.php";

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $DOB = $_POST['DOB'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $query = "INSERT INTO user ( first_name, last_name, email, contact, date_of_birth, gender, password, address )
    VALUES ( '$firstname', '$lastname', '$email', '$contact', '$DOB', '$gender', '$password', '$address' )";

    $run = mysqli_query(mysql: $conn, query: $query);
    if ($run) {
        header('location:index.html');
    } else {
        echo '<scrpit>alert("Something went wrong!")</script>';
    }
}
