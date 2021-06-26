var naptheform = document.getElementById('naptheform');

function getvalue(selectObject) {
    let menhgia = selectObject.value;

    naptheform.addEventListener("submit", e => {
        e.preventDefault();

        var serithe = document.getElementById('serithe').value;
        var mathe = document.getElementById('mathe').value;

        /*console.log(menhgia);
        console.log(serithe);
        console.log(mathe);*/

        $.ajax({
            type: "post",
            data: {
                mgia: menhgia,
                seri: serithe,
                mthe: mathe,
            },
            url: "Web/xuly_napthe.php",
            success: (data) => {
                alert(data);
                window.location.reload();
            }
        });
    });
};