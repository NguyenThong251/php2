</div>
<div class="right-box">
    <h2>Danh Sách Sản Phẩm</h2>
    <?php
   if (!empty($message)) {
    echo '<div  style="padding-bottom: 10px;" class="' . ($success === '1' ? 'success' : 'error') . '-message">' . $message . '</div>';
}?>
    <a href="/php2/addproduct"><button>Add Product</button></a>
    <ul class="product-list">
        <!-- <li class="product-item">
            <img src="img/product1.jpg" alt="Product 1" />
            <span>Tên Sản Phẩm 1</span>
            <span class="actions">
                <span class="edit">&#9998; Edit</span>
                <span class="delete">&#128465; Delete</span>
            </span>
        </li>
        <li class="product-item">
            <img src="img/product2.jpg" alt="Product 2" />
            <span>Tên Sản Phẩm 2</span>
            <span class="actions">
                <span class="edit">&#9998; Edit</span>
                <span class="delete">&#128465; Delete</span>
            </span>
        </li> -->
        <?=$html_allProduct_admin?>
        <!-- Add more product items as needed -->
    </ul>
</div>
</div>