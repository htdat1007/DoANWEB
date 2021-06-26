<?php
include '../config/db.php';

$connect->set_charset("utf8");
$a = (int)$_GET['khohang_id'];

$sql = "SELECT * FROM `khohang` WHERE khohang_id = $a";

$query = mysqli_query($connect, $sql);

if ($query) {

  $sql2 = "DELETE FROM `khohang` WHERE khohang_id = $a";
  $query2 = mysqli_query($connect, $sql2);

  if (!$query) {
    echo "<script>alert('" . mysqli_error($connect) . "')</script>";
  } else {
    echo "<script>alert('xóa sản phẩm thành công.')</script>";
    echo "<script>window.location='admin.php'</script>";
  }
} else
  echo "<script>alert('" . mysqli_error($connect) . "')</script>";
