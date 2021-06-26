<?php
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genshin Shop Acc</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'trangchu':
                require_once 'Web/trangchu.php';
                break;
            case 'khohang':
                require_once 'Web/khohang.php';
                break;
            case 'chitiet':
                require_once 'Web/chitiet.php';
                break;
            case 'thongtintk':
                require_once 'Web/thongtintk.php';
                break;
            case 'napthe':
                require_once 'Web/napthe_fake.php';
                break;
            case 'taikhoanconfig_thoat':
                require_once 'Web/taikhoanconfig_thoat.php';
                break;
            default:
                require_once 'Web/trangchu.php';
                break;
        }
    } else {
        require_once 'Web/trangchu.php';
    }
    ?>
</body>
<script src="JS/jQuery.js?v=<?php echo time() ?>"></script>

</html>