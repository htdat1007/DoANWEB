<?php
session_start();
error_reporting(0);

$connect = mysqli_connect('localhost', 'root', '', 'datawed');
$tk = $_SESSION["global"];

$menhgia = $_POST['mgia'];
$thecao = "SELECT * FROM napthecao WHERE loaithe = '$menhgia'";
$querythecao = mysqli_query($connect, $thecao);
$rowtc = mysqli_fetch_assoc($querythecao);

$taikhoan = "SELECT * FROM taikhoan WHERE taikhoan_user = '$tk'";
$querytk = mysqli_query($connect, $taikhoan);
$rowtk = mysqli_fetch_assoc($querytk);

$seri = $_POST['seri'];
$mathe = $_POST['mthe'];

if ($menhgia != 0 && $seri != "" && $mathe != "") {
    $coin = $rowtk['coin'];
    $sr = $rowtc['seri'];
    $mt = $rowtc['mathe'];
    $loaithe = $rowtc['loaithe'];
    if ($menhgia == $loaithe) {
        if ($seri == $sr) {
            if ($mathe == $mt) {
                $newcoin = $coin + $rowtc['Pcoin'];
                $updatetk = "UPDATE taikhoan SET coin = '$newcoin' WHERE taikhoan_user = '$tk'";
                $queryudtk = mysqli_query($connect, $updatetk);
                if ($queryudtk) {
                    echo "Nạp Thành Công";
                };
            } else {
                echo "Mã Thẻ Sai";
            }
        } else {
            echo "Seri Sai";
        }
    } else {
        echo "Sai Mệnh Giá";
    }
}
if ($seri == "" or $mathe == "") {
    echo "Vui Lòng Nhập Seri Hoạc Mã Thẻ";
}
