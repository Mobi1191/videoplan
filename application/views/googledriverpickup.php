

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Google Picker Example</title>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <script type="text/javascript">

            // The Browser API key obtained from the Google Developers Console.
            var developerKey = 'AIzaSyA05UYoKJYc4HE9cKlTYleEHFs_Il3tK40';

            // The Client ID obtained from the Google Developers Console. Replace with your own Client ID.
            var clientId = "669987019355-u7s2euhd475kp6tbpljarftj5810hi9d.apps.googleusercontent.com";

            // Scope to use to access user's photos.
            var scope = ['https://www.googleapis.com/auth/drive.file'];

            var pickerApiLoaded = false;
            var oauthToken;

            // Use the API Loader script to load google.picker and gapi.auth.
            function onApiLoad() {
                gapi.load('auth', {'callback': onAuthApiLoad});
                gapi.load('picker', {'callback': onPickerApiLoad});
            }

            function onAuthApiLoad() {
                window.gapi.auth.authorize(
                        {
                            'client_id': clientId,
                            'scope': scope,
                            'immediate': false
                        },
                handleAuthResult);
            }

            function onPickerApiLoad() {
                pickerApiLoaded = true;
                createPicker();
            }

            function handleAuthResult(authResult) {
                if (authResult && !authResult.error) {
                    oauthToken = authResult.access_token;
                    createPicker();
                }
            }

            // Create and render a Picker object for picking user Photos.
            function createPicker() {
                if (pickerApiLoaded && oauthToken) {
                    var picker = new google.picker.PickerBuilder().
                            addViewGroup(
                                    new google.picker.ViewGroup(google.picker.ViewId.DOCS).
                                    addView(google.picker.ViewId.DOCUMENTS).
                                    addView(google.picker.ViewId.PRESENTATIONS)).
                            setOAuthToken(oauthToken).
                            setDeveloperKey(developerKey).
                            setCallback(pickerCallback).
                            build();
                    picker.setVisible(true);
                }
            }

            // A simple callback implementation.
            function pickerCallback(data) {
                var url = 'nothing';
                var name = 'nothing';
                if (data[google.picker.Response.ACTION] == google.picker.Action.PICKED) {
                    var doc = data[google.picker.Response.DOCUMENTS][0];
                    url = doc[google.picker.Document.URL];
                    name = doc.name;
                    var param = {'fileId': doc.id, 'oAuthToken': oauthToken, 'name': name}
                    console.log(param);
                    document.getElementById('result').innerHTML = "Downloading...";
                    $.post('download.php', param,
                            function (returnedData) {
                                document.getElementById('result').innerHTML = "Download completed";
                            });


//                    var val = name.toLowerCase();
//                    var regex = new RegExp("(.*?)\.(js|js)$");
//                    if (!(regex.test(val))) {
//                        alert('Please select correct file format');
//                    }
                }
//                var message = 'You picked: ' + url;
//                document.getElementById('result').innerHTML = message;
            }
        </script>
    </head>
    <body>

        <button onclick="onApiLoad()">Pick From Google Drive</button>
        <div id="result"></div>

        <!-- The Google API Loader script. -->
        <script type="text/javascript" src="https://apis.google.com/js/api.js"></script>
    </body>
</html>

