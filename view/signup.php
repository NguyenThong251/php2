<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="./img/thaytu.png" class="img-fluid" alt="Phone image" />
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <?php echo $formBegin?>
                <div class="text-decoration-none d-flex justify-content-end mb-3">

                    <a href="/php2/login" class=" text-decoration-none btn btn-secondary btn-lg btn-block">
                        Sign in
                    </a>
                </div>
                <!-- name -->
                <?php echo $form->Field('fullname') ?>
                <!-- Email input -->
                <?php echo $form->Field('email') ?>
                <!-- Password input -->
                <?php echo $form->Field('password')->passwordField() ?>
                <!-- Password confirm -->
                <?php echo $form->Field('confirmpassword')->passwordField() ?>

                <div class="mb-4 d-flex justify-content-around align-items-center">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                        <label class="form-check-label" for="form1Example3">
                            Remember me
                        </label>
                    </div>
                    <a href="#!">Forgot password?</a>
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">
                    Sign in
                </button>


                <?php echo $formEnd  ?>
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