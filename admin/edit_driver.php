<!DOCTYPE html>
<html lang="en">
<?php
include "../conn.php";

ob_start();

$id = $_GET['id'];

$query = "SELECT * FROM driver WHERE driver_id = $id";

$runn = mysqli_query($conn, $query);

$data =  mysqli_fetch_array($runn);

ob_end_flush();

if (isset($_POST["submit"])) {

    $first_name  = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact = $_POST['contact'];

    $queryys = "UPDATE driver SET first_name = '$first_name', last_name = '$last_name', contact = '$contact' WHERE driver_id = '$id'";

    $runn = mysqli_query($conn, $queryys);

    if ($runn) {
        echo "<script>window.location.href='drivers_profile.php'</script>";
    } else {
        echo "<script>alert('Something went wrong please retry!')</script>";
    }
}
?>

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
                <form method="POST" class="mt-4">
                    <div class="col-12">
                        <input type="text" name="first_name" class="form-control border border-white" placeholder="Edit first name" value="<?php echo $data['first_name'] ?>">
                    </div>
                    <br>
                    <div class="col-12">
                        <input type="text" name="last_name" class="form-control border border-white" placeholder="Edit last name" value="<?php echo $data['last_name'] ?>">
                    </div>
                    <br>
                    <div class="col-12">
                        <input type="text" name="contact" class="form-control border border-white bg-dark" placeholder="Edit contact" value="<?php echo $data['contact'] ?>">
                    </div>
                    <br>
                    <div class="col-12 d-flex">
                        <input class="flex-grow-1 btn btn-primary" type="submit" name="submit" value="Create" class="btn m-2 ab">
                    </div>
                </form>
            </div>

        </div>
        <!-- Content End -->

    </div>

    <?php include "include/scripts.php"; ?>

</body>

</html>