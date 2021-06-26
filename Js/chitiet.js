let giasp = document.querySelector('.giasp').textContent;
let coin = document.querySelector('.btn-coin').textContent;
let khohangid = parseInt(document.querySelector('.khohang-id').textContent);
let khohangtaikhoanid = parseInt(document.querySelector('.khohang-taikhoanid').textContent);
let btn = document.querySelector('.btn');

btn.onclick = function () {
    //console.log(giasp + " " + coin);
    if (parseInt(coin) >= parseInt(giasp)) {
        let newcoin = parseInt(coin) - parseInt(giasp);
        $.ajax({
            type: "POST",
            data: {
                Ncoin: newcoin,
                Idkhohang: khohangid,
            },
            url: "Web/xuly_chitiet.php",
            success: (data) => {
                if (data == "muathanhcong") {
                    alert('Mua thành công kiểm tra lịch sử');
                    window.location.href = "index.php?page_layout=trangchu";
                } else {
                    alert('Bạn đã trễ rồi, tài khoản đã được mua');
                    window.location.href = "index.php?page_layout=trangchu";
                }
            },
        });
    } else {
        alert('Không đủ tiền yêu cầu nạp thêm');
    }
    window.location.reload();
}