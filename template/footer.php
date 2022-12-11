<footer>
       <img src="../src/image/d_h_a3.jfif" alt="">             
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
     var price = document.querySelector("#price");
    var input = document.querySelector("#locgia"); 
    function change(){
    price.innerText=input.value
   
}
</script>
</html>