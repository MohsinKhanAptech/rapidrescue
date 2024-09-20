<?php
session_start();
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
	$images = $_FILES['images']['name'];
	$imgpath = $_FILES['images']['tmp_name'];
	move_uploaded_file($imgpath, 'user_images/' . $images);

	$query = "SELECT * FROM user WHERE email = '$email'";
	$run = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($run);

	if (mysqli_num_rows($run) > 0) {
		echo '<scrpit>alert("Email is already registered to another account!")</script>';
		echo "<script>window.location.href='singup.php'</script>";
	}

	$password = password_hash($password, PASSWORD_BCRYPT);
	if (!$password) {
		echo "<script>alert('password hashing error, please try a different password!')</script>";
		echo "<script>window.location.href='signup.php'</script>";
	}

	$query = "INSERT INTO user (first_name, last_name, email, contact, password, date_of_birth, gender, address, Images)
              VALUES ('$first_name', '$last_name', '$email', '$contact', '$password', '$dob', '$gender', '$address', '$images')";
	$run = mysqli_query(mysql: $conn, query: $query);
	if ($run) {
		header('location:signin.php');
	} else {
		echo '<scrpit>alert("Something went wrong!")</script>';
		echo "<script>window.location.href='signup.php'</script>";
	}
}
