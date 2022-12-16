
<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">VOUCHER - <?php echo strtoupper($_GET['act'])?></h3>
</div>
<div class="about__component">
            <div class="about_form">
                <form action="" class='form' method="POST" enctype="multipart/form-data">
                    <div class="form_group">
                        <label for="">Nhập mã code</label>
                        <input class='' type="text" name="code" value="<?php if(!empty($_POST["code"])){
                            echo $_POST["code"];
                        } ?>">
                        <?php
                        if (!empty($errors['code']['require'])) {
                            echo '<span style="color:red">' . $errors['code']['require'] . '</span>';
                        }
                        ?>
                       
                    </div>
                    <div class="form_group">
                        <label for="">Nhập mệnh giá %</label>
                        <input class='' type="number" name="price" min="1" max="100" value="<?php if(!empty($_POST["code"])){
                            echo $_POST["price"];
                        } ?>"> 
                        <?php
                        if (!empty($errors['price']['require'])) {
                            echo '<span style="color:red">' . $errors['price']['require'] . '</span>';
                        }
                        ?>

                    </div>
                    <div class="form_group"> 
                       <label for=""> Đơn hàng tối thiểu </label>
                       <input type="number" name="condition" value="<?php if(!empty($_POST["condition"])){
                            echo $_POST["condition"];
                        } ?>"> 
                       <?php
                        if (!empty($errors['condition']['require'])) {
                            echo '<span style="color:red">' . $errors['condition']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label for="">Số lượng</label>
                        <input class='' type="number" name="turn" value="<?php if(!empty($_POST["turn"])){
                            echo $_POST["turn"];
                        } ?>"> 
                        <?php
                        if (!empty($errors['turn']['require'])) {
                            echo '<span style="color:red">' . $errors['turn']['require'] . '</span>';
                        }
                        ?>

                    </div>
                    <div class="form_group">
                        <label for="">Ngày hết hạn</label>
                        <input class='' type="date" name="date_out" value="<?php if(!empty($_POST["date_out"])){
                            echo $_POST["date_out"];
                        } ?>">
                        <?php
                        if (!empty($errors['date_out']['require'])) {
                            echo '<span style="color:red">' . $errors['date_out']['require'] . '</span>';
                        }
                        ?>

                    </div>
                    <div class="form_group">
                    <label for="">Banner</label>
                    <input type="file" name="img" id="" value="<?php if(!empty($_FILES["img"]["name"])){
                            echo $_FILES["img"]["name"];
                        } ?>">
                        <?php
                        if (!empty($errors['img']['name']['require'])) {
                            echo '<span style="color:red">' . $errors['img']['name']['require'] . '</span>';
                        }
                        ?>

                    </div>
                    <div class="btn_add">
                        <button name="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>