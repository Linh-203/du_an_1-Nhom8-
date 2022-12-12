<div style="text-align: center;margin-top: 50px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px"><?php echo isset($_GET['module']) == true ? strtoupper($_GET['module']) : "" ?> MANAGEMENT</h3>
</div>
<div class="mb-3 w-100 text-center ">
    <a href="category.php?act=add"><button>Add New Category</button></a>
</div>
<table id="my_table" class="table table-hover display nowrap" width="100%">
    <thead>
        <tr>
            <th></th>
            <th>Image</th>
            <th>Name</th>
            <th>Date</th>
           
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $key=>$value) : ?>
        <tr>
            <td><?= $key + 1?></td>
            <td><img src="../src/image/<?= $value->image?>" alt="" width="50px"></td>
            <td><?= $value->categoryName?></td>
            <td><?= $value->date?></td>
          
            <td>
                <button class='btn_edit'>
                    <a href="category.php?act=edit&id=<?= $value->id ?>" style="color: white;">Update</a>
                </button>
                <button class='btn_delete'>
                    <a style="color: white;" onclick="return confirm('Bạn có chắc muốn xóa ??')" class='btn_delete' href="category.php?act=delete&id=<?= $value->id ?>">Delete</a>
                </button>

            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>