<?php
session_start();
unset($_SESSION['global']);
header("location:index.php?page_layout=trangchu");
