<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php'; ?>

<body>

    <div class="container-fluid d-flex justify-content-center align-items-center vw-100 vh-100">
        <div class="container">
            <div class="row justify-content-center position-relative" style="z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5">
                        <form action="signup_validate.php" method="post">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="firstname" class="form-control bg-light border-0" required placeholder="First Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="lastname" class="form-control bg-light border-0" required placeholder="Last Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" class="form-control bg-light border-0" required placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="tel" name="contact" pattern="/^[\+]?[0-9]{0,3}\W?+[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im" class="form-control bg-light border-0" required placeholder="Your Contact" style="height: 55px;">
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
                                    <input type="password" name="password" class="form-control bg-light border-0" required placeholder="Your Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" name="address" class="form-control bg-light border-0" required placeholder="Your Address" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input name="submit" type="submit" class="btn btn-primary w-100 py-3" value="Sign-up">
                                </div>
                                <div class="col-12">
                                    <input name="submit" type="button" onclick="location.href='index.php'" class="btn btn-light w-100 py-3" value="Cancel">
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
