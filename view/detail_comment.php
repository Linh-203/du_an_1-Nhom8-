<?php
 include "../model/connect.php";
 $id = $_GET["id"];
 $query = "SELECT comment.content ,comment.id as id_cmt, users.username , comment.date_cmt FROM comment JOIN users ON comment.id_user=users.id WHERE comment.id_product = $id";
 $comment_detail = getAll($query);

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
    <table>
        <thead>
           <tr>
           <th>STT</th>
            <th>Nội dung bình luận</th>
            <th>Người bình luận</th>
            <th>Thời gian</th>
            <th>Xóa</th>
           </tr>
        </thead>
        <tbody>
            <?php foreach($comment_detail as $key => $value): ?>
           <tr>
            <td><?php echo $key +1?></td>
            <td><?php echo $value["content"] ?></td>
            <td><?php echo $value["username"] ?></td>
            <td><?php echo $value["date_cmt"] ?></td>
            <td><a href="../controller/admin_delete_cmt.php?id=<?php echo $value["id_cmt"] ?>&id_prd=<?php echo $id ?>">XÓA</a></td>
           </tr>
           <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>