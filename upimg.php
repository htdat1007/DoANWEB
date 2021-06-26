<?php
$nameimg = basename($_FILES["anhmoi"]["name"]);

$chuyen = "Image/" . $nameimg;
move_uploaded_file($_FILES["anhmoi"]["tmp_name"], $chuyen);
