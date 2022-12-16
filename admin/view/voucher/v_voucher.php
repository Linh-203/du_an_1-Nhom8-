<?php 
   include "../model/connect.php";
   $query = "SELECT * FROM vocher";
   $voucher = getAll($query);
    if(!empty($_GET["alert"])) echo $_GET["alert"]; 
?>
<style>
    table{
        text-align: center;
    }
    #img{
        width: 200px;
        height: 128px;
    }
</style>

<div style="text-align: center;margin-top: 50px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px"><?php echo isset($_GET['module']) == true ? strtoupper($_GET['module']) : "" ?> MANAGEMENT</h3>
</div>
<div class="mb-3 w-100 text-center ">
    <a href="./voucher.php?act=add"><button>Add New Voucher</button></a>
</div>
<table id="my_table" class="table table-hover display nowrap" width="100%">
    <thead>
        <tr>
            <th>STT</th>
            <th style="text-align: center;">Mã voucher</th>
            <th  style="text-align: center;">Banner</th>
            <th  style="text-align: center;">Số lượng</th>
            <th  style="text-align: center;">Mệnh giá</th>
            <th  style="text-align: center;">Ngày hết hạn</th>
            <th  style="text-align: center;">Trạng thái</th>
            <th  style="text-align: center;">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($voucher as $key => $value): ?>
        <tr>
            <td><?php echo $key +1 ?></td>
          
            <td><?= $value["code"] ?></td>
            <td><img id="img" src="../src/image/<?= $value["img"] ?>" alt=""></td>
            <td><?php echo $value["quantity"] ?></td>
            <td><?php echo $value["sale"] ?>%</td>
            <td><?php echo $value["out_of_date"] ?></td>
            <td><?php if($value["status"]==1){ ?>
                Hoạt động
         <?php   } ?></td>
         <td>  <button class='btn_edit'>
            <a style="color: white;" href="voucher.php?act=update&id=<?= $value["code"] ?>">Update</a> 
         </button> 
         <button class='btn_delete'>
            <a style="color: white;" onclick="return confirm('Bạn có chắc muốn xóa ??')" href="voucher.php?act=delete&id=<?=$value["code"] ?>">Delete</a>
         </button>
        </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
