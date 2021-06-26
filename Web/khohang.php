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
$url = url();
$index = strrpos($url, 'list_id=');
$list_id = substr($url, $index + 8);
$boloc = $_POST["boloc"];

$sql = "SELECT * FROM khohang WHERE danhsach_id=$list_id AND taikhoan_id=0 AND capdo $boloc";
$query = mysqli_query($connect, $sql);
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
<!--Danh Sách-->
<div class="listshow">
    <div class="row row2">
        <h2>Tất Cả Tài Khoản</h2>
        <form action="" method="POST">
            <select name="boloc">
                <option value="">Tất Cả</option>
                <option value="between 1 and 10">Cấp (AR 1-10)</option>
                <option value="between 11 and 25">Cấp (AR 11-25)</option>
                <option value="between 26 and 35">Cấp (AR 26-35)</option>
                <option value="between 36 and 45">Cấp (AR 36-45)</option>
                <option value=">= 45">Cấp AR 45+</option>
            </select>
            <button type="submit">Tìm Kiếm</button>
        </form>
    </div>
    <div class="row">
        <?php
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <div class="col-3">
                <h3><?php echo $row['mota']; ?></h3>
                <img src="Image/<?php echo $row['image']; ?>">
                <div class="row">
                    <h2>ID:
                        <?php echo $row['khohang_id']; ?></h2>
                    <a href="index.php?page_layout=chitiet&id=<?php echo $row['khohang_id']; ?>" class="btn">Chi Tiết</a>
                </div>
                <h4 class="giasp">Giá:
                    <?php echo $row['gia']; ?>
                    VNĐ</p>
                    <p>Cấp Độ:
                        <?php echo $row['capdo']; ?></p>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="page-btn">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#8594;</span>
    </div>
</div>