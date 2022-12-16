<?php if(empty($_SESSION["id"])){
  header("location:../login");
} ?>
<header style="background-color: #131921;">
      <div class="left">
        <div class="logo" style="text-align: center;">
          <img height="60px" src="../src/image/tech.png" alt="">
          <h4 style="color: lightblue; font-weight: 600; font-size: 20px;">HIGH-TECH</h4>
        </div>
       
      </div>
      <div class="right">
        <form action="../product.php" style="background-color: white;border-radius: 7px" method="POST">
          <input name="search" type="text" placeholder="Tìm kiếm sản phẩm..." style="width: 900px;background-color: white;">
          <button name="submit_search" ><i style="font-size: 20px;border-radius: 0 7px 7px 0;background-color: rgba(243, 168, 71, 1);height: 40px; padding:10px;text-align: center; " class="fa fa-search"></i></button>
        </form>
        <div class="icon" style="display: flex;align-items: center;color: white;">
         <a href="./favorite_product.php" style="color:white"> <i class="fas fa-heart"></i></a>
          <a href="./list-bill.php"><i style="margin: 0 20px;color:white;" class="fas fa-clipboard-list"></i></a>

          <a id="show_cart" style="display: flex; margin-right: 30px;text-decoration: none;" href="./view_cart.php?id="> <i id="count" style="margin-right: 30px;color: lavender;" class="fas fa-shopping-bag"></i>
          
            <p style="font-size: 14px;background-color: white;border-radius: 100%; height: 20px; width: 20px;text-align: center; margin-left: -40px;color:red; font-weight: 600;">
              <?php if (!empty($_SESSION["cart"])) {
                echo $so_luong;
              } else {
                echo "0";
              } ?>
            </p>

          </a>

          <?php if (empty($_SESSION["id"])) { ?>
            <i class="fas fa-user"></i>
          <?php } else { ?>
          <a href="./account.php" id="user_hover">  <img height="40px" width="40px" style="border-radius: 50%;" src="../src/image/<?php echo $_SESSION["avatar"] ?>" alt=""></a>
          <?php } ?>

        </div>
      </div>
    </header>
    <!-- <img width="100%" src="https://cdn.watchstore.vn/uploads/productBanners/5pkXymn.jpg" alt=""> -->
    
    <div class="menu" >
          <ul>
            <li><a href="../index.php"><i class="fa fa-home-lg-alt"></i> Trang chủ</a></li>
            <li><a href="../product.php">Sản phẩm</a></li>
            <li><a href="./news.php">Tin tức</a></li>
            <li><a href="#">Giới thiệu</a></li>

          </ul>
         
        </div>