<?php
$conn = mysqli_connect("localhost", "root", "", "rapidrescue");

if (!$conn) {
	echo "<h1>Database connection failed due to " . mysqli_connect_error($conn) . "</h1>";
}
