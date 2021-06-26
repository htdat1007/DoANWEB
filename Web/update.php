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


    <div class="container">
        <ol class="breadcrumb">
            <li><a href="trangchu.php">Trang chủ</a></li>
            <li><a href="">Loại Acc</a></li>

        </ol>
    </div>
    <div class="container">
        <div class="col-md-3">
            <div class="categories">

                <ul>
                    <h3>QUẢN LÝ</h3>
                    <li><a href="">Sản phẩm</a></li>
                    <li><a href="">Khách hàng</a></li>
                    <li><a href="">Đơn hàng</a></li>
                    <li><a href=".">Phản hồi</a></li>

                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <h3 style="text-align:center; color:blue; font-size: 2em; font-weight:bold;line-height: 50px">SỬA ACC</h3>
            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="pname" class="col-lg-3 control-label">Tên Acc <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="pname" name="pname" placeholder="Sony Xperia Z5 Dual">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-lg-3 control-label">Giá Acc <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" id="price" name="price" placeholder="7500000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="discount" class="col-lg-3 control-label">Khuyến mãi <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" id="discount" name="discount" placeholder="200000">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image" class="col-lg-3 control-label">Hình đại diện <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input id="image" type="file" accept="image/" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image1" class="col-lg-3 control-label">Hình 1 <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input id="image1" type="file" accept="image/" name="image1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image2" class="col-lg-3 control-label">Hình 2 <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input id="image2" type="file" accept="image/" name="image2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="soluong" class="col-lg-3 control-label">Số lượng <span class="require">*</span></label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" id="soluong" name="soluong" placeholder="30">
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