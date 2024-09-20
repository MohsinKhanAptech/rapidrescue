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