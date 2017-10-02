
$(document).ready(function () {

    $("#generate-button").click(function () {

        $.postJSON('generate_url', {url: $("#url-input").val()}, function (data) {
            if (data && !hasError(data)) {
                showShortUrl(data.value);
                return false;
            } else {
                clearShortUrl();
            }
        });
    });

    $("#save-button").click(function () {
        $.postJSON('short_url', {url: $("#url-input").val(), shortUrl: $("#url_short-input").val()}, function (data) {
            if (data && !hasError(data)) {
                showFinalUrl(data.value);
                return false;
            }
        });
    });

    var clipboard = new Clipboard("#clipboard");
});


function showShortUrl(shortUrl) {
    $("#url_short-form").show();

    $("#url_short-edit").show();
    $("#url_short-show").hide();

    $("#url_short-input").val(shortUrl);
};

function clearShortUrl() {
    $("#url_short-form").hide();
    $("#url_short-input").val("");
};

function showFinalUrl(shortUrl) {
    $("#url_short-edit").hide();
    $("#url_short-show").show();

    $("#url_short-input-show").val("http://url_shortener.local/" + shortUrl)
}