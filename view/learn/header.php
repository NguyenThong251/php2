<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Đơn Giản</title>
    <link rel="stylesheet" href="./css/app.css">
    <!-- <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="../css/bill.css">
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="../css/productdetail.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<style>
.divider:after,
.divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
}
</style>

<body>
    <header class="p-3 mb-3 mb-5 rounded shadow-sm sh bg-body">
        <div class="container">
            <div class="flex-wrap d-flex align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="mb-2 d-flex align-items-center mb-lg-0 text-dark text-decoration-none">
                    <!-- <img src="../img/logo.png" alt=""> -->
                </a>

                <ul class="mb-2 nav col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0">
                    <li><a href="index.php" class="px-2 nav-link link-secondary fs-5 fw-normal">Home</a></li>
                    <li><a href="shop" class="px-2 nav-link link-dark fs-5 fw-normal">Shop</a></li>
                    <li><a href="about" class="px-2 nav-link link-dark fs-5 fw-normal">About</a></li>
                    <li><a href="blog" class="px-2 nav-link link-dark fs-5 fw-normal">Blog</a></li>

                    </li>
                </ul>

                <form class="mb-3 col-12 col-lg-auto mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>

                <div class="dropdown  d-flex align-items-center">


                    <?php
if (isset($user["username"])) {
    echo '<a href="#" class="link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./img/profile.jpg" alt="mdo" width="30" height="30" class="rounded-circle">
                    </a><ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
    <li class="dropdown-item">' . $user["username"] . '</li> <li class=""><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/php2/logout">Sign out</a></li></ul>';
}else{
    echo '
    <a href="#" class="link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
    data-bs-toggle="dropdown" aria-expanded="false">
    <img src="./img/product-45.webp" alt="mdo" width="30" height="30" class="rounded-circle">
   
</a>
<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">

    <li><a class="dropdown-item" href="/php2/login">Sign in</a></li></ul>';
}

?>


                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="pb-2 mb-5 container-fuild bg-third">
            <div class="container">
                <div class="py-5 row d-flex align-items-center">
                    <div class="gap-3 col header-direction-left d-flex flex-column">
                        <div class="gap-2 direction-list d-flex align-items-center">
                            <a class="unlink" href="#"><span
                                    class="border-2 fz-text-b1 border-end pe-2"></span></a><span
                                class="text-color fz-text-b1"></span>
                        </div>
                        <h3 class="direction-title text-color fz-h2 fw-500">
                            <?=$heading?>
                        </h3>
                    </div>
                    <div class="col header-direction-right">
                        <div class="direction-images d-flex justify-content-end row">
                            <div class="col-9"></div>
                            <div class="col-3">
                                <img class="img-cover" src="./img/product-45.webp" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>