<?php
include "../conn.php";

// Sanitize the editid parameter to ensure it's an integer
$id = isset($_GET['editid']) ? intval($_GET['editid']) : 0;

if ($id > 0) {
    // Fetch user data for editing
    $query = "SELECT * FROM user WHERE user_id = $id";
    $run = mysqli_query($conn, $query);

    // Error handling for query execution
    if (!$run) {
        die("Error fetching user data: " . mysqli_error($conn)); // Show the SQL error message
    }

    $row = mysqli_fetch_array($run); // Fetch data if the query runs successfully
} else {
    die("Invalid user ID.");
}

// Profile Edit Button (including Image Change)
if (isset($_POST['editprofile'])) {
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    // Handle Image Upload
    $image = $row['images']; // Use existing image if no new image is uploaded
    if (!empty($_FILES['images']['name'])) {
        $image = $_FILES['images']['name'];
        $tmppath = $_FILES['images']['tmp_name'];
        if (!move_uploaded_file($tmppath, 'user_images/' . $image)) {
            die("Error uploading image");
        }
    } else {
        $image = $row['Images'];
    }

    // Update Profile Data and Image
    $updateQuery = "UPDATE user
                    SET first_name = '$first_name',
                        last_name = '$last_name',
                        email = '$email',
                        contact = '$contact',
                        password = '$password',
                        date_of_birth = '$dob',
                        gender = '$gender',
                        address = '$address',
                        images = '$image'
                    WHERE user_id = $id;";

    $run2 = mysqli_query($conn, $updateQuery);

    // Error handling for the update query
    if ($run2) {
        echo "<script>alert('Profile has been updated');window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error updating profile: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Profile</title>
    <style>
        .input-field {
            position: relative;
        }

        .input-field input,
        select {
            width: 100%;
            height: 60px;
            font-size: 18px;
            padding: 0 15px;
            border: none;
            border-bottom: 1px solid #000;
            outline: none;
        }

        .input-field label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            font-size: 18px;
            pointer-events: none;
        }

        input:focus~label,
        input:valid~label {
            top: 0;
            left: 15px;
            font-size: 16px;
        }
    </style>
</head>

<body style="background-color: #086b68;">

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 m-auto">
                <form method="POST" enctype="multipart/form-data">
                    <div class="text-center">
                        <img class="img-account-profile rounded-circle" src="user_images/<?php echo $row['Images']; ?>" width="220" height="220" alt="User Image">
                        <br><br>
                        <input type="file" name="images"><br><br>
                    </div>
            </div>

            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right text-primary-emphasis fw-semibold">Edit Profile</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 my-4">
                            <div class="input-field">
                                <input type="text" name="fname" required spellcheck="false" value="<?php echo $row['first_name']; ?>">
                                <label class="labels">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6 my-4">
                            <div class="input-field">
                                <input type="text" name="lname" required spellcheck="false" value="<?php echo $row['last_name']; ?>">
                                <label class="labels">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-6 my-4">
                            <div class="input-field">
                                <input type="email" name="email" required spellcheck="false" value="<?php echo $row['email']; ?>">
                                <label class="labels">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6 my-4">
                            <div class="input-field">
                                <input type="text" name="contact" required spellcheck="false" value="<?php echo $row['contact']; ?>">
                                <label class="labels">Contact</label>
                            </div>
                        </div>
                        <div class="col-md-6 my-4">
                            <div class="input-field">
                                <input type="text" name="password" required spellcheck="false" value="<?php echo $row['password']; ?>">
                                <label class="labels">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6 my-4">
                            <div class="input-field">
                                <input type="date" name="dob" required spellcheck="false" value="<?php echo $row['date_of_birth']; ?>">
                                <label class="labels">Date of Birth</label>
                            </div>
                        </div>
                        <div class="col-md-6 my-4">
                            <div class="input-field">
                                <select name="gender" required>
                                    <option value="" disabled>Select Gender</option>
                                    <option value="male" <?php if ($row['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                    <option value="female" <?php if ($row['gender'] == 'female') echo 'selected'; ?>>Female</option>
                                    <option value="other" <?php if ($row['gender'] == 'other') echo 'selected'; ?>>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 my-4">
                            <div class="input-field">
                                <input type="text" name="address" required spellcheck="false" value="<?php echo $row['address']; ?>">
                                <label class="labels">Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <input class="btn btn-primary" type="submit" value="Edit Profile" name="editprofile">
                    </div>
                </div>
                </form> <!-- Closing the form here -->
            </div>
        </div>
    </div>

</body>

</html>