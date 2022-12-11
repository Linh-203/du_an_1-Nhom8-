<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">PRODUCT - <?php echo strtoupper($_GET['act']) ?></h3>
</div>
<div class="about__component">
    <div class="about_form">
        <form class='form' method="POST" enctype="multipart/form-data">
            <div class="form_group">
                <label class='name-product' for="">Name</label>
                <input type="text" placeholder="Nhập tên sản phẩm" name='productName' style="height: 40px;">
                <?php
                if (!empty($errors['productName']['require'])) {
                    echo '<span style="color:red">' . $errors['productName']['require'] . '</span>';
                }
                ?>
            </div>
            <div class="form_group">
                <label class='name-product' for="">Price</label>
                <input type="number" min="1" placeholder="Nhập giá sản phẩm" name='productPrice' style="height: 40px;">
                <?php
                if (!empty($errors['productPrice']['require'])) {
                    echo '<span style="color:red">' . $errors['productPrice']['require'] . '</span>';
                }
                ?>
            </div>
            <div class="form_group">
                <label class='name-product' for="">ProductImage</label>
                <input class='input__img' type="file" name='productImage' style="height: 40px;">
                <?php
                if (!empty($errors['productImage']['name']['require'])) {
                    echo '<span style="color:red">' . $errors['productImage']['name']['require'] . '</span>';
                }
                ?>
            </div>

            <div class="form_group">
                <label class='name-product' for="">Date</label>
                <input class='input__date' type="date" name='date' style="height: 40px;">
                <?php
                if (!empty($errors['date']['require'])) {
                    echo '<span style="color:red">' . $errors['date']['require'] . '</span>';
                }
                ?>
            </div>


            <div class="form_group">
                <label class='name-product' for="">Quantity</label>
                <input type="text" placeholder="Nhập số lượng" name='quantity' style="height: 40px;">
                <?php
                if (!empty($errors['quantity']['require'])) {
                    echo '<span style="color:red">' . $errors['quantity']['require'] . '</span>';
                }
                ?>
            </div>

            

            <div class="form_group">
                <label class='name-product' for="">Category</label>
                <select name="categoryId" id="" class='input__choice' style="height: 40px;">
                    <option hidden>Chọn danh mục sản phẩm</option>
                    <?php foreach ($categories as $key => $value) { ?>
                        <option value="<?= $value->id ?>"><?= $value->categoryName ?></option>
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
                <input type="checkbox" id="" name="color_red" value="Đỏ">
                <label for=""> Red</label><br>
                <input type="checkbox" id="" name="color_white" value="Trắng">
                <label for=""> White</label><br>
                <input type="checkbox" id="" name="color_black" value="Đen">
                <label for=""> Black</label><br>
                <input type="checkbox" id="" name="color_green" value="Xanh">
                <label for=""> Green</label><br><br>
            </div>
            <div class="form_group">
                <label class='name-product' for="">Description</label>
                <textarea name="productDesc" id="" cols="30" placeholder='Nhập mô tả sản phẩm ở đây' rows="10"></textarea>
                <?php
                if (!empty($errors['productDesc']['require'])) {
                    echo '<span style="color:red">' . $errors['productDesc']['require'] . '</span>';
                }
                ?>
            </div>
            <br>
            <div class="btn_add">
                <button name="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>