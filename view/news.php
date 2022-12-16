<?php 
session_start();
ob_start();
include "../model/connect.php";
$query ="select * from tintuc where idcategory = 3";
$tintuc = getAll($query);

$query1 ="select * from tintuc where idcategory = 1";
$tintuc1 = getAll($query1);

if (!empty($_SESSION["id"])) {
    $id_person = $_SESSION["id"];
  }
  if (!empty($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
    $so_luong = count($_SESSION["cart"]);
  }


?>


<!DOCTYPE html>
<html lang="en">
<?php include "./public/head.php" ?>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;

}

header {
    display: flex;
    align-items: center;
    justify-content: space-between;
   
    background-color: rgba(36, 43, 62, 1);

    padding: 10px 25px;
}

.left,
.right {
    display: flex;
    align-items: center;

}

.right form {
    border: 1px solid black;
    display: flex;
    align-items: center;
    justify-content: space-between;

    border-radius: 7px;
    margin-right: 30px;
    background-color: lavender;
    color: black;
    border: none;


}

.right input {
    width: 400px;
    margin-left: 10px;
    font-size: 18px;

}

.right input,
button {
    border: none;
    outline: none;
    background: none;
    height: 40px;
}

.icon {
    font-size: 25px;

}



.container {
    margin: 0 auto;
    width: 1400px;

}

h1 {
    color: rgb(85, 85, 85);
}

.container a {
    text-decoration: none;
    color: black;
}

.menu {
    margin-bottom: 2%;
    background-color: #232f3e;
    padding: 10px;
    margin-left: 0px;
    display: flex;
    justify-content: space-between;
    height: 43.2px;

}

.menu ul li {
    display: inline-block;
}

.menu ul li a {
    text-decoration: none;
    font-size: 20px;
    font-weight: 500;
    color: white;
    padding: 0 16px;
    padding-left: 200px;
}

.menu a:hover {

    color: aqua;
}

.menu-bottom {
    margin-top: 1%;
    margin-bottom: 2%;
    text-align: center;
    border-radius: 7px;
}

.menu-bottom ul li {
    display: inline-block;


}

.menu-bottom ul li a {
    font-size: 18px;
    font-weight: 500;
    margin-left: 40px;
}

.menu-bottom a:hover {
    text-decoration: underline;
    color: aqua;
}

.hang1 {
    display: flex;
    grid-gap: 30px;
}

.trai1 {
    display: flex;
    border: 1px solid gray;
    border-radius: 5px;
    padding: 20px;

}

.phai1 {
    border: 1px solid gray;
    border-radius: 5px;
    padding: 20px;

}

.cot1 {
    display: flex;
    grid-gap: 10px;

}

.cot2 {
    display: flex;
    grid-gap: 10px;
    padding-top: 7px;
}

.cot3 {
    display: flex;
    grid-gap: 10px;
    padding-top: 7px;
}

.cot4 {
    display: flex;
    grid-gap: 10px;
    padding-top: 7px;
}

.trai1 {
    grid-gap: 20px;
}

.dong {
    padding: 10px 0;
}

hr {
    margin-top: 15px;
}

.trai1 p {
    color: gray;
}

.khung2 {
    display: flex;
    margin-top: 30px;
    grid-gap: 30px;
}

.doc {
    display: flex;
    grid-gap: 10px;
    padding-top: 20px;
}

.doc2 {
    display: flex;
    margin-top: 15px;
    grid-gap: 10px;
}

.trai2 {
    border: 1px solid gray;
    border-radius: 5px;
    padding: 20px;

}

.phai2 {
    border: 1px solid gray;
    width: 328px;
    border-radius: 5px;
    padding: 20px;

}

.trai2 h3 {
    font-size: 25px;
    padding-bottom: 10px;
}

.phai3 {
    border: 1px solid gray;
    width: 328px;
    margin-top: 20px;
    padding: 20px;
    border-radius: 5px;
    /* box-shadow: 1px 1px 2px 2px rgb(198, 198, 198); */
}

.phai3 img {
    width: 280px;
    height: 150px;
}

.anh1 {
    padding-top: 20px;
}

.doc iframe {
    width: 100%;
}

.phai3 h4 {
    text-align: center;
    padding-top: 10px;
}





/* background-color: rgb(174, 207, 207);   */

