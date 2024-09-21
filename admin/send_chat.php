<?php
include("../conn.php");

try {
    // Check if the POST request contains the required data
    if (isset($_POST['message'])) {
        $admin_id = $_SESSION['admin_id'];
        $message = $_POST['message'];

        // Insert the chat message into the database
        $query = "INSERT INTO chat (admin_id, driver_id, chat) VALUES ($admin_id, $driver_id, $message)";
        $run = mysqli_query($con, $query);
        // Return success response
        echo json_encode(['status' => 'success', 'message' => 'Message sent']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
