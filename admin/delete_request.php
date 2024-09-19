<?php
include "../conn.php";

$id = $_GET['id'];

$query = "DELETE FROM emergency_requests WHERE request_id = $id";

$runn = mysqli_query($conn, $query);

if ($runn) {
    echo "<script>window.location.href='requests.php'</script>";
} else {
    echo "<script>alert('Something went wrong please retry!')</script>";
    echo "<script>window.location.href='requests.php'</script>";
}
