<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">PRODUCT - <?php echo strtoupper($_GET['act']) ?></h3>
</div>
<div class="about__component">
    <div class="image_product">
        <img src="../src/image/<?= $products->productImage ?>" alt="" width="50%" style="margin-top: 50px;margin-left:50px">
    </div>
    <div class="about_form">
        <form class='form' method="POST" enctype="multipart/form-data">
            <input type="text" hidden value="<?= $products->id ?>" name="id">
            <div class="form_group">
                <label class='name-product' for="">Name</label>
                <input type="text" placeholder="Nhập tên sản phẩm" name='productName' value="<?= $products->productName ?>">
                <?php
                if (!empty($errors['productName']['require'])) {
                    echo '<span style="color:red">' . $errors['productName']['require'] . '</span>';
                }
                ?>
            </div>
            <div class="form_group">
                <label class='name-product' for="">Price</label>
                <input type="text" min="1" placeholder="Nhập giá sản phẩm" name='productPrice' value="<?= $products->productPrice ?>">
                <?php
                if (!empty($errors['productPrice']['require'])) {
                    echo '<span style="color:red">' . $errors['productPrice']['require'] . '</span>';
                }
                ?>
            </div>
            <div class="form_group">
                <label class='name-product' for="">ProductImage</label>
                <input class='input__img' type="file" name='productImage'>
                <input class='input__img' type="text" name='old_productImage' hidden value="<?= $products->productImage ?>">
            </div>

            <div class="form_group">
                <label class='name-product' for="">Date</label>
                <input class='input__date' type="text" name='date' value="<?= $products->date ?>">
                <?php
                if (!empty($errors['date']['require'])) {
                    echo '<span style="color:red">' . $errors['date']['require'] . '</span>';
                }
                ?>
            </div>


            <div class="form_group">
                <label class='name-product' for="">Quantity</label>
                <input type="text" placeholder="Nhập số lượng" name='quantity' value="<?= $products->quantity ?>">
                <?php
                if (!empty($errors['quantity']['require'])) {
                    echo '<span style="color:red">' . $errors['quantity']['require'] . '</span>';
                }
                ?>
            </div>



            <div class="form_group">
                <label class='name-product' for="">Best Selling</label>
                <div class="form-control" style="height: 40px;">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" id="special" class="form-check-input" name="selling" value="1" <?= $products->selling == 1 ? "checked" : "" ?>> Selling
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" id="special" class="form-check-input" name="selling" value="0" <?= $products->selling == 0 ? "checked" : "" ?>> Normal
                        </label>
                    </div>
                </div>
            </div>

            <div class="form_group">
                <label class='name-product' for="">Category</label>
                <select name="categoryId" id="" class='input__choice'>
                    <option hidden>Chọn danh mục sản phẩm</option>
                    <?php foreach ($categories as $key => $value) { ?>
                        <option <?= $products->categoryId == $value->id ? "selected" : "" ?> value="<?= $value->id ?>"><?= $value->categoryName ?></option>
                    <?php } ?>
                </select>
                <?php
                if (!empty($errors['category']['require'])) {
                    echo '<span style="color:red">' . $errors['category']['require'] . '</span>';
                }
                ?>
            </div>
            <div class="form_group1">
                <label class='name-product' for="">Color</label><br>
                <input type="checkbox" id="" name="color_red" <?= $products->color_red == "Đỏ" ? 'checked' : '' ?> value="Đỏ">
                <label for=""> Red</label><br>
                <input type="checkbox" id="" name="color_white" <?= $products->color_white == "Trắng" ? 'checked' : '' ?> value="Trắng ">
                <label for=""> White</label><br>
                <input type="checkbox" id="" name="color_black" <?= $products->color_black == "Đen" ? 'checked' : '' ?> value="Đen">
                <label for=""> Black</label><br>
                <input type="checkbox" id="" name="color_green" <?= $products->color_green == "Xanh" ? 'checked' : '' ?> value="Xanh">
                <label for=""> Green</label><br><br>
            </div>
            <div class="form_group">
                <label class='name-product' for="">Description</label>
                <textarea name="productDesc" id="" cols="30" placeholder='Nhập mô tả sản phẩm ở đây' rows="10"><?= $products->productDesc ?></textarea>
                <?php
                if (!empty($errors['productDesc']['require'])) {
                    echo '<span style="color:red">' . $errors['productDesc']['require'] . '</span>';
                }
                ?>
            </div>
            <div class="btn_add">
                <button name="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>