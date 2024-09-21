<?php
include("require_signin.php");
include("../conn.php");

if (isset($_POST["submit"])) {
    $admin_id = $_SESSION['admin_id'];
    $driver_id = $_POST['driver_id'];
    $chat = $_POST['chat'];

    // Insert the chat message into the database
    $query = "INSERT INTO chat (admin_id, driver_id, sender, chat) VALUES ('$admin_id', '$driver_id', 'admin', '$chat')";
    $run = mysqli_query($conn, $query);

    if ($run) {
        header('location:chat.php');
    } else {
        echo "<script>alert('Something went wrong please retry!')</script>";
        echo "<script>window.location.href='chat.php'</script>";
    }
}
