
<div style="text-align: center;margin-top: 50px;margin-bottom: 20px; background:#009CFF ; height: 60px">
    <h3 style="color: white; padding-top: 15px"><?php echo isset($_GET['module']) == true ? strtoupper($_GET['module']) : "" ?> MANAGEMENT</h3>
</div>
<table id="my_table" class="table table-hover display nowrap" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>Mã hóa đơn</th>
            <th>Tổng tiền</th>
            <th>Trạng thái thanh toán</th>
            <th>Trạng thái đơn hàng</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $key=>$value ){?>
            <tr>
                <td><?= $key + 1?></td>
                <td><?= $value->id ?></td>
                <td><?= $value->total?> đ</td>            
                <td><?= $value->pay == 1 ? 
                        ' <p class="status2"  style="background: black">Chưa thanh toán</p>' :
                        ' <p class="status2" style>Đã thanh toán</p>'
                ?> 
                </td>
                <td>
                <?php if($value->status ==0){ ?>
                    <p class="status2">Chờ xác nhận</p>
                <?php }else if($value->status==1){ ?>
                    <p class="status2">Chờ lấy hàng</p>
                <?php   }else if($value->status==2){ ?>
                    <p class="status2">Đang giao</p>
                <?php }else if($value->status==3){?>
                    <p class="status2">Đã nhận hàng</p>
                <?php }else if($value->status==4){?>    
                    <p class="status2">Đã hủy</p>
                <?php }?>
                    
                </td>
                <td>
                    <button class='btn_edit'>
                        <a href="don_hang.php?act=detail&id=<?= $value->id?>" style="color: white">Detail</a>
                    </button>
                    
                    
                </td>
            </tr>
        <?php }?>

    </tbody>
</table>