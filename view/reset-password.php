<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>

    <body>

        <section class="container">
            <h1 class="">Nhập lại mật khẩu</h1>
            <p class="">Nhập mật khẩu tôi sẽ giúp bạn thay đổi</p>
            <form action="/php2/processResetPassword" method="post" class="row g-3">
                <input type="hidden" name="token" value="<?=htmlspecialchars($token)?>">
                <div class="col-md-6">
                    <label for="password" class="form-label">New password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="password_confirm" class="form-label">Repeat password</label>
                    <input type="password" id="password_confirm" name="password_confirm" class="form-control">
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </section>
    </body>
</body>

</html>