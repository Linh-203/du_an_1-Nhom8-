<?php
     session_start(); 
     include "../model/connect.php"; 
     $query = "select * from users"; 
     $users = getAll($query); 
	 if(!empty($_GET["type"])){
	 $alert = $_GET["type"];
	 }
    //  var_dump($users);die;
     $Err="";
     $non_matching="";
     $codeErr= $passErr="";
     $code=$pass="";
     
     foreach($users as $value){ 
         if(isset($_POST["btn-login"])){ 
              if(!empty($_POST["code"]) && !empty($_POST["pass"])){       
         
                 if($_POST["code"] == $value["id"] && $_POST["pass"] == $value["pass"]){
                  $_SESSION["avatar"] = $value["avatar"];
                  $_SESSION["id"]=$value["id"];
                  $_SESSION["username"] = $value["username"];
                  $_SESSION["email"] = $value["email"]; 
                  $_SESSION["phone"] = $value["phone"]; 
                  $_SESSION["adress"] = $value["adress"]; 
                   if($value["role"]==1){

                     header("location:../admin"); 
                   }else if($value["role"]==2){
                 
                     header("location:../index.php");
                   
                   }
                 }else{
                  
                     $Err= "Mật khẩu hoặc tên đăng nhập sai!";
                 
                 }
             }else{
                if(empty($_POST["code"])){
                  $codeErr="Mã đăng nhập không được bỏ trống !";
                }else{
                  $code=$_POST["code"];
                };
                if(empty($_POST["pass"])){
                  $passErr="Mật khẩu không được bỏ trống !";
                }else{
                  $pass=$_POST["pass"];
                };
                

             }
                       
             }
         }

       
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	
	<div class="limiter">
		
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST">
					<?php if(!empty($_GET["type"])){ ?>
					<div class="alert" style="background-color: lightgreen;color: green;">
				<span style=""><?php  echo $alert ?></span>
				<button class="close">&times;</button>
				</div>
				<?php } ?>
					<span class="login100-form-title p-b-49">
						Đăng nhập
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Mã đăng nhập</span>
						<input class="input100" type="text" name="code" placeholder="Nhập mã đăng nhập của bạn">
						 
					</div>
					<em style="color:red"><?php echo $codeErr ?></em>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Mật khẩu</span>
						<input class="input100" type="password" name="pass" placeholder="Nhập mật khẩu của bạn">
						

					</div>
					<em style="color:red"><?php echo $passErr ?></em>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="../forgot_pass/">
							Bạn quên mật khẩu ?
						</a>
					</div>
					<span style="color: red;"><?php echo $Err ?></span>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="btn-login">
								Đăng nhập
							</button>
						</div>
					</div>
					<div class="form-group" style="margin-top: 20px;">
					<span>Bạn chưa có tài khoản ?</span> <a href="../sign_up/">Đăng ký ngay</a>
					</div>
					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

						<a href="../sign_up/" class="txt2">
							Sign Up
						</a>
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
	<!-- <script src="js/main.js"></script> -->
	<script>
$(document).ready(function(){
  $(".close").click(function(){
    $(".alert").alert("close");
  });
});
</script>
</body>
</html>