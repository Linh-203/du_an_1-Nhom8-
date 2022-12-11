<div class="banner" style="margin-top: 10px; ">
        <div class="" style="width: 100%;">
         <!-- <img src="https://cdn.pnjwatch.com.vn/Category/45/Banner-DocQuyen-23040x880-3.jpg" alt=""> -->
            <img style=" " src="https://donghochat8668.com/wp-content/uploads/2020/09/Dong-ho-chat-3-02-1400x438.jpg" alt="">
            </div>
          
        </div>
       <h1 class="cate" ><i class="fa fa-bars"></i> Danh mục sản phẩm</h1>
        <div class="category">
            <?php foreach($category as $value):?>
            <div class="colum">
                <div class="img" >
                <img height="" src=" <?php echo $value["image"]?>" alt="">

                </div>
                <p><?php echo $value["categoryName"]?></p>
            </div>
            <?php endforeach?>
            
        </div>
        <div class="oder">
            <div class="local">
            <img height="70px" src="https://static.swappa.com/static/images/banners/local_skyline_purple.png" alt="">
            <h4 style="margin-left: 50px;">Giao hàng vào ngày hôm sau trong 48 đô thị</h4>
            </div>
            <button style="border: 2px solid white;padding: 0 15px; font-size: 20px;color: white;">Chi tiết từng địa phương</button>
        </div>
        
        <div class="product">
       
        </div>
         
       
        
        
        
        <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">Sản phẩm mới</h1>
        <div class="product">
        <?php foreach($new as $value):?>
            <div class="colum">
             <a href="./detail.php?id=<?php echo $value["id"]?>"><div class="image_prd">
                <img src="./src/image/<?php echo $value["productImage"]?>" alt="">
                </div>
                <h3 style="height: 45px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;color: black;font-weight: 500;"><?php echo $value["productName"]?></h3>
                <h4 style="color: red;"><?php echo $value["productPrice"]?>₫</h4>
                </a>   
                <div class="love" style="display: flex; justify-content: space-between;">
                    <div style="display: flex;">
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i> </div>
                <?php 
                if(!empty($_SESSION["id"])){
                $id = $_SESSION["id"];
                  $id_prd= $value["id"];
                    $sql = "SELECT * from favorite_product where id_product = $id_prd and id_user like n'$id' ";
                    $favorite = getAll($sql);
                
                    if(count($favorite) != 0){?>
                      <a onclick="return confirm('Xóa khỏi sản phẩm yêu thích')" href="./controller/delete_favorite.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="fa fa-heart"></i></a> 

                      <?php } else{?>
               <a href="./controller/add_favorive.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="far fa-heart"></i></a> 
                <?php } 
                }?>
                </div>
                
            </div>
            <?php endforeach?>
        </div>
        <div class="center">
          
          <img style="width:100% ;height:300px " src="./src/image/bannermini.PNG" alt="">
        </div>
        <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">Sản phẩm bán chạy </h1>
        <div class="product">
        <?php foreach($selling as $value):?>
            <div class="colum">
             <a href="./detail.php?id=<?php echo $value["id"]?>"><div class="image_prd">
                <img src="./src/image/<?php echo $value["productImage"]?>" alt="">
                </div>
                <h3 style="height: 45px; overflow: hidden;display: -webkit-box; -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;color: black;font-weight: 500;"><?php echo $value["productName"]?></h3>
                <h4 style="color: red;"><?php echo $value["productPrice"]?>₫</h4>
                </a>   
                <div class="love" style="display: flex; justify-content: space-between;">
                    <div style="display: flex;">
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i>
                <i style="font-size: 15px; color: yellow;" class="fas fa-star"> </i> </div>
                <?php 
                if(!empty($_SESSION["id"])){
                $id = $_SESSION["id"];
                  $id_prd= $value["id"];
                    $sql = "SELECT * from favorite_product where id_product = $id_prd and id_user like n'$id' ";
                    $favorite = getAll($sql);
                
                    if(count($favorite) != 0){?>
                      <a onclick="return confirm('Xóa khỏi sản phẩm yêu thích')" href="./controller/delete_favorite.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="fa fa-heart"></i></a> 

                      <?php } else{?>
               <a href="./controller/add_favorive.php?id=<?php echo $value["id"] ?>"><i style="font-size: 20px; color: red;margin-right: 15px;" class="far fa-heart"></i></a> 
                <?php } 
                }?>
                </div>
                
            </div>
            <?php endforeach?>
        </div>

        <h1 style=" background: transparent linear-gradient(90deg,#009981 0%,#00483d 100%) 0% 0% no-repeat;
    color: white; display: inline-block; margin: 20px 0;padding:10px; border-radius: 5px;">Ưu đãi thanh toán</h1>
    <div class="uda" style="display: grid; grid-template-columns: repeat(3,1fr); padding: 0 30px;">
        <div class="img_ud" >
            <img src="https://cdn.tgdd.vn/2022/06/banner/EXB-500k-380x200-2.png" alt="">
        </div>
        <div class="img_ud">
            <img src="https://cdn.tgdd.vn/2022/08/banner/Moca-380x200-1.png" alt="">
        </div>
        <div class="img_ud">
            <img src="https://cdn.tgdd.vn/2022/09/banner/VCBDesk--1--380x200-1.png" alt="">
        </div>
    </div>
    <div class="chitiet" style=" display:grid; grid-template-columns: repeat(4,1fr);">
                    <div class="free200">
                        <i class="fa fa-map-marked-alt"></i>
                        <h1>Miễn phí giao hàng</h1>
                        <p>Đơn hàng trên 200k</p>
                    </div>
                    <div class="chamsoc">
                        <i class="fa fa-phone-volume"></i>
                        <h1>Chăm sóc khách hàng</h1>
                        <p>Liên tục 24/7/365</p>
                    </div>
                    <div class="khuyenmai">
                        <i class="fa fa-recycle"></i>
                        <h1>Đổi trả hàng</h1>
                        <p>Đổi trả hàng trong 7 ngày</p>
                    </div>
                    <div class="khuyenmai">
                        <i class="fa fa-recycle"></i>
                        <h1>Khuyến mãi cuối năm</h1>
                        <p>Giảm 20% khi mua từ 3 sản phẩm </p>
                    </div>
                </div>
                