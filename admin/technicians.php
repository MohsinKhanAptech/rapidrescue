<!DOCTYPE html>
<html lang="en">
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }

    .close-btn {
        display: block;
        margin: 20px auto;
        background-color: #f44336;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .close-btn:hover {
        background-color: #d32f2f;
    }
</style>


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
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $imgname = $_FILES['certificate']['name'];
                $mfile = $_FILES['certificate']['tmp_name'];
                move_uploaded_file($mfile, "img/" . $imgname);
                $query = "INSERT INTO emt (first_name, last_name , contact, email , certificate) VALUES ('$first_name', '$last_name' , '$contact' , '$email', '$imgname')";
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
                    <h1>Technicians</h1>
                    <form method="POST" class="mt-4 mb-4" enctype="multipart/form-data">
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
                        <div class="col-12">
                            <input type="file" name="certificate" class="form-control border border-white bg-dark">
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
                                    <th scope="col">Certificate</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from emt";
                                $runn = mysqli_query($conn, $query);

                                while ($rows = mysqli_fetch_array($runn)) {
                                ?>
                                    <tr>
                                        <td><?= $rows['EMT_id'] ?></td>
                                        <td><?= $rows['first_name'] ?></td>
                                        <td><?= $rows['last_name'] ?></td>
                                        <td><?= $rows['contact'] ?></td>
                                        <td><?= $rows['email'] ?></td>
                                        <!-- Image with click event to open modal -->
                                        <td>
                                            <img src="<?php echo "img/" . $rows['certificate'] ?>" width="50px" height="50px" style="cursor:pointer;" onclick="OpenImage('<?php echo 'img/' . $rows['certificate']; ?>')" alt="">
                                        </td>

                                        <td>
                                            <a class="btn btn-sm btn-primary" href="delete_technicians.php?id=<?= $rows['EMT_id'] ?> " onclick="return confirm('Are you sure you want to delete this request?')">Delete</a>
                                            <a class="btn btn-sm btn-primary" href="edit_technicians.php?id=<?= $rows['EMT_id'] ?>">Edit</a>
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


        <div id="imageModal" class="modal" style="display:none;">
            <span class="close" onclick="closeImage()">&times;</span>
            <img class="modal-content" id="imgInModal">
            <button class="close-btn" onclick="closeImage()">Close</button>
        </div>

        <script>
            function OpenImage(imageUrl) {
                var modal = document.getElementById("imageModal");
                var modalImg = document.getElementById("imgInModal");
                modal.style.display = "block";
                modalImg.src = imageUrl;
            }

            // Close the Modal
            function closeImage() {
                document.getElementById("imageModal").style.display = "none";
            }
        </script>


    </div>

    <?php include "include/scripts.php"; ?>

</body>

</html>