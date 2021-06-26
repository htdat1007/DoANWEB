var anhmoi = document.getElementById('anhmoi');
var thongtinform = document.getElementById('thongtinform');

thongtinform.addEventListener("submit", e => {
    e.preventDefault();

    var chuyen = "upimg.php";
    var formdata = new FormData();
    var imgname = anhmoi.files[0].name;

    formdata.append("anhmoi", anhmoi.files[0]);
    fetch(chuyen, {
        method: "post",
        body: formdata,
    }).catch(console.error);

    $.ajax({
        type: "post",
        data: {
            newimg: imgname,
        },
        url: "Web/xuly_thongtintkanh.php",
        success: (data) => {
            alert(data);
            window.location.reload();
        }
    });
});

var matkhauform = document.getElementById('matkhauform');
matkhauform.addEventListener("submit", e => {
    e.preventDefault();

    var mkcu = document.getElementById('mkcu').value;
    var mkmoi = document.getElementById('mkmoi').value;


    $.ajax({
        type: "post",
        data: {
            matkhauc: mkcu,
            matkhaum: mkmoi,
        },
        url: "Web/xuly_thongtintkmatkhau.php",
        success: (data) => {
            alert(data);
            window.location.reload();
        }
    });
});