<!DOCTYPE html>
<html lang="en">
<head>
 <?php session_start();
  include "./template/head.php" ;
 ?>
</head>
<body>
  <div class="container">
    <?php include "./template/header.php" ?>
  </div>
</body>
<script>
   tippy('#user_hover', {
        content: '<a id="logout" href="./controller/log_out.php">Đăng xuất</a> <br> <a id="ql_tk" href="./view/account.php">Quản lý tài khoản</a> ',
        allowHTML: true, 
        placement: 'bottom-start',
        delay: [0, 1000],
        duration: [0, 1000],
        interactive: true,
        //  theme: 'light',
        
     
       
      });
</script>
</html>