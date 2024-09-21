<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>

<?php
include "../conn.php";
include "include/head.php";
?>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        <?php include "include/sidebar.php"; ?>

        <!-- Content Start -->
        <div class="content">

            <?php include "include/navbar.php"; ?>
            <div class="container-fluid d-flex pt-4 px-4 w-100" style="height: 90%;">

                <div id="map" class="flex-grow-1"></div>

            </div>

        </div>

    </div>
    <!-- Content End -->

    </div>

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var marker = L.marker([51.5, -0.09]).addTo(map);

        // Update the map with the user's current location
        if (navigator.geolocation) {
            navigator.geolocation.watchPosition(showPosition, showError, {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }

        function showPosition(position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            // Set the map view and update the marker position
            map.setView([lat, lng], 13);
            marker.setLatLng([lat, lng]);

            // Optionally send the live location to the server
            sendLocationToServer(lat, lng);
        }

        function sendLocationToServer(lat, lng) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "update_location.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("lat=" + lat + "&lng=" + lng);
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    </script>

    <?php include "include/scripts.php"; ?>

</body>

</html>