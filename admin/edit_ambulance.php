<!DOCTYPE html>
<html lang="en">
<?php
include "../conn.php";


ob_start();

$id = $_GET['id'];

$query = "SELECT * FROM ambulances WHERE ambulance_id = $id";

$runn = mysqli_query($conn, $query);

$data =  mysqli_fetch_array($runn);

ob_end_flush();

if (isset($_POST["submit"])) {

    $vehicle_number = $_POST['vehicle_number'];
    $equipment_level = $_POST['equipment_level'];
    $current_advance = $_POST['current_advance'];

    $queryys = "UPDATE ambulances SET vehicle_number = '$vehicle_number', equipment_level = '$equipment_level' , current_advance = '$current_advance' WHERE ambulance_id = '$id'";


    $runn = mysqli_query($conn, $queryys);

    if ($runn) {
        echo "<script>window.location.href='index.php'</script>";
    }
}
?>
<?php
include "../conn.php";

include "include/head.php"; ?>

<body>
    <div class="container-fluid position-relative d-flex p-0">


        <?php include "include/sidebar.php"; ?>

        <!-- Content Start -->
        <div class="content">

            <?php include "include/navbar.php"; ?>

            <div class="container-fluid pt-4 px-4">
                <form method="POST" class="mt-4">
                    <div class="col-12">
                        <input type="text" name="vehicle_number" class="form-control border border-white" placeholder="Enter current advance" value="<?php echo $data['vehicle_number'] ?>">
                    </div>
                    <br>
                    <div class="col-12">
                        <input type="text" name="equipment_level" class="form-control border border-white" placeholder="Enter equipment level"
                            value="<?php echo $data['equipment_level'] ?>">
                    </div>
                    <br>
                    <div class="col-12">
                        <input type="text" name="current_advance" class="form-control border border-white bg-dark" placeholder="Enter current advance"
                            value="<?php echo $data['current_advance'] ?>">
                    </div>
                    <br>
                    <div class="col-3">
                        <input type="submit" name="submit" value="Create" class="btn m-2 ab">
                    </div>
                </form>

            </div>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include "include/scripts.php"; ?>

</body>

</html>