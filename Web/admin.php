<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

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

  <?php include '../config/db.php';
  ?>
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="admin.php">Admin</a></li>
      <li><a href="">Danh sách</a></li>
    </ol>
  </div>
  <div class="container">
    <div class="col-md-3">
      <div class="categories">
        <ul>
          <h3>QUẢN LÝ</h3>
          <li><a href="../index.php">ACC</a></li>
          <li><a href="">Phản hồi</a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <h3 style="text-align:center;font-weight:bold;color:orange">CHI TIẾT SẢN PHẨM</h3>
      <a href="insert.php" float:right;background::#94CB32;" class="btn btn-success">Thêm sản phẩm mới</a>
      <br>
      <br>
      <table class="table table-bordered">
        <tr>
          <th class="active" style="text-align:center">ID</th>
          <th class="active" style="text-align:center">Tên Acc</th>
          <th class="active" style="text-align:center">Giá</th>
          <th class="active" style="text-align:center">Ngày cập nhật</th>
          <th class="active" style="text-align:center">action</th>
          <?php
          $sql = "SELECT khohang_id, khohang_name, gia, Ngaycapnhat FROM khohang";
          $result = $connect->query($sql);
          if ($result->num_rows > 0) {
            // output dữ liệu trên trang
            while ($row = $result->fetch_assoc()) {
          ?>
        <tr>
          <td>
            <?php echo $row["khohang_id"]; ?>
          </td>
          <td>
            <?php echo $row["khohang_name"]; ?>
          </td>
          <td>
            <?php echo $row["gia"]; ?>
          </td>
          <td>
            <?php echo $row["Ngaycapnhat"]; ?>
          </td>
          <td>

            <?php
              echo '<a href="update.php?productid=' . $row['khohang_id'] . '">';
              echo "<span class='glyphicon glyphicon-pencil'></span></a>";
              echo "<button name='delete"  . $row['khohang_id'] . "' onclick='myFunction(" . $row['khohang_id'] . ");' style='border:none;background-color:#ffffff'><span class='glyphicon glyphicon-trash'></span></button>";
            ?>
            <!-- <button type="button" name="Sua" class="btn btn-info">Sửa</button>
            <button href="" type="button" name="Xoa" class="btn btn-danger">Xóa</button> -->
          </td>
        </tr>

    <?php
            }
          } else {
            echo "0 results";
          }
          $connect->close()

    ?>

    </tr>
      </table>
    </div>
  </div>

  <script type="text/javascript">
    function myFunction(id) {
      if (confirm("Bạn chắc chắn muốn xóa account này?") == true) {
        window.location = "delete.php?khohang_id=" + id
      }
    }
  </script>
</body>

</html>