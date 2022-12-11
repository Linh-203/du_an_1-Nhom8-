<div style="text-align: center;margin-top: 50px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px"><?php echo isset($_GET['module']) == true ? strtoupper($_GET['module']) : "" ?> MANAGEMENT</h3>
</div>
<div class="mb-3 w-100 text-center ">
    <a href="user.php?act=add"><button>Add New User</button></a>
</div>
<table id="my_table" class="table table-hover display nowrap" width="100%">
    <thead>
        <tr>
            <th></th>
            <th>Avatar</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Status</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $key => $value) :?>
        <tr>
            <td><?= $key + 1?></td>
            <td><img src="../src/image/<?= $value->avatar?>" alt="" width="50px" height="50px"></td>
            <td><?= $value->username?></td>
            <td><?= $value->email?></td>
            <td>
                <?= $value->status == 1 
                ? '<p class="status">Active</p>' 
                : '<p class="status1">Not Active</p>'?>
            </td>
            <td>
                <?= $value->role == 1 
                ? '<p class="role">Admin</p>' 
                : '<p class="role1">Client</p>'?>
            </td>
            <td>
                <!-- <button class='btn_edit'>
                    <a href="user.php?act=edit&id=<?= $value->id?>" style="color: white;">Update</a>
                </button>
                <button class='btn_delete'>
                    <a style="color: white;" onclick="return confirm('Bạn có chắc muốn xóa ??')" class='btn_delete' href="user.php?act=delete&id=<?= $value->id?>">Delete</a>
                </button> -->
                <?= $value->id == 1 ? "" : 
                        '<button class="btn_edit">
                            <a href="user.php?act=edit&id='.$value->id.'" style="color: white;">Update</a>
                        </button>&nbsp;
                        <button class="btn_delete">
                            <a style="color: white;" href="user.php?act=delete&id='.$value->id.'">Delete</a>
                        </button>'
                        ?>
            </td>
            
        </tr>
        <?php endforeach?>
    </tbody>
</table>
