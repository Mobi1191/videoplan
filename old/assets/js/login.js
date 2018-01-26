$("#login_btn").click(function(){
	var user_email = $("#login_user").val();
	var user_pwd = $("#login_pwd").val();

	// if(user_email == "" || user_pwd == "") {
	// 	alert("Input all data!");
	// 	return;
	// }

	showLoading("<h3>Logging...</h3>");
	$.ajax({
            url: BASE_URL + 'ajax/login.php',
            type: 'POST',
            data: {
            	user_email: user_email,
            	user_pwd: user_pwd
            },
            dataType: 'json',
        }).done(function (data) {
            hideLoading();
            if (data.success == "0") {
                $("#loginresultmessage").html("" +
                    "<div class=\"alert alert-danger alert-dismissable fade in\">\n" +
                    "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                    "    <strong>Danger!</strong> "+ data.msg +"\n" +
                    "  </div>" +
                    "");
            } else if(data.success == "1") {
                $("#loginresultmessage").html("" +
                    "<div class=\"alert alert-success alert-dismissable fade in\">\n" +
                    "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                    "    <strong>Success!</strong> " + data.msg + "\n" +
                    "  </div>" +
                    "");
                setTimeout(function(){ 
                	window.location = BASE_URL;
                }, 1000);
            }
        }).fail(function () {
            hideLoading();
            $("#loginresultmessage").html("" +
                "<div class=\"alert alert-danger alert-dismissable fade in\">\n" +
                "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                "    <strong>Danger!</strong> Request Error.\n" +
                "  </div>" +
                "");
        });
});