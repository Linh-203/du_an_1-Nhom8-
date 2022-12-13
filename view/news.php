<?php 
include "../model/connect.php";
$query ="select * from tintuc where idcategory = 3";
$tintuc = getAll($query);

$query1 ="select * from tintuc where idcategory = 1";
$tintuc1 = getAll($query1);


session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../src/css/new.css">
 
    <script src="https://kit.fontawesome.com/d38ff20960.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/969bec5078.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
<?php include "./public/header.php" ?>

        
    
        <h1>TIN TỨC</h1>
        <div class="khung1">
        <div class="menu-bottom">
            <ul>
                <li><a href="">TIN TỨC</a></li>
                <li><a href="">KHUYẾN MÃI</a></li>
                <li><a href="">THỦ THUẬT</a></li>
                <li><a href="">VIDEO HOT</a></li>
                <li><a href="">SỰ KIỆN</a></li>
                <li><a href="">ĐÁNH GIÁ - TƯ VẤN</a></li>
                <li><a href="">APP & GAME</a></li>
               
            </ul>
        </div>

        <div class="hang1">
            <div class="trai1">
                <div class="ngoai">

                    <div class="anh">
                    <a href="">
                    <img src="../src/image/anh1.webp" alt="">
                    </a>
                    </div>
                    <div class="chu">
                    <a href="">
                    <h3>Trên tay OPPO A17k: Ngoại hình hiện đại, pin lớn sử dụng thoải mái, giá 3.29 triệu đồng</h3>
                    </a>
                    <p>0-3 ngày trước</p>
                    </div>
                  
                </div>

                <div class="trong">
                    <?php foreach($tintuc as $value):?>
                    <div class="cot1">
                       
                        <div class="anh">
                        <img src="../src/<?php echo $value["image"]?>" alt="">
                        </div>
                        <div class="chu">
                        <h4><?php echo $value["name"]?></h4>
                        <p><?php echo $value["note"]?></p>
                        </div>
                       
                    </div>

                    <?php endforeach ?>

                    
                </div>
            </div>



            <div class="phai1">
                <h3>Xem nhiều</h3>
                <hr>
                
                <div class="dong"><i class="fa-solid fa-bolt"></i> Tìm hiểu ngay về phí chuyển tiền MoMo và những trường hợp nào sẽ...</div>
                <div class="dong"><i class="fa-solid fa-bolt"></i>   Top 5 điện thoại dành cho người lớn tuổi đáng mua nhất 2022: Chữ to,...</div>
                <div class="dong"><i class="fa-solid fa-bolt"></i>    Cách sử dụng PC Manager - CCleaner phiên bản Microsoft</div>
                <div class="dong"><i class="fa-solid fa-bolt"></i>    7 ứng dụng quản lý mật khẩu tốt nhất cho iPhone của bạn</div>
                <div class="dong"><i class="fa-solid fa-bolt"></i>     Top điện thoại cho trẻ em giá rẻ, thuận tiện cho việc học online</div>
                <div class="dong"><i class="fa-solid fa-bolt"></i>     Hướng dẫn thêm lịch thi đấu World Cup 2022 vào điện thoại Android</div>
                
            </div>
        </div>
        </div>

   <div class="khung2">

     <div class="trai2">
        
        <?php foreach($tintuc1 as $value):?>
        <div class="doc">
        <a href="">
        <div class="anh">
            <img src="../src/<?php echo $value["image"]?>" alt="">
        </div>
        </a>
       
        <div class="chu">
        <a href="">
         <h3><?php echo $value["name"]?></h3>
         </a>
         <p><?php echo $value["note"]?></p>
        </div>
      
        </div>
