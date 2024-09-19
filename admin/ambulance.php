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

            <?php
            if (isset($_POST['submit'])) {
                $vehicle_number = $_POST['vehicle_number'];
                $equipment_level = $_POST['equipment_level'];
                $current_advance = $_POST['current_advance'];
                $query = "INSERT INTO ambulances (vehicle_number, equipment_level, current_advance) VALUES ('$vehicle_number', '$equipment_level', '$current_advance')";
                $run = mysqli_query($conn, $query);

                if ($run) {
                    // echo "<script>alert('Record is submitted!')</script>";
                } else {
                    echo "<script>alert('Something went wrong please retry!')</script>";
                }
            }
            ?>
            <div class="container-fluid pt-4 px-4">
                <h1>Add Ambulance</h1>

                <form method="POST" class="mt-4 mb-4">
                    <div class="col-12">
                        <input type="text" name="vehicle_number" class="form-control border border-white" placeholder="Enter current advance">
                    </div>
                    <br>
                    <div class="col-12">
                        <input type="text" name="equipment_level" class="form-control border border-white" placeholder="Enter equipment level">
                    </div>
                    <br>
                    <div class="col-12">
                        <input type="text" name="current_advance" class="form-control border border-white bg-dark" placeholder="Enter current advance">
                    </div>
                    <br>
                    <div class="col-12 d-flex">
                        <input class="btn btn-primary flex-grow-1" type="submit" name="submit" value="Create" class="btn m-2 ab">
                    </div>
                </form>

                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Ambulances</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">ambulance id</th>
                                    <th scope="col">vehicle number</th>
                                    <th scope="col">equipment level</th>
                                    <th scope="col">current advance</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from ambulances ";

                                $runn = mysqli_query($conn, $query);

                                while ($rows = mysqli_fetch_array($runn)) {
                                ?> <tr>
                                        <td><?= $rows['ambulance_id'] ?></td>
                                        <td><?= $rows['vehicle_number'] ?></td>
                                        <td><?= $rows['equipment_level'] ?></td>
                                        <td><?= $rows['current_advance'] ?></td>
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