<?php 
  if(!empty($_GET["alert"])){
   $alert = $_GET["alert"]; } ?>
  


 
<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">VOUCHER - <?php echo strtoupper($_GET['act'])?></h3>
</div>
<div class="about__component">
            <div class="about_form">
                <form action="" class='form' method="POST" enctype="multipart/form-data">
                <div class="form_group">
                        <label for="">Nhập mã code</label>
                        <input class='' type="text" name="code" value="<?= $list_voucher->code?>">
                        <?php
                        if (!empty($errors['code']['require'])) {
                            echo '<span style="color:red">' . $errors['code']['require'] . '</span>';
                        }
                        ?>
                         <span style="color: red;"><?php if(!empty($alert)){
                        echo $alert; }?></span>
                    </div>
                    <div class="form_group">
                        <label for="">Nhập mệnh giá %</label>
                        <input class='' type="number" name="price" min="1" max="100" value="<?= $list_voucher->sale?>"> 
                        <?php
                        if (!empty($errors['price']['require'])) {
                            echo '<span style="color:red">' . $errors['price']['require'] . '</span>';
                        }
                        ?>

                    </div>
                    <div class="form_group"> 
                       <label for=""> Đơn hàng tối thiểu </label>
                       <input class='' type="number" name="condition" min="0" value="<?= $list_voucher->condition_V?>">  
                       <?php
                        if (!empty($errors['condition']['require'])) {
                            echo '<span style="color:red">' . $errors['condition']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label for="">Số lượng</label>
                        <input class='' type="number" name="turn" min="1" value="<?= $list_voucher->quantity?>">
                        <?php
                        if (!empty($errors['turn']['require'])) {
                            echo '<span style="color:red">' . $errors['turn']['require'] . '</span>';
                        }
                        ?>

                    </div>
                    <div class="form_group">
                        <label for="">Ngày hết hạn</label>
                        <input class='' type="date" name="date_out" value="<?= $list_voucher->out_of_date?>">
                        <?php
                        if (!empty($errors['date_out']['require'])) {
                            echo '<span style="color:red">' . $errors['date_out']['require'] . '</span>';
                        }
                        ?>

                    </div>
                    <div class="form_group">
                    <label for="">Banner</label>
                    <input type="file" name="img" id="">
                    <input type="file" name="img_old" id="" hidden value="<?= $list_voucher->img?>">
                    </div>
                    <div class="btn_add">
                        <button name="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>