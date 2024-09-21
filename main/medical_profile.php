<!DOCTYPE html>
<html lang="en">

<?php include 'include/head.php'; ?>

<body>
    <div class="container-fluid d-flex justify-content-center align-items-center vw-100 vh-100">
        <div class="container">
            <div class="row justify-content-center position-relative" style="z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5">
                        <form action="" method="post">
                         <h1 class="text-center mb-5">medical profile</h1>
                            <div class="row g-3">
                               
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="allergies" class="form-control bg-light border-0" required placeholder="Enter any allergies">
                                </div>

                                <div class="col-12 col-sm-6">
                                    <input type="text" name="emergency_contact" class="form-control bg-light border-0" required placeholder="Enter emergency contact">
                                </div>            
                                <div class="col-12">
                                    <input type="text" name="medical_history" class="form-control bg-light border-0" required placeholder="Enter your medical history">
                                </div>           
                                <div class="col-12">
                                <input name="submit" type="button" onclick="location.href='index.php'" class="btn btn-primary w-100 py-2" value="Save">
                                <br>
                                <br>
                                    <input name="submit" type="button" onclick="location.href='index.php'" class="btn btn-light w-100 py-2" value="Cancel">
                                    <br>
                                    <br>
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
