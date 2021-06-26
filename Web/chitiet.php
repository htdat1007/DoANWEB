<?php
session_start();
error_reporting(0);
function url()
{
    return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTP']) && $_SERVER['HTTPS'] != 'off' ? 'http' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['REQUEST_URI']
    );
}

if (isset($_SESSION["global"])) {
    $tk = $_SESSION["global"];
    $url = url();
    $index = strrpos($url, 'id=');
    $khohang_id = substr($url, $index + 3);
    $sql = "SELECT * FROM khohang WHERE khohang_id=$khohang_id";
    $ds = "SELECT * FROM khohang WHERE khohang_id<>$khohang_id";
    $query = mysqli_query($connect, $sql);
    $queryds = mysqli_query($connect, $ds);
    $row = mysqli_fetch_assoc($query);
    $taikhoan = "SELECT * FROM taikhoan WHERE taikhoan_user = '$tk'";
    $querytk = mysqli_query($connect, $taikhoan);
    $rowtk = mysqli_fetch_assoc($querytk);
}
$tk = $_SESSION["global"];
if ($tk == "") {
    header("location:index.php?page_layout=trangchu");
}
?>
<p style="display: none;"><?php echo $_SESSION["global"]; ?></p>
<p class="btn-coin" style="display: none;"><?php echo $rowtk['coin']; ?></p>
<p class="khohang-id" style="display: none;"><?php echo $row['khohang_id']; ?></p>
<p class="khohang-taikhoanid" style="display: none;"><?php echo $row['taikhoan_id']; ?></p>
<div class="header">
    <div class="container">
        <?php
        include 'tabbar.php';
        ?>
    </div>
</div>
<!--Chi Tiết Tài Khoản-->
<div class="listshow chitiet">
    <div class="row">
        <div class="col-2">
            <img src="Image/<?php echo $row['image']; ?>" width="100%" height="260px" id="chitietimgbanner">
            <div class="chitiet-img-row">
                <div class="chitiet-img-col">
                    <img src="Image/<?php echo $row['image']; ?>" width="100%" height="100%" class="chitiet-img-nho">
                </div>
                <div class="chitiet-img-col">
                    <img src="Image/<?php echo $row['image_2']; ?>" width="100%" height="100%" class="chitiet-img-nho">
                </div>
                <div class="chitiet-img-col">
                    <img src="Image/<?php echo $row['image_3']; ?>" width="100%" height="100%" class="chitiet-img-nho">
                </div>
                <div class="chitiet-img-col">
                    <img src="Image/<?php echo $row['image_4']; ?>" width="100%" height="100%" class="chitiet-img-nho">
                </div>
            </div>
        </div>
        <div class="col-2">
            <p>ID tài khoản: <?php echo $row['khohang_id']; ?></p>
            <h1><?php echo $row['khohang_name']; ?></h1>
            <div class="row row3">
                <h4>Giá: <?php echo $row['gia']; ?> VNĐ</h4>
                <a href="" class="btn">
                    Mua&nbsp;
                    <img src="Image/shopls.jpg" width="18px" height="18px">
                </a>
            </div>
            <h3>Thông Tin</h3>
            <br>
            <p><?php echo $row['mota']; ?></p>
        </div>
    </div>
</div>
<!--Tài khoản liên quan-->
<div class="listshow">
    <div class="row row2">
        <h2>Tài Khoản Khác</h2>
        <p>Xem Thêm</p>
    </div>
    <div class="row">
        <?php
        while ($rowds = mysqli_fetch_assoc($queryds)) {
        ?>
            <div class="col-3">
                <h3><?php echo $rowds['mota']; ?></h3>
                <img src="Image/<?php echo $rowds['image']; ?>">
                <div class="row">
                    <h2>ID:
                        <?php echo $rowds['khohang_id']; ?></h2>
                    <a href="index.php?page_layout=chitiet&id=<?php echo $rowds['khohang_id']; ?>" class="btn">Chi Tiết</a>
                </div>
                <h4>Giá:
                    <label class="giasp">
                        <?php echo $rowds['gia']; ?>
                    </label>
                    VNĐ
                </h4>
                <p>Cấp Độ: <?php echo $rowds['capdo']; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!--Lệnh đổi ảnh khi ấn vào-->
<script>
    var chitietimgbanner = document.getElementById("chitietimgbanner");
    var chitietimgnho = document.getElementsByClassName("chitiet-img-nho");

    chitietimgnho[0].onclick = function() {
        chitietimgbanner.src = chitietimgnho[0].src;
    }
    chitietimgnho[1].onclick = function() {
        chitietimgbanner.src = chitietimgnho[1].src;
    }
    chitietimgnho[2].onclick = function() {
        chitietimgbanner.src = chitietimgnho[2].src;
    }
    chitietimgnho[3].onclick = function() {
        chitietimgbanner.src = chitietimgnho[3].src;
    }
</script>
<script src="JS/jQuery.js?v=<?php echo time() ?>"></script>
<script src="JS/chitiet.js?v=<?php echo time() ?>"></script>