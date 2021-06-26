<?php
session_start();
error_reporting(0);

if (isset($_SESSION["global"])) {
    $tk = $_SESSION["global"];
    $taikhoan = "SELECT * FROM taikhoan WHERE taikhoan_user = '$tk'";
    $querytk = mysqli_query($connect, $taikhoan);
    $rowtk = mysqli_fetch_assoc($querytk);
}
$tk = $_SESSION["global"];
if ($tk == "") {
    header("location:index.php?page_layout=trangchu");
}

$idc = $rowtk['taikhoan_id'];
$khohang = "SELECT * FROM khohang WHERE taikhoan_id = '$idc'";
$querykh = mysqli_query($connect, $khohang);

?>
<div class="header">
    <div class="container">
        <?php
        include 'tabbar.php';
        ?>
    </div>
</div>
<!--Thông tin tài khoản và lịch sử-->
<div class="listshow thongtintk">
    <h2 class="tieude" style="margin-top: 20px; margin-bottom: 20px;"> ID Tài Khoản: <?php echo $rowtk['taikhoan_id']; ?></h2>
    <div class="thongtintk-info">
        <img src="Image/<?php echo $rowtk['taikhoan_img']; ?>">
        <div class="form-container-thongtintk">
            <div class="form-btn">
                <span onclick="thongtin()">Thông Tin</span>
                <span onclick="matkhau()">Mật Khẩu</span>
                <hr id="danhdau">
            </div>
            <form id="thongtinform" method="post">
                <div class="row" style="width: 100%;">
                    <div style="text-align: left;">
                        <p style="font-size: 24px;">Tên: <small><?php echo $rowtk['taikhoan_user']; ?></small></p>
                        <p style="font-size: 24px;">Coins: <small><?php echo $rowtk['coin']; ?></small></p>
                    </div>
                    <div>
                        <p style="font-size: 24px; text-align: right;">Đổi Ảnh Đại Điện</p>
                        <input type="file" style="float: right;" name="anhmoi" id="anhmoi" placeholder="Thay Đổi Ảnh Đại Điện" style="width: 50%;">
                    </div>
                </div>
                <button class="btn" type="submit">Đăng Ảnh</button>
            </form>
            <form id="matkhauform" method="post">
                <input type="text" id="mkcu" placeholder="Mật khẩu củ">
                <input type="text" id="mkmoi" placeholder="Mật khẩu mới">
                <button class="btn" type="submit">Xác Nhận</button>
            </form>
        </div>
    </div>
    <h2 class="tieude" style="margin-top: 40px;" type="submit"> Lịch Sử Đã Mua</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Loại</th>
            <th>Tài Khoản</th>
            <th>Mật Khẩu</th>
            <th>Giá</th>
        </tr>
        <?php
        while ($rowkh = mysqli_fetch_assoc($querykh)) {
        ?>
            <tr>
                <td><?php echo $rowkh['khohang_id']; ?></td>
                <td><?php echo $rowkh['danhsach_id']; ?></td>
                <td><?php echo $rowkh['taikhoan']; ?></td>
                <td><?php echo $rowkh['matkhau']; ?></td>
                <td><?php echo $rowkh['gia']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<!--Lệnh chuyển form-->
<script>
    var thongtinform = document.getElementById("thongtinform");
    var matkhauform = document.getElementById("matkhauform");
    var danhdau = document.getElementById("danhdau");

    function matkhau() {
        thongtinform.style.transform = "translateX(0px)";
        matkhauform.style.transform = "translateX(0px)";
        danhdau.style.transform = "translateX(100px)";
    }

    function thongtin() {
        thongtinform.style.transform = "translateX(500px)";
        matkhauform.style.transform = "translateX(500px)";
        danhdau.style.transform = "translateX(0px)";
    }
</script>
<script src="JS/jQuery.js?v=<?php echo time() ?>"></script>
<script src="JS/thongtintk.js?v=<?php echo time() ?>"></script>