<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "product";

$conn = mysqli_connect($servername, $username, $password, $dbName);
$conn->set_charset("utf8");
  if (!$conn) {
    echo " <script type=\"text/javascript\">alert('Lỗi khi kết nối tới cơ sở dữ liệu!'); </script>";
    die();
  }
?>