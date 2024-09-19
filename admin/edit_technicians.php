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
            <?php
            ob_start();
            $id = $_GET['id'];
            $query = "SELECT * FROM emt WHERE EMT_id = $id";
            $runn = mysqli_query($conn, $query);
            $data =  mysqli_fetch_array($runn);
            ob_end_flush();
            if (isset($_POST["submit"])) {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $imgname = $_FILES['certificate']['name'];
                $mfile = $_FILES['certificate']['tmp_name'];
                move_uploaded_file($mfile, "img/" . $imgname);

                $queryys = "UPDATE emt SET first_name = '$first_name', last_name = '$last_name', contact = '$contact', email = '$email', certificate = '$imgname' WHERE EMT_id = $id";


                $runn = mysqli_query($conn, $queryys);

                if ($runn) {
                    echo "<script>window.location.href='technicians.php'</script>";
                } else {
                    echo "<script>alert('Something went wrong please retry!')</script>";
                    echo "<script>window.location.href='technicians.php'</script>";
                }
            }
            ?>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4 mb-4">
                    <h1>Technicians</h1>
                    <form method="POST" class="mt-4 mb-4" enctype="multipart/form-data">
                        <div class="col-12">
                            <input type="text" name="first_name" class="form-control border border-white" placeholder="Enter first name"
                                value="<?php echo $data['first_name'] ?>">
                        </div>
                        <br>
                        <div class="col-12">
                            <input type="text" name="last_name" class="form-control border border-white" placeholder="Enter last name"
                                value="<?php echo $data['last_name'] ?>">
                        </div>
                        <br>
                        <div class="col-12">
                            <input type="text" name="contact" class="form-control border border-white bg-dark" placeholder="Enter contact"
                                value="<?php echo $data['contact'] ?>">
                        </div>
                        <br>
                        <div class="col-12">
                            <input type="text" name="email" class="form-control border border-white bg-dark" placeholder="Enter email"
                                value="<?php echo $data['email'] ?>">
                        </div>
                        <br>
                        <div class="col-12">
                            <input type="file" name="certificate" class="form-control border border-white bg-dark"
                                value="<?php echo $data['certificate'] ?>">
                        </div>
                        <br>
                        <div class="col-12 d-flex">
                            <input class="btn btn-primary flex-grow-1" type="submit" name="submit" value="Update" class="btn m-2 ab">
                        </div>
                    </form>
                </div>


            </div>

        </div>
        <!-- Content End -->

    </div>

    <?php include "include/scripts.php"; ?>

</body>

</html>