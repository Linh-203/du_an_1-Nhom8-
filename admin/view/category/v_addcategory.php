<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">CATEGORY - <?php echo strtoupper($_GET['act'])?></h3>
</div>
<div class="about__component">
            <div class="about_form">
                <form class='form' method="POST" enctype="multipart/form-data">
                    <div class="form_group">
                        <label class='name-product' for="">Name</label>
                        <input type="text" placeholder="Nhập tên sản phẩm" name='categoryName'>
                        <?php
                        if (!empty($errors['categoryName']['require'])) {
                            echo '<span style="color:red">' . $errors['categoryName']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label class='name-product' for="">Ảnh danh mục</label>
                        <input class='input__img' type="file" name='image'>
                        <?php
                        if (!empty($errors['image']['name']['require'])) {
                            echo '<span style="color:red">' . $errors['image']['name']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label class='name-product' for="">Banner</label>
                        <input class='input__img' type="file" name='banner'>
                        <?php
                        if (!empty($errors['banner']['name']['require'])) {
                            echo '<span style="color:red">' . $errors['banner']['name']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label for="" class="name-product">Date</label>
                        <input type="date" name="date">
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