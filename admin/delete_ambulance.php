<?php
include "../conn.php";

$id = $_GET['id'];

$query = "DELETE FROM ambulances WHERE ambulance_id = '$id'";

$runn = mysqli_query($conn, $query);

if ($runn) {
    echo "<script>window.location.href='ambulance.php'</script>";
} else {
    echo "<script>alert('Something went wrong please retry!')</script>";
    echo "<script>window.location.href='ambulance.php'</script>";
}
