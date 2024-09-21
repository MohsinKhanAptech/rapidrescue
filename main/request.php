<!DOCTYPE html>
<html lang="en">

<?php
include 'require_signin.php';
include 'include/head.php';
include '../conn.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM `medical_profile` WHERE `user_id` = '$user_id'";
$run = mysqli_query($conn,$query );
$row = mysqli_fetch_array($run);

if (mysqli_num_rows($run) === 0) {
    header("location:medical_profile.php");
}

?>

<body>

	<div class="container-fluid d-flex justify-content-center align-items-center vw-100 vh-100">
		<div class="container">
			<div class="row justify-content-center position-relative" style=" z-index: 1;">
				<div class="col-lg-8">
					<div class="bg-white rounded p-5 m-5">
						<h1 class="w-100 text-center mb-4">Ambulance Request Form</h1>
						<form action="request_validate.php" method="post">
							<div class="row g-3">
								<div class="col-6">
									<input type="text" name="hospital_name" class="form-control bg-light border-0 p-2" required placeholder="Hospital Name">
								</div>
								<div class="col-6">
									<input type="text" name="hospital_address" class="form-control bg-light border-0 p-2" required placeholder="Hospital Address">
								</div>
								<div class="col-6">
									<input type="text" name="contact" class="form-control bg-light border-0 p-2" required placeholder="Contact Number">
								</div>
								<div class="col-6">
									<input type="text" name="pickup_address" class="form-control bg-light border-0 p-2" required placeholder="Pickup Address">
								</div>
								<div class="col-12">
									<select name="requst_type" class="form-control bg-light border-0 p-2">
										<option value="normal">Non-Emergency</option>
										<option value="emergency">Emergency</option>
									</select>
								</div>
								<div class="col-12">
									<input type="submit" name="submit" value="Request" class="btn btn-primary w-100 py-2">
								</div>
								<div class="col-12">
									<input type="button" onclick="window.location.href='index.php'" class="btn btn-light w-100 py-2" value="Cancel">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
