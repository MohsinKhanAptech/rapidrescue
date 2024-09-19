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

            <!-- Recent Sales Start -->
            <?php
            if (isset($_POST['submit'])) {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $contact = $_POST['contact'];
                $query = "INSERT INTO driver (first_name, last_name, contact) VALUES ('$first_name', '$last_name', '$contact')";
                $run = mysqli_query($conn, $query);

                if ($run) {
                    echo "<script>alert('Record is submitted!')</script>";
                }
            }
            ?>
            <div class="container-fluid pt-4 px-4">
                <<<<<<< HEAD:admin/driver.php
                    <form method="POST" class="mt-4 mb-4">
                    =======
                    <h1>Add Drivers</h1>

                    <form method="POST" class="mt-4">
                        >>>>>>> 6e41be52f63a3425d3d417e57e87e3bcbdb4ad92:admin/drivers_profile.php
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
                        <div class="col-12 d-flex">
                            <input class="flex-grow-1 btn btn-primary" type="submit" name="submit" value="Create" class="btn m-2 ab">
                        </div>
                    </form>

                    <div class="bg-secondary text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Drivers</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col">Driver id</th>
                                        <th scope="col">First name</th>
                                        <th scope="col">Last name</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * from driver";

                                    $runn = mysqli_query($conn, $query);

                                    while ($rows = mysqli_fetch_array($runn)) {
                                    ?> <tr>
                                            <<<<<<< HEAD:admin/driver.php
                                                <td><?= $rows['driver_id'] ?></td>
                                                <td><?= $rows['first_name'] ?></td>
                                                <td><?= $rows['last_name'] ?></td>
                                                <td><?= $rows['contact'] ?></td>
                                                =======

                                                <td><?php echo $rows['driver_id'] ?></td>
                                                <td><?php echo $rows['first_name'] ?></td>
                                                <td><?php echo $rows['last_name'] ?></td>
                                                <td><?php echo $rows['contact'] ?></td>
                                                >>>>>>> 6e41be52f63a3425d3d417e57e87e3bcbdb4ad92:admin/drivers_profile.php
                                                <td>
                                                    <a class="btn btn-sm btn-primary" href="delete_drivers_profile.php?id=<?= $rows['driver_id'] ?>">Delete</a>
                                                    <a class="btn btn-sm btn-primary" href="edit_drivers_profile.php?id=<?= $rows['driver_id'] ?>">Edit</a>
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
            <!-- Recent Sales End -->

        </div>
        <!-- Content End -->

    </div>

    <?php include "include/scripts.php"; ?>

</body>

</html>