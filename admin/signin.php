<!DOCTYPE html>
<html lang="en">

<?php include "include/head.php"; ?>

<body>
    <div class="container-fluid position-relative d-flex p-0">

        <?php include "include/spinner.php"; ?>

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="signin_validate.php" method="post">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="" class="">
                                    <h3 class="text-primary">RapidRescue</h3>
                                </a>
                                <h3>Sign In</h3>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <!-- <div class="d-flex align-items-center justify-content-between mb-4">
                                <a href="">Forgot Password?</a>
                            </div> -->
                            <!-- <input type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4" value="sign in">
                            <p class="text-center mb-0">Don't have an Account? <a href="signup.php">Sign Up</a></p> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->

    </div>

    <?php include "include/scripts.php"; ?>

</body>

</html>