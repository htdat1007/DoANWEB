<?php
session_start();
error_reporting(0);

$tk = isset($_SESSION["global"]) ? $_SESSION["global"] : "";
$connect = mysqli_connect('localhost', 'root', '', 'datawed');
$khohangid = $_POST["Idkhohang"];

$taikhoan = "SELECT * FROM taikhoan WHERE taikhoan_user = '$tk'";
$khohang = "SELECT * FROM khohang WHERE khohang_id = '$khohangid'";
$querytk = mysqli_query($connect, $taikhoan);
$rowtk = mysqli_fetch_assoc($querytk);
$querykh = mysqli_query($connect, $khohang);
$rowkh = mysqli_fetch_assoc($querykh);
$id = $rowtk['taikhoan_id'];
$id_khohang = $rowkh['taikhoan_id'];

if ($tk != "") {
    if ($id_khohang == "0") {
        $coin = $_POST["Ncoin"];
        $sqltkud = "UPDATE taikhoan SET coin = '$coin' WHERE taikhoan_user = '$tk'";
        $querytkud = mysqli_query($connect, $sqltkud);
        if (!$querytkud) {
            print_r(mysqli_error($connect));
        } else {
            $sqlkhud = "UPDATE khohang SET taikhoan_id = '$id' WHERE khohang_id = '$khohangid'";
            $querykhud = mysqli_query($connect, $sqlkhud);
            if ($querykhud) {
                echo "muathanhcong";
            } else {
                print_r(mysqli_error($connect));
            };
        }
        mysqli_close($connect);
    } else {
        echo "taikhoandamua";
    }
}
