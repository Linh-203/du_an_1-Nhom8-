<?php
include "./model/connect.php";
session_start();

$query =  "SELECT * FROM category";
$category = getAll($query);
$query = "SELECT * FROM products";
$product1 = getAll($query);
$query = "SELECT * , date FROM products ORDER BY products.date DESC LIMIT 12";
$new = getAll($query);
$query = "SELECT * FROM products where selling =1";
$selling = getAll($query);
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
<?php include "./template/head.php" ?>
<style>

</style>

<body>
  <div class="container">

    <?php include "./template/header.php" ?>

    <div class="banner" style="margin-top: 10px; ">
      <div class="slide-banner" style="width: 80%;margin-right: 10px;">
        <img style="border-radius: 10px;  height: 420px;" src="https://www.garmin.co.in/m/in/g/banner/rwd-banner/fr955_2560x728.jpg" alt="">
        <img style="border-radius: 10px;  height: 420px;" src="https://antien.vn/files/styles/banner/public/slider/1200x382-Venu%202%20Plus%20-%20Giam%201m2%20copy.png?itok=5yPdumLD" alt="">
        <img style="border-radius: 10px;  height: 420px;" src="https://shiftdelete.net/wp-content/uploads/2019/02/samsung-galaxy-watch-active-ozellikleri-ve-fiyati-giyebilir-teknoloji.jpg" alt="">
        <img style="border-radius: 10px;  height: 420px;" src="https://antien.vn/files/styles/banner/public/slider/1200x382-giam10-Garmin-Epix-Gen-2---BFD.jpg?itok=AhLtV7vF" alt="">
        <img style="border-radius: 10px;  height: 420px;" src="https://cdn.techzones.vn/Data/Sites/1/Banner/960xtechzones-flagship-garmin-thang-11-01.jpg" alt="">
        <img style="border-radius: 10px;  height: 420px;" src="https://cdn2.viettelstore.vn/images/Advertises/Watch-main-pc_32544271301112022.jpg" alt="">
      </div>
      <div class="sale">
        <img src="https://c1.neweggimages.com/webresource/WebResource/Themes/Nest/banner/Lowprice30dhome.jpg" alt="">
        <img src="https://c1.neweggimages.com/WebResource/Themes/Nest/ne_features_pcbuilder.jpg" alt="">
        <img src="https://c1.neweggimages.com/webresource/WebResource/Themes/Nest/justgpu/justgpuhome1172x556.jpg" alt="">
      </div>
    </div>
    <h1 class="cate"><i class="fa fa-bars"></i> Danh mục sản phẩm</h1>
    <div class="category">
      <?php foreach ($category as $value) : ?>
        <div class="colum">
          <div class="img">
            <img height="" src="./src/image/<?php echo $value["image"] ?>" alt="">

          </div>
          <p><?php echo $value["categoryName"] ?></p>
        </div>
      <?php endforeach ?>

    </div>
    <div class="oder">
      <div class="local">
        <img height="70px" src="https://static.swappa.com/static/images/banners/local_skyline_purple.png" alt="">
        <h4 style="margin-left: 50px;">Giao hàng vào ngày hôm sau trong 48 đô thị</h4>
      </div>
      <button style="border: 2px solid white;padding: 0 15px; font-size: 20px;color: white;">Chi tiết từng địa phương</button>
    </div>






    <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">Sản phẩm mới</h1>
    <div class="product">
      <?php foreach ($new as $value) : ?>
        <div class="colum">
          <a href="./detail.php?id=<?php echo $value["id"] ?>">
            <div class="image_prd">
              <img src="./src/image/<?php echo $value["productImage"] ?>" alt="">
            </div>
            <h3 style="height: 45px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;color: black;font-weight: 500;"><?php echo $value["productName"] ?></h3>
            <h4 style="color: red;"><?php echo $value["productPrice"] ?>₫</h4>
          </a>
          <div class="love" style="display: flex; justify-content: space-between;">
            <div style="display: flex;">
              <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
              <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
              <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
              <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
              <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
            </div>
            <?php
            if (!empty($_SESSION["id"])) {
              $id = $_SESSION["id"];
              $id_prd = $value["id"];
              $sql = "SELECT * from favorite_product where id_product = $id_prd and id_user like n'$id' ";
              $favorite = getAll($sql);

              if (count($favorite) != 0) { ?>
                <a onclick="return confirm('Xóa khỏi sản phẩm yêu thích')" href="./controller/delete_favorite.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="fa fa-heart"></i></a>

              <?php } else { ?>
                <a href="./controller/add_favorive.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="far fa-heart"></i></a>
            <?php }
            } ?>
          </div>

        </div>
      <?php endforeach ?>
    </div>
    <div class="center">

      <img style="width:100% ;height:300px " src="./src/image/bannermini.PNG" alt="">
    </div>
    <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">Sản phẩm bán chạy </h1>
    <div class="product">
      <?php foreach ($selling as $value) : ?>
        <div class="colum">
          <a href="./detail.php?id=<?php echo $value["id"] ?>">
            <div class="image_prd">
              <img src="./src/image/<?php echo $value["productImage"] ?>" alt="">
            </div>
            <h3 style="height: 45px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;color: black;font-weight: 500;"><?php echo $value["productName"] ?></h3>
            <h4 style="color: red;"><?php echo $value["productPrice"] ?>₫</h4>
          </a>
          <div class="love" style="display: flex; justify-content: space-between;">
            <div style="display: flex;">
              <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
              <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
              <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
              <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
              <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
            </div>
            <?php
            if (!empty($_SESSION["id"])) {
              $id = $_SESSION["id"];
              $id_prd = $value["id"];
              $sql = "SELECT * from favorite_product where id_product = $id_prd and id_user like n'$id' ";
              $favorite = getAll($sql);

              if (count($favorite) != 0) { ?>
                <a onclick="return confirm('Xóa khỏi sản phẩm yêu thích')" href="./controller/delete_favorite.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="fa fa-heart"></i></a>

              <?php } else { ?>
                <a href="./controller/add_favorive.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="far fa-heart"></i></a>
            <?php }
            } ?>
          </div>

        </div>
      <?php endforeach ?>
    </div>

    <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">Ưu đãi thanh toán</h1>
    <div class="uda">

      <img src="https://cdn.tgdd.vn/2022/11/banner/380-x-200--1--380x200.png" alt="">

      <img src="https://cdn.tgdd.vn/2022/06/banner/EXB-500k-380x200-2.png" alt="">

      <img src="https://cdn.tgdd.vn/2022/08/banner/Moca-380x200-1.png" alt="">

      <img src="https://cdn.tgdd.vn/2022/09/banner/VCBDesk--1--380x200-1.png" alt="">

      <img src="https://cdn.tgdd.vn/2022/10/banner/Desk--1--380x200.jpg" alt="">

      <img src="https://cdn.tgdd.vn/2022/06/banner/VNPay-Toan-bo-san-pham-380x200.png" alt="">
    </div>
    <div class="chitiet">
      <div class="chitiet-jr">
        <i style="color: #00483d; font-size: 55px;" class="fas fa-check-circle"></i>
        <p>Sản phẩm</p>
        <h2>Chính hãng</h2>
      </div>
      <div class="chitiet-jr">
        <i style="color: #00483d; font-size: 55px;" class="fa-solid fa-dolly"></i>
        <p>Miễn phí giao hàng</p>
        <h2>Đơn hàng trên 200k</h2>
      </div>
      <div class="chitiet-jr">
        <i style="color: #00483d; font-size: 55px;" class="fas fa-headset"></i>
        <p>Chăm sóc khách hàng</p>
        <h2>Liên tục 24/7/365</h2>
      </div>
      <div class="chitiet-jr">
        <i style="color: #00483d; font-size: 55px;" class="fa-solid fa-rotate"></i>
        <p>Đổi trả hàng</p>
        <h2>Trong 7 ngày</h2>
      </div>
    </div>
    <?php include "./template/footer.php" ?>


  </div>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<script>
  var price = document.querySelector("#price");
  var input = document.querySelector("#locgia");

  function change() {
    price.innerText = input.value

  }
  $(document).ready(function() {
    $('.slide-banner').slick({
      slidesToShow: 1,
      arrows: true,
      infinite: true, // chạy hết sp
      dots: true,
      autoplay: true,
      autoplaySpeed: 1500,
      prevArrow: `<button type='button' class='slick-prev slick-arrow'><i style="color:grey;" class="fas fa-chevron-circle-left"></i>
        </button>`,
      nextArrow: `<button type='button' class='slick-next slick-arrow'><i style="color:grey;" class="fas fa-chevron-circle-right"></i>
        </button>`

    });
  });


  $(document).ready(function() {
    $('.uda').slick({
      slidesToShow: 4,
      arrows: true,
      infinite: true, // chạy hết sp
      dots: true,
      autoplay: true,
      autoplaySpeed: 1500,
      prevArrow: `<button type='button' class='slick-prev slick-arrow'><i style="color:grey;" class="fas fa-chevron-circle-left"></i>
        </button>`,
      nextArrow: `<button type='button' class='slick-next slick-arrow'><i style="color:grey;" class="fas fa-chevron-circle-right"></i>
        </button>`

    });
  });
</script>
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
    content: `<?php
              $index = 0;
              ?>
              <?php if(!empty($cart)){ ?>
              <div class="show_cart"> 
             <?php foreach ($cart as $id => $product) : ?> 


              <div class="iteam_cart"> 
              <a  href="./detail.php?id=<?php echo $product["id"] ?>">
             <p><?php echo $product["productName"] ?></p>
             <div class="typpy_colum">
             <img src="./src/image/<?php echo $product["images"] ?>" alt="">
             <div class="show_type">
            <p><?php echo $product["color"] ?> X <?php echo $product["quantity"] ?></p>
            <p><?php echo $product["productPrice"] ?>₫</p>
             </div>
             </div>
             </div>
             </a>
             
             <?php endforeach ?>
             <a class="view_cart_detail" href="./view/view_cart.php?id=">Xem chi tiết</a>
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