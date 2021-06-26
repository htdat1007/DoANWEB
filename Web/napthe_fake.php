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
    <div class="thongtintk-info">
        <div class="form-container-thongtintk">
            <h2 class="tieude" style="margin-top: 20px; margin-bottom: 20px;">Tài Khoản Còn: <?php echo $rowtk['coin']; ?> VNĐ</h2>
            <form id="naptheform" method="post">
                <select name="menhgia" id="menhgia" onchange="getvalue(this)">
                    <option value="0">Mệnh Giá</option>
                    <option value="1000000">1.000.000 VND</option>
                </select>
                <input type="text" id="serithe" placeholder="SERI" value="">
                <input type="text" id="mathe" placeholder="MÃ THẺ" value="">
                <button class="btn" type="submit">Xác Nhận</button>
            </form>
        </div>
    </div>
</div>
<script src="JS/jQuery.js?v=<?php echo time() ?>"></script>
<script src="JS/napthe_fake.js?v=<?php echo time() ?>"></script>