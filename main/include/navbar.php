<?php
session_start();
include "../conn.php";
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $query = "SELECT * FROM user WHERE user_id = $id";
    $run = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($run);
} else {
    // header('location:signin.php');
}
?>

<!-- Navbar Start -->
<div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Rapid Rescue</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="service.php" class="nav-item nav-link">Service</a>
                    <!-- <a href="price.html" class="nav-item nav-link">Pricing</a> -->
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <a href="about.php" class="nav-item nav-link text-danger">Emergency</a>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?= $row['first_name']; ?></a>
                            <div class="dropdown-menu m-0">
                                <a href="profile.php" class="dropdown-item">Profile</a>
                                <a href="logout.php" class="dropdown-item">Logout</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <a href="signin.php" class="nav-item nav-link">Signin</a>
                        <a href="signup.php" class="nav-item nav-link">Signup</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->