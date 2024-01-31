</div>
<div class="right-box">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="productName">Tên Sản Phẩm:</label>
        <input type="text" id="productName" name="productName" required />

        <label for="productPrice">Giá Sản Phẩm:</label>
        <input type="number" id="productPrice" name="productPrice" required />

        <label for="danhmuc">Danh mục:</label>
        <input type="number" id="danhmuc" name="danhmuc" required />

        <label for="productImg">Hình Sản Phẩm:</label>
        <input type="file" id="productImg" name="productImg" required />

        <input type="hidden" name="id" value="<?=$id?>" />
        <button type="submit" name="editproduct">Chỉnh sửa Sản Phẩm</button>
    </form>
</div>
</div>