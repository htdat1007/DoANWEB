<?php
session_start();
error_reporting(0);

$tk = isset($_SESSION["global"]) ? $_SESSION["global"] : "";
$connect = mysqli_connect('localhost', 'root', '', 'datawed');

if ($tk != "") {
    $newimg = $_POST["newimg"];
    $sqltkud = "UPDATE taikhoan SET taikhoan_img = '$newimg' WHERE taikhoan_user = '$tk'";
    $querytkud = mysqli_query($connect, $sqltkud);
    if ($querytkud) {
        echo "Đổi Thành Công";
    };
}
