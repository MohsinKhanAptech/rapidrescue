<!DOCTYPE html>
<html lang="en">

<?php
include "../conn.php";

include "include/head.php"; ?>

<body>
    <div class="container-fluid position-relative d-flex p-0">


        <?php include "include/sidebar.php"; ?>

        <!-- Content Start -->
        <div class="content">

            <?php include "include/navbar.php"; ?>


            <!-- Recent Sales Start -->
            <?php
            if (isset($_POST['submit'])) {
                $vehicle_number = $_POST['vehicle_number'];
                $equipment_level = $_POST['equipment_level'];
                $current_advance = $_POST['current_advance'];
                $query = "INSERT INTO ambulances (vehicle_number, equipment_level, current_advance) VALUES ('$vehicle_number', '$equipment_level', '$current_advance')";
                $run = mysqli_query($conn, $query);

                if ($run) {
                    echo "<script>alert('Record is submitted!')</script>";
                }
            }
            ?>
            <div class="container-fluid pt-4 px-4">
                <form method="POST" class="mt-4">
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
                    <div class="col-3">
                        <input type="submit" name="submit" value="Create" class="btn m-2 ab">
                    </div>
                </form>





                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
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
                                        <td><input class="form-check-input" type="checkbox"></td>

                                        <td><?php echo $rows['ambulance_id'] ?></td>
                                        <td><?php echo $rows['vehicle_number'] ?></td>
                                        <td><?php echo $rows['equipment_level'] ?></td>
                                        <td><?php echo $rows['current_advance'] ?></td>
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
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">Messages</h6>
                                <a href="">Show All</a>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center pt-3">
                                <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0">Jhon Doe</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                    <span>Short message goes here...</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Widgets End -->



        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include "include/scripts.php"; ?>

</body>

</html>