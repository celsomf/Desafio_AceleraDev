function loadData() {
    $.ajax({
        url: 'https://api.codenation.dev/v1/challenge/dev-ps/generate-data?token=f4c68db5786674b1fc8b08de654d05e695be5cba',
        dataType: "json",
        success: function (msg) {
            console.log(msg)
            $("#rsData").val(JSON.stringify(msg));
        }
    })

}


function saveFile() {
    var form = $('#form')[0];
    var fd = new FormData(form);
    fd.append('action', 'save');

    $.ajax({
        url: 'actions.php',
        type: "POST",
        data: fd,
        contentType: false,
        cache: false,
        processData: false,
        success: function (msg) {
            var rs = msg.split("|");
            $("#rs").html(rs[0]);
            $("#rsDataconvert").val(rs[1])
        }
    });
}

function sendFile() {
    var form = $('#form')[0];
    var fd = new FormData(form);

    $.ajax({
        url: 'https://api.codenation.dev/v1/challenge/dev-ps/submit-solution?token=f4c68db5786674b1fc8b08de654d05e695be5cba',
        type: "POST",
        data: fd,
        contentType: false,
        cache: false,
        processData: false,
        success: function (msg) {
            var rs = JSON.parse(msg);
            $("#rs").html(rs.message);
        }
    });
}