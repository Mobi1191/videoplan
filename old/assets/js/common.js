function showLoading(msg) {
    $("#loading-part").show();
    $("#loading-part #loading-message").html(msg);
}

function hideLoading() {
    $("#loading-part").hide();
}