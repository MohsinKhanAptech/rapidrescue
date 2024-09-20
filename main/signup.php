<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php'; ?>

<body>

    <div class="container-fluid d-flex justify-content-center align-items-center vw-100 vh-100">
        <div class="container">
            <div class="row justify-content-center position-relative" style="z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5">
                        <form action="signup_validate.php" method="post" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="firstname" class="form-control bg-light border-0" required placeholder="First Name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="lastname" class="form-control bg-light border-0" required placeholder="Last Name">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" class="form-control bg-light border-0" required placeholder="Your Email">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="tel" name="contact" pattern="/^[\+]?[0-9]{0,3}\W?+[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im" class="form-control bg-light border-0" required placeholder="Your Contact">
                                </div>
                                <div class="col-12">
                                    <input type="date" name="DOB" class="form-control bg-light border-0" required placeholder="Your Date of Birth">
                                </div>
                                <div class="col-12">
                                    <select name="gender" class="form-control bg-light border-0" required>
                                        <option value="gender" selected disabled>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <input type="password" name="password" class="form-control bg-light border-0" required placeholder="Your Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$">
                                </div>
                                <div class="col-12">
                                    <input type="text" name="address" class="form-control bg-light border-0" required placeholder="Your Address">
                                </div>
                                <div class="col-12">
                                    <input type="file" name="images" class="form-control bg-light border-0" required placeholder="Your Address">
                                </div>
                                <div class="col-12">
                                    <input name="submit" type="submit" class="btn btn-primary w-100 py-2" value="Sign-up">
                                </div>
                                <div class="col-12">
                                    <input name="submit" type="button" onclick="location.href='index.php'" class="btn btn-light w-100 py-2" value="Cancel">
                                    <br>
                                    <br>
                                    <p class="text-center mb-0">Already have an Account? <a href="signin.php">Sign In</a></p>

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
