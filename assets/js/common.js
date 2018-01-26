function showLoading(msg) {
    $("#loading-part").show();
    $("#loading-part #loading-message").html(msg);
}

function hideLoading() {
    $("#loading-part").hide();
}

$(".to-plan-indicator").click(function(){
	$(".nav li a[href='#plan-tab']").click();
});