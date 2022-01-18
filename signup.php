<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Tạo tài khoản Google</title>
</head>

<body>
    <?php

    require "connect.php";
    if (isset($_POST["btn_submit"])) {
        //lấy thông tin từ các form bằng phương thức POST
        $name = $_POST["name"];
        $password = $_POST["password"];
        $rePassword = $_POST["rePassword"];
        $email = $_POST["email"];
        //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
        if ($name == "" || $password == "" || $rePassword == "" || $name == "" || $email == "") {
            $message = "Bạn vui lòng nhập đầy đủ thông tin";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
         else if ($password !== $rePassword) {
            $message = "Mật khẩu bạn nhập không khớp!";
            echo "<script type='text/javascript'>alert('$message');</script>";
         } 
        else {
            // Kiểm tra tài khoản đã tồn tại chưa
            $sql = "select * from tb_account where email='$email'";
            $kt = mysqli_query($conn, $sql);

            $nRow = $kt->num_rows;
if ( $kt === TRUE and $nRow > 0) {
                $message = "Tài khoản đã tồn tài!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {
                //thực hiện việc lưu trữ dữ liệu vào db
                $sql = "INSERT INTO tb_account(
	    					name,
	    					password,
						    email
	    					) VALUES (
	    					'$name',
	    					'$password',
                            '$email'
	    					)";
                mysqli_query($conn, $sql);
                $message = "Chúc mừng bạn đã đăng ký thành công!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Location: login.php');
            }
        }
    }

    ?>
    <form method="post">
        <div class="con">
            <div class="signup">
                <div class="logo_signup">
                    <img src="image/google_login.jpg" style="width: 75px; height: 24px;" alt="">
                </div>
                <div style="margin-top: 20px;">
                    <p style="font-size: 24px;text-align : center;">Tạo tài khoản Google</p>
                </div>
                <div class="mb-3">
                    <!-- <label for="exampleFormControlInput1" class="form-label">Email hoặc số điện thoại</label> -->
                    <input type="name" class="form-control mb-3" id="exampleFormControlInput1" placeholder="Họ và tên" name="name">
                    <input type="email" class="form-control mb-3" id="exampleFormControlInput1" placeholder="Email hoặc số điện thoại" name="email">
                    <input type="password" class="form-control mb-3" id="exampleFormControlInput1" placeholder="Mật khẩu" name="password">
                    <input type="password" class="form-control mb-3" id="exampleFormControlInput1" placeholder="Xác nhận mật khẩu" name="rePassword">
                </div>
                <div class="btn_signup">
                    <a href="login.php">Đăng nhập</a>
                    <button type="submit" class="btn btn-primary btn-block" style="margin-left: 0px;" name="btn_submit">Đăng ký</button>
                </div>
            </div>
        </div>

    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>