<hr>
       
       
            <?php endforeach?>
          

            <div class="doc">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/UVbv-PJXm14" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
     </div>
   
    <div class="bao">
     <div class="phai2">
     <h3>Sản phảm mới</h3>
     <hr>
   
      <div class="doc2">
        <div class="anh"><img src="../src/image/anh13.webp" alt=""></div>
        <div class="chu">
            <h4>Samsung Galaxy S23 Ultra</h4>
            <p>22 bài viết</p>
        </div>
      </div>
      <div class="doc2">
        <div class="anh"><img src="../src/image/anh14.webp" alt=""></div>
        <div class="chu">
            <h4>Samsung Galaxy S23</h4>
            <p>34 bài viết</p>
        </div>
      </div>
      <div class="doc2">
        <div class="anh"><img src="../src/image/anh15.webp" alt=""></div>
        <div class="chu">
            <h4>iPhone 14 Pro Max 128GB</h4>
            <p>14 bài viết</p>
        </div>
      </div>

      <div class="doc2">
        <div class="anh"><img src="../src/image/anh15.webp" alt=""></div>
        <div class="chu">
            <h4>iPhone 14 Pro Max 128GB</h4>
            <p>14 bài viết</p>
        </div>
      </div>
           
     </div>
     <div class="phai3">
        <h3>Khuyến mãi</h3>
      <div class="anh1">
        <img src="../src/image/km1.jfif" alt=""> 
        </div>
        <div class="anh1">
        <img src="../src/image/km2.jfif" alt="">
        </div>
        <div class="anh1">
        <img src="../src/image/km3.jfif" alt="">
        </div>
        <div class="anh1">
        <img src="../src/image/km4.jfif" alt="">
        </div>
        <div class="anh1">
        <img src="../src/image/km5.jfif" alt="">
        </div>
        <h4>Xem thêm</h4>
     </div>

     </div>

   </div>



   </div>
   <footer>
      <div class="footer">
        <div class="ft-1">
          <img style="height: 80px; width:130px" src="../src/image/tech.png" alt="">
          <h4>Siêu thị công nghệ cao</h4>
          <p>Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội</p>
          <div class="icon-ft">
            <div class="icon-phone">
              <i style="font-size: 25px;" class="fas fa-phone"></i>
              <p>Hotline</p>
            </div>
            <div class="icon-mail">
              <i style="font-size: 25px;" class="fas fa-envelope"></i>
              <p>Mail</p>
            </div>
          </div>
        </div>

        <div class="ft-2">
          <h4>Về chúng tôi</h4>
          <p>Lịch sử</p>
          <p>Chính sách</p>
          <p>Giới thiệu</p>
          <p>Chủ đề</p>
        </div>

        <div class="ft-3">
          <h4>Thông tin cần biết</h4>
          <p>Chính sách đổi trả</p>
          <p>Hướng dẫn thanh toán</p>
          <p>Liên hệ</p>
          <p>Chủ đề</p>
        </div>

        <div class="ft-4">
          <h4>Danh mục sản phẩm</h4>
          <p>Laptop</p>
          <p>Điện thoại</p>
          <p>TV</p>
          <p>Tai nghe</p>
        </div>

        <div class="ft-5">
          <div class="connect">
            <div class="connect-text">
              <h4>Kết nối</h4>
            </div>
            <div class="connect-fb">
              <i style="font-size: 25px;" class="fab fa-facebook-square"></i>
            </div>

            <div class="connect-ins">
              <i style="font-size: 25px;" class="fab fa-instagram"></i>
            </div>

            <div class="connect-tiktok">
              <i style="font-size: 25px;" class="fab fa-tiktok"></i>
            </div>

            <div class="connect-twitter">
              <i style="font-size: 25px;" class="fab fa-twitter"></i>
            </div>
          </div>

          <h3>Đăng ký nhận tin</h3>
          <p>Bằng cách nhập email đăng ký bạn sẽ nhận được các tin khuyến mãi từ chúng tôi.</p>
          <div class="ft-nhapemail">
            <div class="input">
              <input type="text" placeholder="Nhập email">
            </div>
            <div class="button">
              <button>submit</button>
            </div>
          </div>
        </div>
      </div>
    </footer>
 


   



</div>
</body>
</html>