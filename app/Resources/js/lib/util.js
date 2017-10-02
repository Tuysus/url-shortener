function hasError(data) {
    if (data.errorCode != "OK") {
        alert(data.message);
        return true;
    }

    return false;
}