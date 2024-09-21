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
                        <h6 class="mb-0">User Medical Profile</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">Medical profile id </th>
                                    <th scope="col">User id</th>
                                    <th scope="col">Medical history</th>
                                    <th scope="col">Allergies</th>
                                    <th scope="col">Emergency_contact</th>             
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from medical_profile ";

                                $runn = mysqli_query($conn, $query);

                                while ($rows = mysqli_fetch_array($runn)) {
                                ?> <tr>
                                        <td><?= $rows['medical_profile_id'] ?></td>
                                        <td><?= $rows['user_id'] ?></td>
                                        <td><?= $rows['medical_history'] ?></td>
                                        <td><?= $rows['allergies'] ?></td>
                                        <td><?= $rows['emergency_contact'] ?></td>           
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