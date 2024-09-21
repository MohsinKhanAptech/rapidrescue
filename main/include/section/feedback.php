
<?php
include '../conn.php';

if (isset($_POST['submit'])) {
    $name = $_POST['f_name'];
    $email = $_POST['f_email'];
    $subject = $_POST['f_subject'];
    $message = $_POST['f_message'];

    $query = "INSERT INTO feedback(name,email,subject,feedback) VALUES ( '$name', '$email', '$subject','$message')";
    $runn = mysqli_query($conn, $query);

    if (!$runn) {
        echo "<script>alert('Something went wrong')</script>";
    }
}
?>


<!-- Feedback Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Feedback</h5>
                    <h1 class="display-4">Provide Feedback</h1>
                </div>
                <div class="container mt-5 ">
        <div id="carouselExampleIndicators" class="carousel slide rounded" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <?php
                

                $query = "SELECT * FROM feedback"; 
                $runn = mysqli_query($conn, $query);
                $active = true;

                while ($rows = mysqli_fetch_array($runn)) {
                    ?>
                    <div class="carousel-item <?= $active ? 'active' : '' ?>">
                        <div class="d-flex justify-content-center align-items-center bg-white" style="height: 180px;"> 
                            <div class="text-center">
                            <div class="feedback-author">
                                    <strong><?= $rows['name'] ?></strong>
                                </div>
                                
                                <p class="feedback-text"><?= $rows['feedback'] ?></p>
                               
                            </div>
                        </div>
                    </div>
                    <?php
                    $active = false; 
                }
                ?>
            </div>
            <a class="carousel-control-prev bg-primary" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next bg-primary" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

            </div>
            <div class="col-lg-6">
                <div class="bg-white text-center rounded p-5">
                    <h1 class="mb-4">Feedback Form</h1>
                    <form method="POST">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" name="f_name" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" name="f_email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" name="f_subject" class="form-control bg-light border-0" placeholder="Feedback Subject" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea name="f_message" rows="4" placeholder="Your Feedback" class="form-control bg-light border-0"></textarea>
                            </div>
                            <div class="col-12">
                                <input name="submit" value='Submit' class="btn btn-primary w-100 py-3" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Feedback End -->