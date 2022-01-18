<html>
	<head>
		<title>Form đăng ký thành viên</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<style>
body{
background: url(http://mymaplist.com/img/parallax/back.png);
background-color: #444;
background: url(http://mymaplist.com/img/parallax/pinlayer2.png),url(http://mymaplist.com/img/parallax/pinlayer1.png),url(http://mymaplist.com/img/parallax/back.png);    
}
.vertical-offset-100{
    padding-top:100px;
}
.login{
	
	text-align:center;
}
</style>
	</head>
	<body>
		<?php
		  require "ketnoi.php";
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["pass"];
 			$name = $_POST["name"];
  			$email = $_POST["email"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" || $name == "" || $email == "") {
                $message = "bạn vui lòng nhập đầy đủ thông tin";
				   echo "<script type='text/javascript'>alert('$message');</script>";
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from datadangky where username='$username'";
					$kt=mysqli_query($conn, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO datadangky(
	    					username,
	    					password,
	    					name,
						    email
	    					) VALUES (
	    					'$username',
	    					'$password',
						    '$name',
	    					'$email'
	    					)";
   						mysqli_query($conn,$sql);
                           $message = "Chúc mừng bạn đã đăng ký thành công!";
				   		echo "<script type='text/javascript'>alert('$message');</script>";
						   header('Location: login.php');
					}
									    
					
			  }
	}
	?>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please Sign Up</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form method="POST" >
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="username" name="username" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="password" name="pass" type="password" value="">
			    		</div>
						<div class="form-group">
			    		    <input class="form-control" placeholder="họ tên" name="name" type="text">
			    		</div>
						<div class="form-group">
			    		    <input class="form-control" placeholder="email" name="email" type="text">
			    		</div>
						<div class="login">
						<a href="login.php">Đăng nhập?</a>
						</div>
						</br>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" name="btn_submit" value="Sign Up">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
	</body>
	</html>