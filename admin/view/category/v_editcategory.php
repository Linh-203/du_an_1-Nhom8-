<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">CATEGORY - <?php echo strtoupper($_GET['act'])?></h3>
</div>
<div class="about__component">
            <div class="image_product">
                <img src="../src/image/<?= $categories->image ?>" alt="" width="50%" style="margin-top: 50px;margin-left:50px">
            </div>
            <div class="about_form">
            <form class='form' method="POST" enctype="multipart/form-data">
                    <input type="text" name="id" id="" hidden value="<?= $categories->id ?>">
                    <div class="form_group">
                        <label class='name-product' for="">Name</label>
                        <input type="text" placeholder="Nhập tên sản phẩm" name='categoryName' value="<?= $categories->categoryName ?>">
                        <?php
                        if (!empty($errors['categoryName']['require'])) {
                            echo '<span style="color:red">' . $errors['categoryName']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label class='name-product' for="">Ảnh danh mục</label>
                        <input class='input__img' type="file" name='image'>
                        <input class='input__img' type="text" name='old_image' hidden value="<?= $categories->image ?>" >
                        <?php
                        if (!empty($errors['image']['name']['require'])) {
                            echo '<span style="color:red">' . $errors['image']['name']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label class='name-product' for="">Banner</label>
                        <input class='input__img' type="file" name='banner'>
                        <input class='input__img' type="text" name='old_banner' hidden value="<?= $categories->banner ?>">
                        <?php
                        if (!empty($errors['banner']['name']['require'])) {
                            echo '<span style="color:red">' . $errors['banner']['name']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label for="" class="name-product">Date</label>
                        <input type="text" name="date" value="<?= $categories->date ?>">
                        <?php
                        if (!empty($errors['date']['require'])) {
                            echo '<span style="color:red">' . $errors['date']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="btn_add">
                        <button name="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>