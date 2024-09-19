<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php'; ?>

<body>

    <div class="container-fluid d-flex justify-content-center align-items-center vw-100 vh-100">
        <div class="container">
            <div class="row justify-content-center position-relative" style=" z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5 m-5">
                        <form action="login_validate.php" method="post">
                            <div class="row g-3">
                                <div class="col-12">
                                    <input type="email" name="email" class="form-control bg-light border-0" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="password" name="password" class="form-control bg-light border-0" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[ -/:-@\[-`{-~]).{6,64}$" required placeholder="Your Password" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="submit" name="submit" value="Login" class="btn btn-primary w-100 py-3">
                                </div>
                                <div class="col-12">
                                    <input name="submit" type="button" onclick="window.location.href='index.php'" class="btn btn-light w-100 py-3" value="Cancel">
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
