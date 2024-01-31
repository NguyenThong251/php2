<?php
//  $form = new Form();
//              $formBegin = $form::begin('', 'post');
//              $formEnd =  $form::end();;
//              include "view/login.php";
?>
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="./img/thaytu.png" class="img-fluid" alt="Phone image" />
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <?php echo $formBegin ?>
                <div class="text-decoration-none d-flex justify-content-end mb-3">

                    <a href="signup" class=" text-decoration-none btn btn-secondary btn-lg btn-block">
                        Sign up
                    </a>
                </div>
                <!-- Email input -->
                <?php echo $form->Field('email') ?>

                <!-- Password input -->
                <?php echo $form->Field('password')->passwordField() ?>
                <div class="mb-4 d-flex justify-content-around align-items-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                        <label class="form-check-label" for="form1Example3">
                            Remember me
                        </label>
                    </div>
                    <a href="/php2/forgotpassword">Forgot password?</a>
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                    Sign in
                </button>

                <div class="my-4 divider d-flex align-items-center">
                    <p class="mx-3 mb-0 text-center fw-bold text-muted">OR</p>
                </div>
                <div class="gap-3 row">
                    <a class="gap-2 col btn btn-primary btn-lg d-flex align-items-center justify-content-center"
                        style="background-color: #3b5998" href="#!" role="button">
                        <ion-icon name="logo-facebook"></ion-icon>
                        <span>With Facebook</span>
                    </a>
                    <a class="gap-2 col btn btn-primary btn-lg d-flex align-items-center justify-content-center"
                        style="background-color: #f05a34" href="#!" role="button">
                        <ion-icon name="logo-google"></ion-icon>
                        <span>With Google</span>
                    </a>
                </div>
                <?php echo $formEnd ?>
            </div>
        </div>
    </div>
</section>
</body>

</html>
<!-- <footer>

    <div class="container">
        <h2 class="text-black">ssss</h2>
    </div>

</footer> -->