<!DOCTYPE html>
<html lang="en">

<?php
include "../conn.php";
include "include/head.php";
?>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        <?php include "include/sidebar.php"; ?>

        <!-- Content Start -->
        <div class="content">

            <?php include "include/navbar.php"; ?>
            EMT_id first_name last_name certificate contact email
            <?php
            if (isset($_POST['submit'])) {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $certificate = $_POST['certificate'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $query = "INSERT INTO ambulances (first_name, last_name, certificate , contact, email) VALUES ('$first_name', '$last_name', '$certificate' , '$contact' , '$email')";
                $run = mysqli_query($conn, $query);

                if ($run) {
                    // echo "<script>alert('Record is submitted!')</script>";
                } else {
                    echo "<script>alert('Something went wrong please retry!')</script>";
                }
            }
            ?>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4 mb-4">
                    <h1>Ambulance</h1>
                    <form method="POST" class="mt-4 mb-4">
                        <div class="col-12">
                            <input type="text" name="first_name" class="form-control border border-white" placeholder="Enter first name">
                        </div>
                        <br>
                        <div class="col-12">
                            <input type="text" name="last_name" class="form-control border border-white" placeholder="Enter last name">
                        </div>
                        <br>
                        <div class="col-12">
                            <input type="text" name="contact" class="form-control border border-white bg-dark" placeholder="Enter contact">
                        </div>
                        <br>
                        <div class="col-12">
                            <input type="text" name="email" class="form-control border border-white bg-dark" placeholder="Enter email">
                        </div>
                        <br>
                        <div class="col-12 d-flex">
                            <input class="btn btn-primary flex-grow-1" type="submit" name="submit" value="Create" class="btn m-2 ab">
                        </div>
                    </form>
                </div>

                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Ambulances</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">EMT id</th>
                                    <th scope="col">First name</th>
                                    <th scope="col">Last name</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">certificate</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from ambulances ";

                                $runn = mysqli_query($conn, $query);

                                while ($rows = mysqli_fetch_array($runn)) {
                                ?> <tr>
                                        <td><?= $rows['first_name'] ?></td>
                                        <td><?= $rows['last_name'] ?></td>
                                        <td><?= $rows['contact'] ?></td>
                                        <td><?= $rows['email'] ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="delete_ambulance.php?id=<?= $rows['ambulance_id'] ?>">Delete</a>
                                            <a class="btn btn-sm btn-primary" href="edit_ambulance.php?id=<?= $rows['ambulance_id'] ?>">Edit</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- Content End -->

    </div>

    <?php include "include/scripts.php"; ?>

</body>

</html>