.cuoi {
    background-color: rgb(46, 127, 127);
    padding: 45px;
    display: flex;
    max-width: 1450px;
    margin: 0 auto;
    border-radius: 10px;
    margin-top: 30px;
}

.mot img {
    width: 110px;
    height: 50px;
    border-radius: 0 15px;
}

.mot {
    margin-left: 45px;
}

.mot h2 {
    margin-top: 20px;
    margin-bottom: 10px;
}

.mot h3 {
    padding-top: 20px;
}

.icon .fa-regular {
    margin-left: 20px;
    margin-top: 30px;
}

.hai {
    margin: 0 35px;
}

.hai h4 {
    margin-top: 20px;

}

.hai h4 li {
    margin-top: 10px;
}

.ba {
    margin: 0 35px;
}

.ba h4 {
    margin-top: 20px;

}

.ba h4 li {
    margin-top: 10px;
}

.bon {
    margin: 0 35px;
}

.bon h4 {
    margin-top: 20px;

}

.bon h4 li {
    margin-top: 10px;
}

.nam hr {
    margin-top: 30px;
}

.nam {
    margin-left: 25px;
}

.nam input {
    border: none;
    margin-left: 15px;
    padding-top: 13px;
    width: 200px;
    outline: none;

}

#xuong {
    padding: 20px 0;
}

#dich {
    padding-left: 45px;
}

.nam h3 i {
    padding-left: 7px;
    font-size: 25px;
}

#kinh {
    color: black;
}

.tkiem {
    border: 2px solid rgb(8, 114, 133);
    width: 250px;
    height: 40px;
    background-color: white;
    border: none;
    border-radius: 20px;
    margin-top: 15px;
}

.footer {
    display: flex;
    width: 1410px;
    grid-gap: 10px;
    height: 250px;
    text-align: center;
    align-items: center;
    background-color: #131921;
    margin-bottom: 1%;
    margin-top: 1%;
    padding: 20px;
    color: white;
    border-radius: 5px;
    margin-left: 3.9%;
}

.footer h4 {
    padding: 10px 0;
}

.footer p {
    padding: 2px;
}

.icon-ft {
    display: flex;
    justify-content: space-between;
    margin-top: 3%;
}

.icon-phone {
    display: flex;
    justify-content: space-between;
    margin-left: 26%;

}

.icon-mail {
    display: flex;
    justify-content: space-between;
    margin-right: 30%;
}

.connect {
    display: flex;
    grid-gap: 20px;
    align-items: center;
    padding: 30px;
}

.ft-1 {
    width: 380px;
}

.ft-2 {
    width: 200px;
}

.ft-3 {
    width: 250px;
}

.ft-4 {
    width: 250px;
}

.ft-5 {
    width: 400px;
}

.ft-5 h3 {
    margin-top: -6%;
    padding-bottom: 1%;
}

.ft-nhapemail {
    display: flex;
    padding: 10px;
}

.ft-nhapemail input {
    width: 220px;
    height: 30px;
    border-radius: 7px;
    border: none;
    padding: 10px;
    margin-left: 18px;
}

.ft-nhapemail button {
    background-color: white;
    color: black;
    width: 60px;
    height: 30px;
    border-radius: 7px;
    border: none;
    margin-left: 10%;
    padding: 5px;
}
</style>
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
<script>
  tippy('#show_cart', {
    arrow: false,
    content: `<?php if(!empty($cart)){ ?>
              <div class="show_cart"> 
             <?php foreach($cart as $id => $product):?> 


              <div class="iteam_cart"> 
              <a  href="../detail.php?id=<?php echo $product["id"] ?>">
             <p><?php echo $product["productName"] ?></p>
             <div class="typpy_colum">
             <img src="../src/image/<?php echo $product["images"] ?>" alt="">
             <div class="show_type">
            <p><?php echo $product["color"] ?> X <?php echo $product["quantity"] ?></p>
            <p><?php echo $product["productPrice"] ?>₫</p>
             </div>
             </div>
             </div>
             </a>
             
             <?php endforeach ?>
             <a class="view_cart_detail" href="../view/view_cart.php?id=">Xem chi tiết</a>
             </div> 
             <?php } ?>
         `,
    allowHTML: true,
    placement: 'bottom',
    delay: [0, 1000],
    duration: [0, 1000],
    interactive: true,
  });
</script>
</html>