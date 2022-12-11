<div class="title_act" style="text-align: center;margin-top: 50px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px"><?php echo isset($_GET['module']) == true ? strtoupper($_GET['module']) : "" ?> MANAGEMENT</h3>
</div>
<div class="mb-3 w-100 text-center ">
    <a href="product.php?act=add"><button>Add New Products</button></a>
</div>
<table id="my_table" class="table table-hover display nowrap" width="100%">
    <thead>
        <tr>
            <th></th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Color</th>
            <th>Số lượng</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $key=>$value) :?>
        <tr>
            <td><?= $key + 1?></td>
            <td><img src="../src/image/<?= $value-> productImage?>" alt="" width="50px"></td>
            <td style="font-size: 12px;"><?= $value-> productName?></td>
            <td><?= $value-> productPrice?> đ</td>
            <td><?= $value-> color_red?>  <?= $value-> color_white?>  <?= $value-> color_black?>  <?= $value-> color_green?></td>
            <td> <?= $value-> quantity?> </td>
            <td>
                <button class='btn_edit'>
                    <a href="product.php?act=edit&id=<?= $value->id?>" style="color: white;">Update</a>
                </button>
                <button class='btn_detail'>
                    <a href="product.php?act=detail&id=<?= $value->id?>" style="color: white;">Detail</a>
                </button>
                <button class='btn_delete'>
                    <a style="color: white;" onclick="return confirm('Bạn có chắc muốn xóa ??')" class='btn_delete' href="product.php?act=delete&id=<?= $value->id?>">Delete</a>
                </button>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>