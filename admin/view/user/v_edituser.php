<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">USER - <?php echo strtoupper($_GET['act'])?></h3>
</div>
<div class="about__component">
            <div class="img_user">
                <img src="../src/image/<?= $users->avatar?>" alt="" style="margin-top: 50px;" width="50%">
            </div>
            <div class="about_form">
            <form class='form' method="POST" enctype="multipart/form-data">
                    <input type="text" name="id" value="<? $users->id?>" hidden>
                    <div class="form_group">
                        <label class='name-product' for="">Username</label>
                        <input style="height: 40px;width: 250px;" type="text" placeholder="Nhập tên đăng nhập" name='username' value="<?=  $users->username?>">
                        <?php
                        if (!empty($errors['username']['require'])) {
                            echo '<span style="color:red">' . $errors['username']['require'] . '</span>';
                        }
                        ?>
                    </div>

                    <div class="form_group">
                        <label class='name-product' for="">Email</label>
                        <input type="email" placeholder="Nhập tên sản phẩm" name='email' value="<?= $users->email?>">
                        <?php
                        if (!empty($errors['email']['require'])) {
                            echo '<span style="color:red">' . $errors['email']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label class='name-product' for="">Phone Number</label>
                        <input type="text" placeholder="Nhập số điện thoại" name='phone' value="<?= $users->phone?>">
                        <?php
                        if (!empty($errors['phone']['require'])) {
                            echo '<span style="color:red">' . $errors['username']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label class='name-product' for="">Mật khẩu</label>
                        <input type="text" placeholder="*****" name='pass' value="<?= $users->pass?>">
                        <?php
                        if (!empty($errors['pass']['require'])) {
                            echo '<span style="color:red">' . $errors['pass']['require'] . '</span>';
                        }
                        ?>
                    </div>
                    <div class="form_group">
                        <label class='name-product' for="">Avatar</label>
                        <input class='input__img' type="file" name='avatar'>
                        <input class='input__img' type="input" name='old_avatar' value="<?= $users->avatar?>" hidden>

                        <?php
                        if (!empty($errors['avatar']['name']['require'])) {
                            echo '<span style="color:red">' . $errors['avatar']['name']['require'] . '</span>';
                        }
                        ?>
                    </div>


                    <div class="form_group">
                    <label class='name-product' for="">Status</label>
                        <div class="form-control" style="height: 40px;width: 250px;">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input  type="radio" id="special" class="form-check-input" name="status"  value="1" <?= $users->status == 1 ? "checked" : "" ?>>Active
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" id="special" class="form-check-input" name="status" value="0" <?= $users->status == 0 ? "checked" : "" ?>> Not Active
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form_group">
                    <label class='name-product' for="">Vai trò</label>
                        <div class="form-control" style="height: 40px;">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input  type="radio" id="special" class="form-check-input" name="role" value="1" <?= $users->role == 1 ? "checked" : "" ?>> Admin
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" id="special" class="form-check-input" name="role" value="0" <?= $users->role == 0 ? "checked" : "" ?>> Client
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="btn_add">
                        <button name="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>