
$(document).ready(function () {

    $("#generate-button").click(function () {

        $.postJSON('generate_url', {url: $("#urlInput").val()}, function (data) {
            if (data) {
                alert (data);
                return false;
            }
        });

    });
});