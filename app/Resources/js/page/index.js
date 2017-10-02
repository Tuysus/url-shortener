
$(document).ready(function () {

    $("#generate-button").click(function () {

        $.postJSON('generate_url', {url: $("#url-input").val()}, function (data) {
            if (data && !hasError(data)) {
                showShortUrl(data.value);

                return false;
            } else {
                clearShortUrl()
            }
        });
    });

    $("#save-button").click(function () {
        $.postJSON('short_url', {url: $("#url-input").val(), shortUrl: $("#url_short-input").val()}, function (data) {
            if (data && !hasError(data)) {
                // showShortUrl(data.value);

                return false;
            }
        });
    });
});


function showShortUrl(shortUrl) {
    $("#url_short-form").show();
    $("#url_short-input").val(shortUrl);
};

function clearShortUrl() {
    $("#url_short-form").hide();
    $("#url_short-input").val("");
};