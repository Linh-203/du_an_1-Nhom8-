<div style="text-align: center;margin-top: 50px;margin-bottom: 20px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px"><?php echo isset($_GET['module']) == true ? strtoupper($_GET['module']) : "" ?> MANAGEMENT</h3>
</div>
<table id="my_table" class="table table-hover display nowrap" width="100%">
    <thead>
        <tr>
            <th></th>
            <th>Avatar</th>
            <th>User</th>
            <th>Product</th>
            <th>Date</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $key=>$value) {?>
        <tr>
            <td><?= $key + 1?></td>
            <td><img src="../src/image/<?= $value->avatar?>" width="50px" alt=""></td>
            <td><?= $value->username?></td>
            <td><?= $value->id_product?></td>
            <td><?= $value->date_cmt ?></td>
            <td><?= $value->content ?></td>
            <td>
                <button class='btn_delete'>
                    <a style="color: white;" onclick="return confirm('Bạn có chắc muốn xóa ??')" class='btn_delete' href="comment.php?id=<?= $value->id?>&act=delete">Delete</a>
                </button>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>