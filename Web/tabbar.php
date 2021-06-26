<?php
session_start();
error_reporting(0);
$tk = "";

if (isset($_SESSION["global"])) {
    $tk = $_SESSION["global"];
    $taikhoan = "SELECT * FROM taikhoan WHERE taikhoan_user = '$tk'";
    $querytk = mysqli_query($connect, $taikhoan);
    $rowtk = mysqli_fetch_assoc($querytk);
}
?>

<div class="headerbar">
    <div class="logo">
        <a href="index.php?page_layout=trangchu"><img src="Image/logo.jpg" width="125px" height="80px"></a>
    </div>
    <nav>
        <ul id="menulist">
            <li>
                <a href="index.php?page_layout=trangchu">Trang Chủ</a>
            </li>
            <li>
                <a href="index.php?page_layout=napthe">Nạp Thẻ</a>
            </li>
            <li>
                <?php if ($tk != "") {
                    echo '<div class="user user-act">
                            ' . $tk . '
                            &nbsp;
                            <img src="Image/' . $rowtk['taikhoan_img'] . '" width="30px" height="30px">
                            <div class="user-content">
                                <a>' . $rowtk['coin'] . ' VNĐ</a>
                                <a href="index.php?page_layout=thongtintk">Thông tin tài khoản</a>
                                <a href="index.php?page_layout=taikhoanconfig_thoat">Thoát</a>
                        </div>
                        </div>';
                }
                ?>
            </li>
        </ul>
    </nav>
    <div class="menu-user-icon">
        <?php
        if ($tk != "") {
            echo '<div class="user-act">
                        <img src="Image/' . $rowtk['taikhoan_img'] . '" width="30px" height="30px">
                        <div class="user-content">
                            <a>' . $tk . '</a>
                            <a>' . $rowtk['coin'] . ' VNĐ</a>
                            <a href="index.php?page_layout=thongtintk">Thông tin tài khoản</a>
                            <a href="index.php?page_layout=taikhoanconfig_thoat">Thoát</a>
                        </div>
                    </div>';
        } else {
            echo '<a href="index.php?page_layout=taikhoan"><img src="Image/user.jpg" width="30px" height="30px"></a>';
        }
        ?>
    </div>
    <img src="Image/menu.jpg" class="menu-icon" onclick="butmenu()">
</div>
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