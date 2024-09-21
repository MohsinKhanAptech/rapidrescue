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

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Requests</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                <th scope="col">Request id</th>
                                    <th scope="col">User id</th>
                                    <th scope="col">Request time</th>
                                    <th scope="col">Hospital name</th>
                                    <th scope="col">Hospital address</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Pickup address</th>
                                    <th scope="col">Request type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM emergency_requests INNER JOIN  user ON  emergency_requests.user_id = user.user_id;";
                                $runn = mysqli_query($conn, $query);

                                while ($rows = mysqli_fetch_array($runn)) {
                                ?> <tr>
                                        <td><?= $rows['request_id'] ?></td>
                                        <td><?= $rows['user_id'] ?></td>
                                        <td><?= $rows['request_time'] ?></td>
                                        <td><?= $rows['hospital_name'] ?></td>
                                        <td><?= $rows['hospital_address'] ?></td>
                                        <td><?= $rows['contact'] ?></td>
                                        <td><?= $rows['pickup_address'] ?></td>
                                        <td><?= $rows['request_type'] ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="delete_request.php?id=<?= $rows['request_id'] ?> " onclick="return confirm('Are you sure you want to delete this request?')">Delete</a>
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
