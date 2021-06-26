<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sua Acc</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link href="../css/heroic-features.css" rel="stylesheet">
    <link href="../css/register.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    <style type="text/css">
        table,
        tr,
        td {
            border: 1px solid gray;
            border-collapse: collapse;
            text-align: center;
        }

        .tieude {
            border: 1px solid gray;
            text-align: center;
            width: 5%;
        }
    </style>
</head>

<body>
    <?php include '../config/db.php'; ?>

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="admin.php">Admin</a></li>
            <li><a href="">Sửa Acc</a></li>

        </ol>
    </div>
    <div class="container">
        <div class="col-md-3">
            <div class="categories">

                <ul>
                    <h3>QUẢN LÝ</h3>
                    <li><a href="">Acc</a></li>

                    <li><a href="">Phản hồi</a></li>

                </ul>
            </div>
        </div>

        <?php
        $connect->set_charset("utf8");
        $a = (int)$_GET['productid'];
        $sql0 = "SELECT * FROM `khohang` WHERE khohang_id = $a";
        $query0 = mysqli_query($connect, $sql0);
        if (mysqli_num_rows($query0) > 0) {
            while ($row = mysqli_fetch_assoc($query0)) {
        ?>

                <div class="col-md-9">
                    <h3 style="text-align:center; color:blue; font-size: 2em; font-weight:bold;line-height: 50px">CHỈNH SỬA ACC</h3>
                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="pname" class="col-lg-3 control-label">Tên Acc <span class="require">*</span></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="pname" name="pname" placeholder="" value="<?php echo $row['khohang_name'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-lg-3 control-label">Giá Acc <span class="require">*</span></label>
                            <div class="col-lg-8">
                                <input type="number" class="form-control" id="price" name="price" placeholder="" value="<?php echo $row['gia'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-lg-3 control-label">Hình đại diện <span class="require">*</span></label>
                            <div class="col-lg-8">
                                <input id="image" type="file" accept="image/" name="image1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image1" class="col-lg-3 control-label">Hình 2 <span class="require">*</span></label>
                            <div class="col-lg-8">
                                <input id="image1" type="file" accept="image/" name="image2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image2" class="col-lg-3 control-label">Hình 3 <span class="require">*</span></label>
                            <div class="col-lg-8">
                                <input id="image2" type="file" accept="image/" name="image3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image3" class="col-lg-3 control-label">Hình 4 <span class="require">*</span></label>
                            <div class="col-lg-8">
                                <input id="image3" type="file" accept="image/" name="image4">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mota" class="col-lg-3 control-label">Mô tả <span class="require">*</span></label>
                            <div class="col-lg-8">
                                <textarea type="text" class="form-control" id="mota" name="mota" placeholder="mô tả"><?php echo $row['mota'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-lg-3 control-label">Ngày cập nhật <span class="require">*</span></label>
                            <div class="col-lg-8">
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                        </div>
                <?php }
        } ?>
                <div class="form-group">
                    <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <input class="btn btn-success" type="submit" name="submit" value="SỬA">
                        <a href="" class="btn btn-warning">HỦY</a>
                    </div>
                </div>
                    </form>
                </div>


    </div>
</body>

</html>

<?php

// echo "hello";
// $id = (int)$_GET['productid'];
// echo $id;
// die;
if (isset($_POST['submit'])) {
    $id = (int)$_GET['productid'];
    // echo $id;
    // die;
    $khohang_name = "";
    $gia = "";
    $image1 = "";
    $image2 = "";
    $image3 = "";
    $image4 = "";
    $mota = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST["pname"])) {
            $khohang_name = $_POST['pname'];
            $sql1 = "update khohang set `khohang_name`='{$khohang_name}' where khohang_id = $id";
            $query1 = mysqli_query($connect, $sql1);
        }
        if (!empty($_POST["price"])) {
            $gia = $_POST['price'];
            $sql2 = "update khohang set `gia`='{$gia}' where khohang_id = $id";
            $query2 = mysqli_query($connect, $sql2);
        }

        if (!empty($_POST["mota"])) {
            $mota = $_POST['mota'];
            $sql3 = "update khohang set `mota`='{$khohang_name}' where khohang_id = $id";
            $query3 = mysqli_query($connect, $sql3);
        }
        if (!empty($_POST["date"])) {
            $date = $_POST['date'];
            $sql4 = "update khohang set `Ngaycapnhat`='{$date}' where khohang_id = $id";
            $query4 = mysqli_query($connect, $sql4);
        }
        if (!empty($_POST["puser"])) {
            $puser = $_POST['puser'];
            $sql5 = "update khohang set `taikhoan`='{$puser}' where khohang_id = $id";
            $query5 = mysqli_query($connect, $sql5);
        }
        if (!empty($_POST["ppass"])) {
            $ppass = $_POST['ppass'];
            $sql6 = "update khohang set `matkhau`='{$ppass}' where khohang_id = $id";
            $query6 = mysqli_query($connect, $sql6);
        }


        if (!empty($_FILES['image1']['name'])) {
            $image1 = $_FILES['image1']['name'];
            $sql7 = "update khohang set `image`='{$image1}' where khohang_id = $id";
            $query7 = mysqli_query($connect, $sql7);
        }

        if (!empty($_FILES['image2']['name'])) {
            $image1 = $_FILES['image2']['name'];
            $sql8 = "update khohang set `image_2`='{$image2}' where khohang_id = $id";
            $query8 = mysqli_query($connect, $sql8);
        }
        if (!empty($_FILES['image1']['name'])) {
            $image3 = $_FILES['image3']['name'];
            $sql9 = "update khohang set `image_3`='{$image3}' where khohang_id = $id";
            $query9 = mysqli_query($connect, $sql9);
        }
        if (!empty($_FILES['image4']['name'])) {
            $image4 = $_FILES['image4']['name'];
            $sql10 = "update khohang set `image_4`='{$image4}' where khohang_id = $id";
            $query10 = mysqli_query($connect, $sql10);
        }
    }

    //Đóng database
    mysqli_close($connect);
}
?>