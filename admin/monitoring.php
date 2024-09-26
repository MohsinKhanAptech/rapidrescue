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
                <div id="map"></div>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14466.136769377172!2d67.0652637!3d24.9819581!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb340e584b891c3%3A0x29b2cbc198ba2dbd!2sAptech%20Computer%20Education%20North%20Karachi%20Center!5e0!3m2!1sen!2s!4v1726742618403!5m2!1sen!2s" class="flex-grow-1 rounded" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
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

<script>
    // function initMap() {
    //     const myLatLng = {
    //         lat: -25.363,
    //         lng: 131.044
    //     };
    //     const map = new google.maps.Map(document.getElementById("map"), {
    //         zoom: 4,
    //         center: myLatLng,
    //     });

    //     new google.maps.Marker({
    //         position: myLatLng,
    //         map,
    //         title: "Hello World!",
    //     });
    // }
    // window.initMap = initMap;


    // // Initialize and add the map
    // let map;

    // async function initMap() {
    //     // The location of Uluru
    //     const position = {
    //         lat: -25.344,
    //         lng: 131.031
    //     };
    //     // Request needed libraries.
    //     //@ts-ignore
    //     const {
    //         Map
    //     } = await google.maps.importLibrary("maps");

    //     // Import the AdvancedMarkerElement.
    //     const {
    //         AdvancedMarkerElement
    //     } = await google.maps.importLibrary("marker");

    //     // The map, centered at Uluru
    //     map = new Map(document.getElementById("map"), {
    //         zoom: 4,
    //         center: position,
    //         mapId: "DEMO_MAP_ID",
    //     });

    //     // The marker, positioned at Uluru
    //     const marker = new AdvancedMarkerElement({
    //         map: map,
    //         position: position,
    //         title: "Uluru",
    //     });
    // }


    const data = null;

    const xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener('readystatechange', function() {
        if (this.readyState === this.DONE) {
            console.log(this.responseText);
        }
    });

    xhr.open('GET', 'https://map-geocoding.p.rapidapi.com/json?latlng=40.714224%2C-73.961452');
    xhr.setRequestHeader('x-rapidapi-key', '090f731f74mshd35e2780c7c5af1p19a869jsn42af64e9a850');
    xhr.setRequestHeader('x-rapidapi-host', 'map-geocoding.p.rapidapi.com');

    xhr.send(data);

    initMap();
</script>
<!-- <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD08dS7o7HimQ0roYIowwaT8cl2UO5ElfY&callback=initMap&v=weekly"
    defer></script> -->
<script>
    (g => {
        var h, a, k, p = "The Google Maps JavaScript API",
            c = "google",
            l = "importLibrary",
            q = "__ib__",
            m = document,
            b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
            r = new Set,
            e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a)
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })({
        key: "AIzaSyD08dS7o7HimQ0roYIowwaT8cl2UO5ElfY",
        v: "weekly",
        // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
        // Add other bootstrap parameters as needed, using camel case.
    });
</script>