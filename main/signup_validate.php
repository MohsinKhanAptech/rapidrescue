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
	$image = $_FILES['images']['name'];
	$imgpath = $_FILES['images']['tmp_name'];
	move_uploaded_file($imgpath, 'user_images/' . $image);

	$query = "SELECT * FROM user WHERE email = '$email'";

	$row = mysqli_fetch_array(mysqli_query($conn, $query));

	if ($row > 0) {
		echo '<scrpit>alert("Email is already registered to another account!")</script>';
		header('location:singup.php');
	}

	$password = password_hash($password, PASSWORD_BCRYPT);
	if (!$password) {
		echo "<script>alert('password hashing error, please try a different password!')</script>";
		header('location:login.php');
	}

	$query = "INSERT INTO user ( first_name, last_name, email, contact, date_of_birth, gender, password, address, image )
    VALUES ( '$firstname', '$lastname', '$email', '$contact', '$DOB', '$gender', '$password', '$address', '$image' )";

	$run = mysqli_query(mysql: $conn, query: $query);
	if ($run) {
		header('location:index.php');
	} else {
		echo '<scrpit>alert("Something went wrong!")</script>';
	}
}
