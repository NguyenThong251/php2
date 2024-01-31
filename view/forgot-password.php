<section class="container">
    <form action="/php2/send-password-reset" method="post">
        <div class="row g-3 d-flex flex-column justify-content-start">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Email</label>
            </div>
            <div class="col-auto">
                <input type="email" id="inputPassword6" class="w-50 form-control" aria-describedby="passwordHelpInline"
                    name="email" placeholder="@gmail.com">
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-25">Submit</button>
        </div>
    </form>
</section>