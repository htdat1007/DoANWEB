<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thêm dữ liệu sản phẩm vào cơ sở dữ liệu</title>

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
            <li><a href="insert.php">Thêm Acc</a></li>

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

        <div class="col-md-9">
            <h3 style="text-align:center; color:blue; font-size: 2em; font-weight:bold;line-height: 50px">THÊM ACC</h3>
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                <?php
                $khohang_id = "";
                $khohang_name = "";
                $gia = "";
                $image1 = "";
                $image2 = "";
                $image3 = "";
                $image4 = "";
                $mota = "";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if (isset($_POST["pname"])) {
                        $khohang_name = $_POST['pname'];
                    }
                    if (isset($_POST["price"])) {
                        $gia = $_POST['price'];
                    }

                    if (isset($_POST["mota"])) {
                        $mota = $_POST['mota'];
                    }
                    if (isset($_POST["date"])) {
                        $date = $_POST['date'];
                    }
                    if (isset($_POST["puser"])) {
                        $puser = $_POST['puser'];
                    }
                    if (isset($_POST["ppass"])) {
                        $ppass = $_POST['ppass'];
                    }
                    $image1 = $_FILES['image1']['name'];
                    $image2 = $_FILES['image2']['name'];
                    $image3 = $_FILES['image3']['name'];
                    $image4 = $_FILES['image4']['name'];

                    //Code xử lý, insert dữ liệu vào table
                    // $sql = "INSERT INTO khohang (`khohang_id`,`khohang_name`,`gia`,`mota`)
                    // VALUES ($khohang_id,'$khohang_name',$gia,'$mota')";

                    $sql = "INSERT INTO khohang (`khohang_name`,`gia`,`mota`,`image`,`image_2`, `image_3`, `image_4`,`Ngaycapnhat`,`taikhoan`,`matkhau`)
                            VALUES ('$khohang_name',$gia,'$mota', '$image1', '$image2', '$image3', '$image4' , '$date', '$puser', '$ppass')";


                    if (mysqli_query($connect, $sql)) {
                        echo "Thêm dữ liệu thành công";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
                    }
                }

                //Đóng database
                mysqli_close($connect);
                ?>

                <div class="form-group">
                    <label for="pname" class="col-lg-3 control-label">Tên Acc <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="pname" name="pname" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-lg-3 control-label">Giá Acc <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" id="price" name="price" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pname" class="col-lg-3 control-label">Tên User <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="puser" name="puser" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pname" class="col-lg-3 control-label"> Pass User <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="ppass" name="ppass" placeholder="">
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
                        <textarea type="text" class="form-control" id="mota" name="mota" placeholder="mô tả"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="col-lg-3 control-label">Ngày cập nhật <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <input class="btn btn-success" type="submit" name="submit" value="TẠO">
                        <a href="" class="btn btn-warning">HỦY</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


</body>

</html>