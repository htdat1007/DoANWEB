<?php
session_start();
error_reporting(0);
$tk = "";
$mk = "";
$tksaidn = [];
$tksaidk = [];

if (isset($_POST["btn-dangky"])) {
    $tk = $_POST["user"];
    $mk = $_POST["pass"];
    $ktra = $connect->query("SELECT * FROM taikhoan where taikhoan_user = '$tk'");
    if ($ktra->num_rows > 0) {
        $tksaidk["loitk"] = '<script> alert ("Tài khoản đã tồn tại"); </script>';
    }
    if ($tk == "" or $mk == "") {
        $tksaidk["loitk"] = '<script> alert ("Vui lòng nhập tài khoản mật khẩu"); </script>';
    } else {
        if (count($tksaidk) == 0) {
            $sqlinput = "INSERT INTO `taikhoan`(`taikhoan_user`, `taikhoan_pass`, `coin`, `taikhoan_img`) VALUES ('$tk','$mk','0', 'user.jpg')";
            $connect->query($sqlinput);
            $_SESSION["global"] = $tk;
        }
    }
}
if (isset($_POST["btn-dangnhap"])) {
    $tk = $_POST["user"];
    $mk = $_POST["pass"];
    $ktra = $connect->query("SELECT * FROM taikhoan where taikhoan_user = '$tk' AND taikhoan_pass = '$mk'");
    if ($ktra->num_rows > 0) {
        $_SESSION["global"] = $tk;
    } else {
        $tksaidn["loitk"] = '<script> alert ("Tài khoản hoạc mật khẩu sai"); </script>';
    }
}
