<!DOCTYPE html>
<html lang="en">

<?php
include "../conn.php";
// include "require_signin.php";
include "include/head.php";
$query = "SELECT * from driver";
$run = mysqli_query($conn, $query);
$row = mysqli_fetch_all($run);



?>

<body style="background-color: #333; color: #f5f5f5;">
    <div class="container-fluid position-relative d-flex p-0" style="height: 100vh;">

        <?php include "include/sidebar.php"; ?>

        <!-- Content Start -->
        <div class="content d-flex flex-column" style="width: 100%;">

            <?php include "include/navbar.php"; ?>

            <!-- Chat Section Start -->
            <div class="d-flex flex-column bg-dark rounded p-4" style="flex-grow: 1; position: relative; height: 100%; border: 1px solid #555;">
                <h1 class="mb-4 text-light">Chat Messages</h1>

                <!-- Chat Messages Box -->
                <div id="chatOutput" class="overflow-auto bg-light rounded p-3 flex-grow-1">
                    <p class="text-muted">Loading chats...</p>
                </div>

                <!-- Send Box (Fixed at Bottom) -->
                <div class="p-3" style="position: absolute; bottom: 0; left: 0; right: 0; background-color: #444; border-top: 1px solid #555;">
                    <form id="chat-form" class="d-flex">
                        <select class="form-select" name="driver" id="drivers">
                            <?php while ($row) { ?>
                                <option value="<?= $row['driver_id'] ?>"><?= $row['first_name'] ?></option>
                            <?php } ?>
                        </select>
                        <input id="message" type="text" name="message" class="form-control me-2" placeholder="Type your message..." required style="border: 1px solid #555; background-color: #222; color: #fff;">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
            <!-- Chat Section End -->

        </div>
        <!-- Content End -->

    </div>

    <?php include "include/scripts.php"; ?>

</body>

<script>
    // Function to send chat to the server
    function sendChat(driver_id, message) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'send_chat.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        // Prepare the data to send
        var params = 'driver_id=' + encodeURIComponent(driver_id) + '&message=' + encodeURIComponent(message);
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    fetchChats();
                    // Refresh chat messages after sending
                } else {
                    console.error(response.message);
                }
            }
        };
        xhr.send(params);
    }
    // Handle form submission
    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();
        // Prevent form from refreshing the page
        // Get the input values 
        var driver_id = document.getElementById('drivers').value;
        var message = document.getElementById('message').value;
        // Send the chat message 
        sendChat(username, message);
        // Clear the input fields 
        document.getElementById('message').value = '';
    });

    // function to fetch chat data
    function fetchChatData() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'fetch_chats.php', true);
        xhr.onload = function() {
            if (this.status === 200) {
                const chats = JSON.parse(this.responseText);
                let output = '<ul class="list-group">';
                chats.forEach(chat => {
                    output += `<li class="list-group-item"><strong>${chat[6]}:</strong> ${chat[3]} <span class="text-muted float-end">${chat[4]}</span></li>`;
                });
                output += '</ul>';
                document.getElementById('chatOutput').innerHTML = output;
            }
        };
        xhr.send();
    }

    // Fetch chat data when the page loads
    window.onload = fetchChatData;
    setInterval(fetchChatData, 1000);
</script>

</html>