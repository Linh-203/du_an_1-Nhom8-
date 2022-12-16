<?php 
   include "../model/connect.php";
   $query = "SELECT * FROM vocher";
   $voucher = getAll($query);
   if(!empty($_GET["alert"])){
    $alert = $_GET["alert"];
   }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <?php  if(!empty($alert)){
      echo  $alert ;
   } ?>
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
            <th>Mã voucher</th>
            <th>Số lượng</th>
            <th>Mệnh giá</th>
            <th>Ngày hết hạn</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($voucher as $key => $value): ?>
        <tr>
            <td><?php echo $key +1 ?></td>
            <td><?= $value["code"] ?></td>
            <td><?php echo $value["quantity"] ?></td>
            <td><?php echo $value["sale"] ?>%</td>
            <td><?php echo $value["out_of_date"] ?></td>
            <td><?php if($value["status"]==1){ ?>
                Hoạt động
         <?php   } ?></td>
         <td> <a href="./update_voucher.php?id=<?= $value["code"] ?>">UPDATE</a> 
            <a href="./delete_voucher.php?id=<?= $value["code"] ?>">DELETE</a>
        </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

</body>
</html>