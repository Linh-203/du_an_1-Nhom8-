<div style="text-align: center;margin-top: 50px;margin-bottom: 20px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px"><?php echo isset($_GET['module']) == true ? strtoupper($_GET['module']) : "" ?> MANAGEMENT</h3>
</div>

<table id="my_table" class="table table-hover display nowrap" width="100%">
    <thead>
        <tr>
            <th></th>
            <th>Sản phẩm</th>
            <th>Nội dung bình luận</th>
            <th>Người bình luận</th>
            <th>Ngày bình luận</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comments as $key=>$value) {?>
        <tr>
            <td><?= $key + 1?></td>
            <td style="width: 100px;;" ><?= $value->productName ?></td>
            <td><?= $value->content?></td>
            <td><?= $value->username?></td>
            <td><?= $value-> date_cmt ?></td>
            <td>
                <button class='btn_delete'>
                    <a style="color: white;" class='btn_delete' href="comment.php?id=<?= $value->id_cmt?>&act=delete">Xóa</a>
                </button>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>