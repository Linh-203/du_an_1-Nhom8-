
<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">News - <?php echo strtoupper($_GET['act'])?></h3>
</div>
<div class="about__component">
            <div class="about_form">
                <form class='form' method="POST" enctype="multipart/form-data">
                    <div class="form_group">
                        <label class='name-product' for="">Title</label>
                        <input type="text" placeholder="Nhập tiêu đề" name='name'>
                        <?php
                        if (!empty($errors['name']['require'])) {
                            echo '<span style="color:red">' . $errors['name']['require'] . '</span>';
                        }
                        ?>
                    </div>
                
                    <div class="form_group">
                        <label class='name-product' for="">Banner</label>
                        <input class='input__img' type="file" name='image'>
                        <?php
                        if (!empty($errors['image']['name']['require'])) {
                            echo '<span style="color:red">' . $errors['image']['name']['require'] . '</span>';
                        }
                        ?>
                    </div>

                    <div class="form_group">
                        <label class='name-product' for="">IdCategory</label>
                        <select name="idcategory" id="" class='input__choice'>
                            <option hidden>Chọn danh mục</option>
                            <?php foreach ($categories as $key => $value ) {?>
                                <option value="<?=$value->id ?>"><?= $value->categoryName?></option>
                            <?php } ?>
                        </select>
                        <?php
                        if (!empty($errors['idcategory']['require'])) {
                            echo '<span style="color:red">' . $errors['idcategory']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label class='name-product' for="">Content</label>
                        <textarea name="note" id="" cols="30" placeholder='Nhập nội dung bài viết' rows="10"></textarea>
                        <?php
                        if (!empty($errors['note']['require'])) {
                            echo '<span style="color:red">' . $errors['note']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="btn_add">
                        <button name="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>