<?php
include 'require_signin.php';
include '../conn.php';

if (isset($_POST['submit'])) {
	$user_id = $_SESSION['user_id'];
	$hospital_name = $_POST['hospital_name'];
	$hospital_address = $_POST['hospital_address'];
	$contact = $_POST['contact'];
	$pickup_address = $_POST['pickup_address'];
	$request_type = $_POST['request_type'];

	$query = "INSERT INTO `emergency_requests`(`user_id`, `hospital_name`, `hospital_address`, `contact`, `pickup_address`, `request_type`)
	VALUES ('$user_id','$hospital_name','$hospital_address','$contact','$pickup_address','$request_type')";
	$run = mysqli_query($conn, $query);

	if ($run) {
		echo "<script>alert('We are on our way, please stay calm and follow first-aid instructions.')</script>";
		echo "<script>window.location.href='first-aid.php'</script>";
	} else {
		echo "<script>alert('Something went wrong, please try again!')</script>";
		echo "<script>window.location.href='index.php'</script>";
	}
	echo '<h1>dookie</h1>';
}
