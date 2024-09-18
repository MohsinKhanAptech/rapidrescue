<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MEDINOVA - Hospital Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="container-fluid pt-5">
        <div class="container">
            <div class="row justify-content-center position-relative" style="z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5 m-5 mb-0">
                        <form action="signup_validate.php" method="post">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="firstname" class="form-control bg-light border-0" required placeholder="First Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="lastname" class="form-control bg-light border-0" required placeholder="Last Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class="form-control bg-light border-0" required placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="tel" name="contact" class="form-control bg-light border-0" required placeholder="Your Contact" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="date" name="DOB" class="form-control bg-light border-0" required placeholder="Your Date of Birth" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <select name="gender" class="form-control bg-light border-0" required style="height: 55px;">
                                        <option value="gender" selected disabled>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <input type="password" name="password" class="form-control bg-light border-0" required placeholder="Your Password" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" name="address" class="form-control bg-light border-0" required placeholder="Your Address" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input name="submit" type="submit" class="btn btn-primary w-100 py-3" value="Sign-up">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>