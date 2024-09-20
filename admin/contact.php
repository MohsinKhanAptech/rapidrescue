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
                <div class="bg-secondary text-center rounded p-4 mb-4">
                    <div class="bg-secondary text-center rounded p-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Contacts</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0">
                                <thead>
                                    <tr class="text-white">
                                        <th scope="col">Contact Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * from contact ";

                                    $runn = mysqli_query($conn, $query);

                                    while ($rows = mysqli_fetch_array($runn)) {
                                    ?> <tr>
                                            <td><?= $rows['contact_id'] ?></td>
                                            <td><?= $rows['name'] ?></td>
                                            <td><?= $rows['email'] ?></td>
                                            <td><?= $rows['subject'] ?></td>
                                            <td><?= $rows['message'] ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="delete_contact.php?id=<?= $rows['contact_id'] ?> " onclick="return confirm('Are you sure you want to delete this request?')">Delete</a>
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