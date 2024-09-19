<?php
include "../conn.php";


$id = $_GET['id'];

$query = "DELETE FROM ambulances WHERE ambulance_id = $id";

$runn = mysqli_query($conn, $query);

if ($runn) {
    echo "<script>window.location.href='index.php'</script>";
}
