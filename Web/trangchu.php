<?php
require 'taikhoanconfig.php';

session_start();
error_reporting(0);

$dsHot = "SELECT * FROM danhsachhang WHERE muanhieu = 'true'";
$ds = "SELECT * FROM danhsachhang WHERE muanhieu = ''";
$querydsHot = mysqli_query($connect, $dsHot);
$queryds = mysqli_query($connect, $ds);
$tk = $_SESSION["global"];
$taikhoan = "SELECT * FROM taikhoan WHERE taikhoan_user = '$tk'";
$querytk = mysqli_query($connect, $taikhoan);
$rowtk = mysqli_fetch_assoc($querytk);

if (isset($tksaidn["loitk"])) {
    echo $tksaidn["loitk"];
}
if (isset($tksaidk["loitk"])) {
    echo $tksaidk["loitk"];
}
?>
<div class="header2">
    <div class="headerbar">
        <div class="logo">
            <a href="index.php?page_layout=trangchu"><img src="Image/logo.jpg" width="125px" height="80px"></a>
        </div>
        <nav>
            <ul id="menulist" class="ul-trangchu">
                <?php if ($tk != "") {
                    echo '
                    <li class="menu-user-icon"><a>' . $tk . '</a></li>
                    <li class="menu-user-icon"><a href="index.php?page_layout=taikhoanconfig_thoat">Thoát</a></li>
                    <li class="menu-user-icon">&nbsp</li>
                    ';
                } else {
                    echo '
                    <li><a href="index.php?page_layout=trangchu">Trang Chủ</a></li>
                    ';
                }
                ?>
                <li>
                    <a href="index.php?page_layout=napthe">Nạp Thẻ</a>
                </li>
                <?php if ($tk != "") {
                    echo '
                    <li>
                        <div class="user user-act">
                            <img src="Image/' . $rowtk['taikhoan_img'] . '" width="30px" height="30px">
                            <div class="user-content">
                                <a href="index.php?page_layout=thongtintk">' . $tk . '</a>
                                <a href="index.php?page_layout=taikhoanconfig_thoat">Thoát</a>
                            </div>
                        </div>
                    </li>
                    ';
                }
                ?>
            </ul>
        </nav>
        <img src="Image/menu.jpg" class="menu-icon" onclick="butmenu()">
    </div>
    <div class="container">
        <?php
        if ($tk != "") {
        } else {
            echo '
            <div class="row">
                <div class="col-2">
                    <h1 style="color: #fff;">Tìm Kiếm Những Tài<br>Khoản Ưng Ý!</h1>
                    <p style="color: #fff;">Hãy ghé thăm shop của chúng tôi. Sẽ có những tài khoản bạn thích.</br></p>
                </div>
                <div class="col-2" style="padding-top: 30px;">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="dangnhap()">Đăng Nhập</span>
                            <span onclick="dangky()">Đăng Ký</span>
                            <hr id="danhdau">
                        </div>
                        <form id="dangnhapform" method="post">
                            <input type="text" placeholder="Tên Tài Khoản" name="user" value="' . $tk . '">
                            <input type="password" placeholder="Mật Khẩu" name="pass" value="' . $mk . '">
                            <button type="submit" class="btn" name="btn-dangnhap">
                                Đăng Nhập
                            </button>
                        </form>
                        <form id="dangkyform" method="post">
                            <input type="text" placeholder="Nhập Tên Tài Khoản" name="user" value="' . $tk . '">
                            <input type="password" placeholder="Nhập Mật Khẩu" name="pass" value="' . $mk . '">
                            <button type="submit" class="btn" name="btn-dangky">
                                Đăng Ký
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            ';
        }
        ?>
    </div>
</div>

<!--Tài khoản mua nhiều-->
<div class="listshow">
    <h2 class="tieude"> Tài Khoản Mua Nhiều</h2>
    <div class="row">
        <?php
        while ($rowdsHot = mysqli_fetch_assoc($querydsHot)) {
        ?>
            <div class="col-3">
                <img src="Image/<?php echo $rowdsHot['image']; ?>">
                <h4>Tài Khoản <?php echo $rowdsHot['danhsach_name']; ?></h4>
                <div class="xephang">
                    <img src="Image/star.jpg">
                    <img src="Image/star.jpg">
                    <img src="Image/star.jpg">
                    <img src="Image/star.jpg">
                    <img src="Image/star.jpg">
                </div>
                <?php
                if ($tk != "") {
                    echo '<a href="index.php?page_layout=khohang&list_id=' . $rowdsHot['danhsach_id'] . '" class="btn">Xem Ngay &#8594</a>';
                } else {
                    echo '<a href="index.php?page_layout=taikhoan" class="btn">Xem Ngay &#8594</a>';
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!--Tài khoản-->
<div class="listshow">
    <h2 class="tieude"> Tài Khoản</h2>
    <div class="row">
        <?php
        while ($rowds = mysqli_fetch_assoc($queryds)) {
        ?>
            <div class="col-3">
                <img src="Image/<?php echo $rowds['image']; ?>">
                <h4>Tài Khoản <?php echo $rowds['danhsach_name']; ?></h4>
                <div class="xephang">
                    <img src="Image/star.jpg">
                    <img src="Image/star.jpg">
                    <img src="Image/star.jpg">
                    <img src="Image/star.jpg">
                    <img src="Image/star-half.jpg">
                </div>
                <?php
                if ($tk != "") {
                    echo '<a href="index.php?page_layout=khohang&list_id=' . $rowds['danhsach_id'] . '" class="btn">Xem Ngay &#8594</a>';
                } else {
                    echo '<a href="index.php?page_layout=taikhoan" class="btn">Xem Ngay &#8594</a>';
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!--Khác-->
<div class="offer">
    <div class="listshow">
        <div class="row">
            <div class="col-2">
                <img src="Image/Item_Intertwined_Fate.jpg" class="offer-img">
            </div>
            <div class="col-2">
                <p>Món Hàng Đặt Biệt Của Shop</p>
                <h1>Tài Khoản Reroll</h1>
                <small>Tài khoản có nhiều lần quay có thể tự quay nhân vật yêu thích của bạn.
                    Tài khoản có số lượng giới hạn trong tháng.<br></small>
                <h2>80.000 VNĐ<br></h2>
                <?php
                if ($tk != "") {
                    echo '<a href="index.php?page_layout=khohang&list_id=14" class="btn">Mua Ngay &#8594;</a>';
                } else {
                    echo '<a href="index.php?page_layout=taikhoan" class="btn">Xem Ngay &#8594</a>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!--Lệnh chuyển form-->
<script>
    var dangnhapform = document.getElementById("dangnhapform");
    var dangkyform = document.getElementById("dangkyform");
    var danhdau = document.getElementById("danhdau");

    function dangky() {
        dangkyform.style.transform = "translateX(0px)";
        dangnhapform.style.transform = "translateX(0px)";
        danhdau.style.transform = "translateX(100px)";
    }

    function dangnhap() {
        dangkyform.style.transform = "translateX(300px)";
        dangnhapform.style.transform = "translateX(300px)";
        danhdau.style.transform = "translateX(0px)";
    }
</script>
<!--Lệnh menu cho thiết bị di động-->
<script>
    var menulist = document.getElementById("menulist");
    menulist.style.maxHeight = "0px";

    function butmenu() {
        if (menulist.style.maxHeight == "0px") {
            menulist.style.maxHeight = "200px";
        } else {
            menulist.style.maxHeight = "0px";
        }
    }
</script>