<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$register->name}}</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.2/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.2/css/react-select.css" />
</head>
<body>

<!-- import ZoomMtg dependencies -->
<script src="https://source.zoom.us/1.7.2/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/1.7.2/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/1.7.2/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/1.7.2/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/1.7.2/lib/vendor/jquery.min.js"></script>
<script src="https://source.zoom.us/1.7.2/lib/vendor/lodash.min.js"></script>

<!-- import ZoomMtg -->
<script src="https://source.zoom.us/zoom-meeting-1.7.2.min.js"></script>
<script>
    (function(){

        ZoomMtg.preLoadWasm();

        ZoomMtg.prepareJssdk();

        ZoomMtg.init({
            leaveUrl: 'https://event-on.cat-sw.com',
            isSupportAV: true,
            success: function () {
                ZoomMtg.join(
                    {
                        meetingNumber: '{{$meeting_number}}',
                        userName: '{{$auth_user->name}}',
                        signature: '{{$signature}}',
                        apiKey: '{{$api_key}}',
                        userEmail: '{{$auth_user->email}}',
                        passWord: null,
                        success: function(res){
                            $('#nav-tool').hide();
                            console.log('join meeting success');
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    }
                );
            },
            error: function(res) {
                console.log(res);
            }
        });
    })();
</script>
</body>
</html>
