tippy('#show_cart', {
    arrow:false,
    content: `<?php
    $index=0;
      ?>
          <div class="show_cart"> 
         <?php foreach($cart as $id => $product):?> 


          <div class="iteam_cart"> 
          <a  href="./detail.php?id=<?php echo $product["id"] ?>">
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
         <a class="view_cart_detail" href="./view/view_cart.php?id=">Xem chi tiết</a>
         </div>
     `,
    allowHTML: true, 
    placement: 'bottom',
    delay: [0, 1000],
    duration: [0, 1000],
    interactive: true,
  });
  $(document).ready(function(){
$(".close").click(function(){
$(".alert").alert("close");
});
});