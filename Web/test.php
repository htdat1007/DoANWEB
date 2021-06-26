<?php
include '../config/db.php';
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "select khohang_id, khohang_name FROM khohang";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    // output dữ liệu trên trang
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["khohang_id"] . " - Name: " . $row["khohang_name"] .  "<br>";
    }
} else {
    echo "0 results";
}
$connect->close();
