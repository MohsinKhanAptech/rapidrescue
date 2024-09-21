<?php
    include("../conn.php");
try {

    // SQL query to fetch chats
    $query = "SELECT * FROM chat 
    INNER JOIN `driver` on chat.driver_id = driver.driver_id 
    ORDER BY chat.timestamp DESC";
    $run = mysqli_query($conn, $query);
    $chats = mysqli_fetch_all($run);

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($chats);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
