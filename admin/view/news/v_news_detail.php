<div class="title_act" style="text-align: center;margin-top: 50px;margin-bottom:30px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px">News - <?php echo strtoupper($_GET['act'])?></h3>
</div>
<div class="about__component">
            <div class="image_product">
                <img src="../src/image/<?= $news->image?>" alt="" width="300px" style="margin-top: 50px;margin-left:50px">
            </div>
            <div class="about_form">
                <form class='form' method="POST" enctype="multipart/form-data">
                    <div class="form_group">
                        <label class='name-product' for="">Title</label>
                        <input type="text" style="width: 250px;" name='' disabled value="<?= $news->name?>">
                    </div>                    
                    <div class="form_group">
                        <label class='name-product' for="">Id Category</label>
                        <input type="text" style="width: 250px;" disabled value="<?= $news->idcategory?>" >
                    </div>
                    
                </form>
                <div class="form_group">
                        <label class='name-product' for="">Content</label>
                        <textarea name="" id="" style="width: 520px;" cols="30" placeholder='Chưa có mô tả!' rows="15" disabled><?= $news->note?></textarea>
                    </div>
            </div>
        </div>