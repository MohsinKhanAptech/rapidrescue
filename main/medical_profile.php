<!DOCTYPE html>
<html lang="en">

<?php
include 'require_signin.php';
include 'include/head.php';
include '../conn.php';

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM `medical_profile` WHERE `user_id` = '$user_id'";
$run = mysqli_query($conn, $query);
$row = mysqli_fetch_array($run);
$edit = false;

if (mysqli_num_rows($run) > 0) {
    $edit = true;
}

if (isset($_POST['submit']) && $edit) {
    $allergies = $_POST['allergies'];
    $emergency_contact = $_POST['emergency_contact'];
    $medical_history = $_POST['medical_history'];
    $query = "UPDATE  medical_profile set `user_id`='$user_id',`medical_history`='$medical_history',`allergies`='$allergies',`emergency_contact`='$emergency_contact' WHERE `user_id` = '$user_id'";

    $run = mysqli_query($conn, $query);

    if ($run) {
        echo "<script>alert('Record is updated!')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong please retry!')</script>";
        echo "<script>window.location.href='medical_profile.php'</script>";
    }
}

if (isset($_POST['submit']) && !$edit) {
    $allergies = $_POST['allergies'];
    $emergency_contact = $_POST['emergency_contact'];
    $medical_history = $_POST['medical_history'];
    $query = "INSERT INTO medical_profile (user_id , allergies, emergency_contact, medical_history) VALUES ('$user_id','$allergies', '$emergency_contact', '$medical_history')";
    $run = mysqli_query($conn, $query);

    if ($run) {
        echo "<script>alert('Record is submitted!')</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Something went wrong please retry!')</script>";
        echo "<script>window.location.href='medical_profile.php'</script>";
    }
}
?>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center vw-100 vh-100">
        <div class="container">
            <div class="row justify-content-center position-relative" style="z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5">
                        <form action="" method="post">
                            <h1 class="text-center mb-5">Medical Profile</h1>
                            <div class="row g-3">

                                <div class="col-12 col-sm-6">
                                    <input type="text" name="allergies" class="form-control bg-light border-0" required placeholder="Enter any allergies" value="<?php if (isset($row['allergies'])) echo $row['allergies']  ?>">
                                </div>

                                <div class="col-12 col-sm-6">
                                    <input type="text" name="emergency_contact" class="form-control bg-light border-0" required placeholder="Enter emergency contact" value="<?php if (isset($row['emergency_contact'])) echo $row['emergency_contact']  ?>">
                                </div>

                                <div class="col-12">
                                    <input type="text" name="medical_history" class="form-control bg-light border-0" required placeholder="Enter your medical history" value="<?php if (isset($row['medical_history'])) echo $row['medical_history']  ?>">
                                </div>
                                <div class="col-12">
                                    <input name="submit" type="submit" class="btn btn-primary w-100 py-2" value="Save">
                                    <br>
                                    <br>
                                    <input name="cancel" type="button" class="btn btn-light w-100 py-2" onclick="window.location.href='index.php'" value="Cancel">
                                    <br>
                                    <br>
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