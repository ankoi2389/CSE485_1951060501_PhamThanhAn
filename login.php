<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Đăng nhập Gmail</title>
</head>

<body>
  <div class="con">
  <div class="login">
    <div class="logo_login">
      <img src="image/google_login.jpg" style="width: 75px; height: 24px;"alt="">
    </div>
    <div style="margin-top: 20px;"><p style="font-size: 24px;text-align : center;">Đăng nhập</p></div>
    <p style="text-align: center;">Tiếp tục tới gmail</p>
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput1" class="form-label">Email hoặc số điện thoại</label> -->
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email hoặc số điện thoại" name="username">
    </div>
    <a href="https://accounts.google.com/signin/v2/usernamerecovery?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&service=mail&sacu=1&rip=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin" style="font-size: 15px; color: #1a73e8; margin-top:0px;text-decoration: none"><b>Bạn quên địa chỉ email?</b></a>
    <div style="font-size: 13px;">Đây không phải máy tính của bạn? Hãy sử dụng chế độ Khách để đăng nhập một cách riêng tư. <a href="https://support.google.com/chrome/answer/6130773?hl=vi">Tìm hiểu thêm</a></div>
    
    <div class="btn_login">
      <a href="singup.php">Tạo tài khoản</a>
      <button type="submit" class="btn btn-primary btn-block" style="margin-left: 0px;" name="btn_submit">Tiếp theo</button>
    </div>
  </div>
  </div>
  
  
  <?php
    if (isset($_POST['btn_submit']))
    {
      include_once ('connect.php'); 
      
      // Check connection
      if (!$conn) 
      {
        //  die("Connection failed: " . mysqli_connect_error());
        echo " <script type=\"text/javascript\">alert('Lỗi khi kết nối tới cơ sở dữ liệu'); </script>";
        die();
     }
      $sql = "SELECT username, password FROM tblogin";
      $result = $conn->query($sql); 

      if ($result->num_rows > 0) 
      {
        // Load dữ liệu lên website
        while($row = $result->fetch_assoc()) {
        $username = $row["username"];
        $password = $row["password"];}
        // echo "username: " . $row["username"]. " password: " . $row["password"]. " 
      }
      if($_POST['username']==$username and $_POST['password']==$password)
      {
        // echo " <script type=\"text/javascript\">alert('correct'); </script>";
            //  $str_URL = "product.php?id=";
          header("location: home.php");
          // echo "<script type=\"text/javascript\" language=\"Javascript\">window.open('$str_URL$create_product');</script>";
      }
      else  
        echo " <script type=\"text/javascript\">alert('username or password incorrect'); </script>";
        
      mysqli_close($conn);
    }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>