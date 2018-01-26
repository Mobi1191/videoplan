var uploaded_logo_image_name = "";
    $("#upload-logo-btn").click(function () {
        $("#logoimagefile").click();
    });

    $("#logoimagefile").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (ev) {
                $("#logo-preview-image").attr('src', ev.target.result);
                $("#uploadlogoform").submit();;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    $("#uploadlogoform").on('submit', function (e) {
        e.preventDefault();
        showLoading("<h3>Uploading Logo Image</h3>");
        $.ajax({
            url: BASE_URL + 'ajax/ajax_logo_upload.php',
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,       // To send DOMDocument or non processed data file it is set to false,
            dataType: 'json',
            success: function (data) {
                hideLoading();
                if(data.success == 1) {
                    $("#uploadlogomessage").html("" +
                        " <div class=\"alert alert-success alert-dismissable fade in\">\n" +
                        "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                        "    <strong>Success!</strong> "+ data.msg +"\n" +
                        "  </div>" +

                        "");
                    uploaded_logo_image_name = data.name;

                } else if(data.success == 0){
                    $("#uploadlogomessage").html("" +
                        "<div class=\"alert alert-danger alert-dismissable fade in\">\n" +
                        "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                        "    <strong>Danger!</strong> "+data.msg+"\n" +
                        "  </div>" +
                        "");
                }

            }
        });
    });

    $("#submitprofile").click(function () {
        //e.preventDefault();

        if(uploaded_logo_image_name == "") {
            alert("Please Upload Logo Image!!!");
            return;
        }

        var pwd = $("#user_pwd").val();
        var re_pwd = $("#re_pwd").val();
        if(pwd != re_pwd) {
            alert('Not matched Password');
            return;
        }

        var name_or_business = $("#name_or_business").val();
        var cell_number = $("#cell_number").val();
        var user_email = $("#user_email").val();
        var user_name = $("#user_name").val();
        var postdata = {
            name_or_business: name_or_business,
            cell_number: cell_number,
            user_email: user_email,
            user_name: user_name,
            user_pwd: pwd,
            logo_image: uploaded_logo_image_name
        };

        showLoading("<h3>Saving Profile</h3>");
        $.ajax({
            url: BASE_URL + 'ajax/save-profile.php',
            type: 'POST',
            data: postdata,
            dataType: 'json',
        }).done(function (data) {
            hideLoading();
            if (data.success == "0") {
                $("#saveprofilemessage").html("" +
                    "<div class=\"alert alert-danger alert-dismissable fade in\">\n" +
                    "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                    "    <strong>Danger!</strong> "+ data.msg +"\n" +
                    "  </div>" +
                    "");
            } else if(data.success == "1") {
                $("#saveprofilemessage").html("" +
                    "<div class=\"alert alert-success alert-dismissable fade in\">\n" +
                    "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                    "    <strong>Success!</strong> " + data.msg + "\n" +
                    "  </div>" +
                    "");
            }
        }).fail(function () {
            hideLoading();
            $("#saveprofilemessage").html("" +
                "<div class=\"alert alert-danger alert-dismissable fade in\">\n" +
                "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                "    <strong>Danger!</strong> Request Error.\n" +
                "  </div>" +
                "");
        });
    })


    $("#send_direct_message_txt").click(function(){
        var dir_msg = $("#direct_message_txt").val();
        if(dir_msg == "") {
            alert("Please Input message");
            return;
        }

        showLoading("<h3>Sending Message...</h3>");

        $.ajax({
            url: BASE_URL + 'ajax/mail.php',
            type: 'POST',
            data: {
                subject: 'Direct message from profile',
                body: dir_msg
            },
            dataType: 'json'
        }).done(function(data){
            hideLoading();
            if (data.success == "0") {
                $("#send_dir_message_result").html("" +
                    "<div class=\"alert alert-danger alert-dismissable fade in\">\n" +
                    "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                    "    <strong>Danger!</strong> "+ data.msg +"\n" +
                    "  </div>" +
                    "");
            } else if(data.success == "1") {
                $("#send_dir_message_result").html("" +
                    "<div class=\"alert alert-success alert-dismissable fade in\">\n" +
                    "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                    "    <strong>Success!</strong> " + data.msg + "\n" +
                    "  </div>" +
                    "");
            }
        }).fail(function () {
            hideLoading();
            $("#send_dir_message_result").html("" +
                "<div class=\"alert alert-danger alert-dismissable fade in\">\n" +
                "    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                "    <strong>Danger!</strong> Request Error.\n" +
                "  </div>" +
                "");
        });
    });