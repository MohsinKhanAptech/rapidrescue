<!DOCTYPE html>
<html lang="en">

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

            <!-- chats Start -->
            <div class="container-fluid pt-4 px-4">

                <h1>Chat Messages</h1>
                <div id="chatOutput">Loading chats...</div>

            </div>
            <!-- chats End -->
            <form action="" method=""></form>



        </div>
        <!-- Content End -->

    </div>

    <?php include "include/scripts.php"; ?>

</body>
<script>
    function fetchChatData() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'fetch_chats.php', true);
        xhr.onload = function() {
            if (this.status === 200) {
                const chats = JSON.parse(this.responseText);
                let output = '<ul>';
                chats.forEach(chat => {
                    output += `<li><strong>${chat.first_name}:</strong> ${chat.chat}</li>`;
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