<?php
     session_start();
     
     
     include "../model/connect.php"; 
      
     $Err="";
     $codeErr= $mailErr="";
     $code=$mail="";
     $pass="";
       
         if(isset($_POST["btn-login"])){           
              if(!empty($_POST["code"]) && !empty($_POST["mail"])){ 
                $code = $_POST["code"];
                $query = "select * from users where id like n'$code'"; 
                $users = getOne($query);
                if($_POST["code"] == $users["id"] && $_POST["mail"] == $users["email"]){
                $pass=$users["pass"];
                   
              }else{
                $Err="Sai mã hoặc mail";     
             }
                       
             }else{
              if(empty($_POST["code"])){
                $codeErr="Không được bỏ trống";
              }else{
                $code=$_POST["code"];
              };
              if(empty($_POST["mail"])){
                $mailErr="Không được bỏ trống";
              }else{
                $mail=$_POST["mail"];
              };
           
             }
             
         }
        

       
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->


</head>
<style>
	#pass{
		
		color: green;
	}
	#login{
		font-size: 20px;
	}
	#login:hover{
		text-decoration: underline;
	}
	#login:hover{
		color:darkblue
	}
	#err{
		color: red;
		padding-left: 20px;
	}
</style>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Quên mật khẩu
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="POST">
			<?php if(!empty($Err)){ ?>	  <div class="alert" style="background-color: #ee4d2d;color: white;text-align: center;">
				<span><?php echo $Err?></span> <br></div> <?php } ?>
					<div class="wrap-input100 validate-input" data-validate = "">
						<input class="input100" type="text" name="code" placeholder="Mã đăng nhập">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<span id="err"><?php echo $codeErr?></span> <br>
					<div class="wrap-input100 validate-input" data-validate="Email">
						<input class="input100" type="text" name="mail" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<span id="err"><?php echo $mailErr?></span> <br>
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="btn-login">
							Tìm lại mật khẩu
						</button> 
						
					</div>
					<div class="" style="padding-left: 20px;">
					
                   <span id="pass"><?php if(!empty($pass))
				   
				   echo "Mật khẩu của bạn là :$pass"?></span> <br>
				<a href="../login/" id="login"> Đăng nhập ngay</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->

</body>
</html>