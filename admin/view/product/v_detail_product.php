<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">PRODUCT - <?php echo strtoupper($_GET['act']) ?></h3>
</div>
<div class="about__component">
    <div class="image_product">
        <img src="../src/image/<?= $products->productImage ?>" alt="" width="50%" style="margin-top: 50px;margin-left:50px">
    </div>
    <div class="about_form">
        <form class='form' method="POST" enctype="multipart/form-data">
            <div class="form_group">
                <label class='name-product' for="">Name</label>
                <input type="text" name='' disabled value="<?= $products->productName ?>">
            </div>
            <div class="form_group">
                <label class='name-product' for="">Price</label>
                <input type="text" name='' disabled value="<?= $products->productPrice ?> đ">
            </div>
            <div class="form_group">
                <label class='name-product' for="">Date</label>
                <input class='input__date' type="text" name='' disabled value="<?= $products->date ?>">
            </div>
            <div class="form_group">
                <label class='name-product' for="">View</label>
                <input type="text" disabled value="<?= $products->view ?>" name=''>
            </div>
            <div class="form_group">
                <label class='name-product' for="">Quantity</label>
                <input type="text" disabled value="<?= $products->quantity ?>" name=''>
            </div>
            <div class="form-group mb-3">
                <label for="" class="form-label">Best Selling</label>
                <div class="col-7 d-flex form-control" style="height: 40px;">
                    <div class="form-check form-switch" style="margin-right: 30px;">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled <?= $products->selling == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="flexSwitchCheckDisabled">Selling</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled <?= $products->selling == 0 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="flexSwitchCheckDisabled">Normal</label>
                    </div>
                </div>
            </div>
            <div class="form_group">
                <label class='name-product' for="">Category</label>
                <input type="text" disabled value="<?= $products->categoryId ?>">
            </div>
            <div class="form_group1">
                <label class='name-product' for="">Color</label><br>
                <input type="checkbox" id="" name="color_red" disabled <?= $products->color_red == "Đỏ" ? 'checked' : '' ?>>
                <label for=""> Red</label><br>
                <input type="checkbox" id="" name="color_white" disabled <?= $products->color_white == "Trắng" ? 'checked' : '' ?>>
                <label for=""> White</label><br>
                <input type="checkbox" id="" name="color_black" disabled <?= $products->color_black == "Đen" ? 'checked' : '' ?>>
                <label for=""> Black</label><br>
                <input type="checkbox" id="" name="color_green" disabled <?= $products->color_green == "Xanh" ? 'checked' : '' ?>>
                <label for=""> Green</label><br><br>
            </div>
            <div class="form_group">
                <label class='name-product' for="">Description</label>
                <textarea name="" id="" cols="30" placeholder='Chưa có mô tả!' rows="15" disabled><?= $products->productDesc ?></textarea>
            </div>
        </form>

    </div>
</div>