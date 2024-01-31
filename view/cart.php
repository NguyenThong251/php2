<div class="container">
        <div class="cart-item" data-product-id="1">
            <div class="product-image">
                <img src="img/hinh1.webp" alt="Product 1">
            </div>
            <div class="product-info">
                <h4>Tên Sản Phẩm 1</h4>
                <p>Giá: $99.99</p>
            </div>
            <div class="product-actions">
                <button class="remove-btn">Xóa</button>
                <div class="quantity">
                    <button class="decrease-btn">-</button>
                    <span class="quantity-value">1</span>
                    <button class="increase-btn">+</button>
                </div>
            </div>
        </div>

        <div class="cart-item" data-product-id="2">
            <div class="product-image">
                <img src="img/hinh2.webp" alt="Product 2">
            </div>
            <div class="product-info">
                <h4>Tên Sản Phẩm 2</h4>
                <p>Giá: $79.99</p>
            </div>
            <div class="product-actions">
                <button class="remove-btn">Xóa</button>
                <div class="quantity">
                    <button class="decrease-btn">-</button>
                    <span class="quantity-value">2</span>
                    <button class="increase-btn">+</button>
                </div>
            </div>
        </div>

        <!-- Add more cart items as needed -->

        <button class="continue-btn">Tiếp Tục Đặt Hàng</button>
    </div>
    <script>
        $(document).ready(function () {
            // Xóa sản phẩm khỏi giỏ hàng
            $(".remove-btn").on("click", function () {
                $(this).closest(".cart-item").remove();
            });

            // Tăng số lượng sản phẩm
            $(".increase-btn").on("click", function () {
                const quantityElement = $(this).siblings(".quantity-value");
                let quantity = parseInt(quantityElement.text(), 10);
                quantity++;
                quantityElement.text(quantity);
            });

            // Giảm số lượng sản phẩm
            $(".decrease-btn").on("click", function () {
                const quantityElement = $(this).siblings(".quantity-value");
                let quantity = parseInt(quantityElement.text(), 10);
                if (quantity > 1) {
                    quantity--;
                    quantityElement.text(quantity);
                }
            });
        });
    </script>