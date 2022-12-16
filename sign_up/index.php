<?php
include "../model/connect.php";
$nameErr = $imageErr = $passErr=$re_passErr = $emailErr =$codeErr= $phoneErr="";
$name = $image = $pass =$email=$re_pass=$code="";
if (isset($_POST["btn-add"])) {
    if (empty($_POST["code"])) {
        $codeErr = "Mã đăng nhập không được bỏ trống";
    } else {
        $code = $_POST["code"];
        $query= "select * from users where id like n'$code'";
        $users = getAll($query); 
        if(count($users) != 0){
            $codeErr="Mã đăng nhập đã tồn tại";
    
        }

    };
    if (empty($_POST["username"])) {
        $nameErr = "Tên không được bỏ trống";
    } else {
        $name = $_POST["username"];
    };

    if (empty($_FILES["avatar"]["name"])) {
        $imageErr = "Ảnh đại diện không được bỏ trống";
    } else {
        $image = $_FILES["avatar"]["name"];
    };

    if (empty($_POST["pass"])) {
        $passErr = "Mật khẩu không được bỏ trống";
    } else {
        $pass = $_POST["pass"];
    };
   
    if (empty($_POST["email"])) {
        $emailErr = "Email không được bỏ trống";
    } else {
        $email = ($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Sai định dạng mail";
        }
    }
    if(empty($_POST["phone"])){
		$phoneErr = "Nhập số điện thoại ";
	}

    if (empty($_POST["re_pass"])) {
        $re_passErr = "Không được bỏ trống";
    } else if ($_POST["pass"] != $_POST["re_pass"]) {
        $re_passErr = "Mật khẩu không trùng khớp";
    } else {
        $re_pass = $_POST["re_pass"];
    };
}
if(!empty($_POST["phone"]) && !empty($_POST["username"]) && !empty( $_FILES["avatar"]["name"]) && !empty($_POST["pass"]) && !empty($_POST["code"]) && !empty($_POST["re_pass"]) && !empty($_POST["email"]) && ($_POST["re_pass"] == $_POST["pass"]) ){
    
      $alert ="";
        $code = $_POST["code"];
        
    $userName = $_POST["username"];
    $phone = $_POST["phone"];
    $avatar = $_FILES["avatar"]["name"];
    $password = $_POST["pass"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $status = $_POST["status"];
        $query= "select * from users where id like n'$code'";
        $users = getAll($query); 
        if(count($users) != 0){
            $codeErr="Mã đăng nhập đã tồn tại";
    
        }else{

    $query = "INSERT INTO users(id,username,avatar,pass,phone,email,role,status) 
	values ('$code','$userName','$avatar','$password','$phone','$email','$role','$status') ";
    connect($query);
	move_uploaded_file($_FILES["avatar"]["tmp_name"],"../src/image/".$_FILES["avatar"]["name"]);

    $alert = "Đăng ký thành công";
    header("location:../login?type=$alert"); 
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
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
</head>
<style>
	#err{
		color: red;
	}
</style>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" enctype="multipart/form-data">
					<!-- <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span> -->
                      
					<span class="login100-form-title p-b-34 p-t-27">
						Đăng ký 
					</span>
					<input type="text" value="2" name="role" hidden>
					<input type="text" value="1" name="status" hidden>
                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="code" placeholder="Mã đăng nhập" value="<?php 
						 if(!empty($_POST["code"])) echo $_POST["code"];
						?>">
						<span class="focus-input100" data-placeholder="&#xf201;"></span>
					</div>
					<span id="err"><?php echo $codeErr ?></span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Tên người dùng" value="<?php 
						 if(!empty($_POST["username"])) echo $_POST["username"];
						?>">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<span id="err"><?php echo $nameErr ?></span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="phone" placeholder="Số điện thoại" value="<?php 
						 if(!empty($_POST["phone"])) echo $_POST["phone"];
						?>" >
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<span id="err"><?php echo $phoneErr ?></span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="file" name="avatar" placeholder="">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<span id="err"><?php echo $imageErr ?></span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="email" placeholder="Email" value="<?php 
						 if(!empty($_POST["email"])) echo $_POST["email"];
						?>">
						<span class="focus-input100" data-placeholder="&#xf200;"></span>
					</div>
					<span id="err"><?php echo $emailErr ?></span>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Mật khẩu">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<span id="err"><?php echo $passErr ?></span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="password" name="re_pass" placeholder="Nhập lại mật khẩu">
						<span class="focus-input100" data-placeholder="&#xf190;"></span>
					</div>
					<span id="err"><?php echo $re_passErr ?></span>



					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn-add">
							Đăng ký
						</button>
					</div>
                   
					<div class="text-center p-t-90" style="margin-top: -60px;">
					<span>Bạn có tài khoản rồi ?</span> <a style="color: white;" href="../login/">Đăng nhập ngay</a> <br>
						<a class="txt1" href="#">
							Bạn quên mật khẩu ?
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

</body>
</html>