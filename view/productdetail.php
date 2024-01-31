<?php 
// $html_dsdm = show_dm($dsdm);
extract($spchitiet);
$html_product_lienquan = show_product($splienquan);
?>
<section>
    <div class="pb-2 mb-5 container-fuild bg-third">
        <div class="container">
            <div class="py-5 row d-flex align-items-center">
                <div class="gap-3 col header-direction-left d-flex flex-column">
                    <div class="gap-2 direction-list d-flex align-items-center">
                        <a class="unlink" href="#"><span
                                class="border-2 fs-5 fw-medium border-end pe-2">Shop</span></a><span
                            class="text-color fs-5 fw-medium">Detail</span>
                    </div>
                    <h3 class="direction-title text-color fz-h2 fw-500">
                        Chi tiết sản phẩm
                    </h3>
                </div>
                <div class="col header-direction-right">
                    <div class="direction-images d-flex justify-content-end row">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <img class="img-cover" src="../img/product-45.webp" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="product-detail row">
        <div class="product-image col-xl-6 col-lg-6 col-sm-12">
            <img src="../img/<?=$img?>" alt="Product 1">
        </div>
        <div class="p-5 product-info col-xl-6 col-lg-6 col-sm-12">
            <h2 class="text-dark fs-3"><?=$name?></h2>
            <p class="text-dark fs-4">Lượt xem <?=$view?></p>
            <p class="text-dark fs-4">Giá: <?=number_format($price)?> đ</p>
            <button class="order-button button bg-primaryy">Đặt Hàng</button>
        </div>
    </div>
    <div class="container mt-5 section-header">
        <div class="gap-2 category-tag d-flex align-items-center">
            <ion-icon class="p-2 text-white fz-text-b1 fw-600 rounded-circle bg-secondary" name="cart"></ion-icon><span
                class="fz-text-b1 fw-600 text-secondary">Our Products</span>
        </div>
        <div class="py-3 category-title d-flex align-items-center justify-content-between">
            <h3 class="text-color fw-600 fz-h2">Explore our Products</h3>
            <div class="gap-2 category-icon d-flex">
                <ion-icon class="p-3 border cursor text-color fw-600 rounded-2 border-light fz-text-b1"
                    name="arrow-back"></ion-icon>
                <ion-icon class="p-3 border cursor text-color fw-600 rounded-2 border-light fz-text-b1"
                    name="arrow-forward"></ion-icon>
            </div>
        </div>
    </div>
    <!-- <h2>Sản Phẩm Mới</h2> -->
    <div class="container">
        <div class="product-box row">
            <?=$html_product_lienquan?>
        </div>
    </div>
</div>