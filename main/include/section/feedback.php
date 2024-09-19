<?php
$conn = mysqli_connect("localhost", "root", "", "rapidrescue");

if(isset($_POST['submit'])){
    $name = $_POST['f_name'];
    $email = $_POST['f_email'];
    $subject = $_POST['f_subject'];
    $message = $_POST['f_message'];
 
    $query = "INSERT INTO feedback(name,email,subject,feedback) VALUES ( '$name', '$email', '$subject','$message')";
    $runn = mysqli_query($conn, $query);

    if($runn){
        echo"
        <script>
        alert('Form submited')
        </script>
        ";
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
                <p class="text-white mb-5">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
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

<!-- Feedback End -->