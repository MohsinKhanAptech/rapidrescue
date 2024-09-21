<!DOCTYPE html>
<html lang="en">

<?php
include "../conn.php";
// include "require_signin.php";
include "include/head.php";
$query = "SELECT * from driver";
$run = mysqli_query($conn, $query);
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
                    <form id="chat-form" action="send_chat.php" method="post" class="d-flex">
                        <select class="form-select" name="driver_id" id="drivers">
                            <?php while ($rows = mysqli_fetch_array($run)) { ?>
                                <option value="<?= $rows['driver_id'] ?>"><?= $rows['first_name'] ?></option>
                            <?php } ?>
                        </select>
                        <input id="message" type="text" name="chat" class="form-control me-2" placeholder="Type your message..." required style="border: 1px solid #555; background-color: #222; color: #fff;">
                        <input type="submit" name="submit" class="btn btn-primary" value="Send">
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
    // function to fetch chat data
    function fetchChatData() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'fetch_chats.php', true);
        xhr.onload = function() {
            if (this.status === 200) {
                const chats = JSON.parse(this.responseText);
                let output = '<ul class="list-group">';
                chats.forEach(chat => {
                    output += `<li class="list-group-item"><strong>${chat[3]} => ${chat[7]}:</strong> ${chat[4]} <span class="text-muted float-end">${chat[5]}</span></li>`;
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