<?php
session_start();
error_reporting(0);

$connect = mysqli_connect('localhost', 'root', '', 'datawed');

$tk = $_SESSION["global"];
$taikhoan = "SELECT * FROM taikhoan WHERE taikhoan_user = '$tk'";
$querytk = mysqli_query($connect, $taikhoan);
$rowtk = mysqli_fetch_assoc($querytk);

$matkhau = $rowtk['taikhoan_pass'];

$matkhauc = $_POST["matkhauc"];
$matkhaum = $_POST["matkhaum"];

if ($matkhauc == "") {
    echo "Vui Lòng Nhập Mật Khẩu";
} else {
    if ($matkhau == $matkhauc) {
        if ($matkhauc == $matkhaum) {
            echo "Mật Khẩu Giống Nhau Yêu Cầu Nhập Lại";
        } else {
            $updatematkhau = "UPDATE taikhoan SET taikhoan_pass = '$matkhaum' WHERE taikhoan_user = '$tk'";
            $queryudmk = mysqli_query($connect, $updatematkhau);
            if ($queryudmk) {
                echo "Đổi Thành Công";
            }
        }
    } else {
        echo "Mật Khẩu Sai";
    }
}
