<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{$register->name}}</title>
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.4/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.4/css/react-select.css" />
</head>
<body>


<script src="https://source.zoom.us/1.7.4/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/1.7.4/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/1.7.4/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/1.7.4/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/1.7.4/lib/vendor/jquery.min.js"></script>
<script src="https://source.zoom.us/1.7.4/lib/vendor/lodash.min.js"></script>

<!-- import ZoomMtg -->
<script src="https://source.zoom.us/zoom-meeting-1.7.4.min.js"></script>
<script>
    (function(){

        ZoomMtg.preLoadWasm();

        ZoomMtg.prepareJssdk();

        ZoomMtg.init({
            leaveUrl: 'https://event-on.cat-sw.com',
            isSupportAV: true,
            audioPanelAlwaysOpen: true,
            screenShare: true,
            isSupportChat: true,
            success: function () {
                var d = new Date();
                console.log('time: ',d.getTime());
                ZoomMtg.join(
                    {
                        meetingNumber: '{{$meeting_number}}',
                        userName: '{{$auth_user->name}}',
                        signature: '{{$signature}}',
                        apiKey: '{{$api_key}}',
                        userEmail: '{{$auth_user->email}}',
                        passWord: 7854125,
                        // role: 0,
                        success: function(res){
                            $('#nav-tool').hide();
                            console.log('join meeting success');
                            console.log(res);
                        },
                        error: function(res) {
                            console.log(res);
                        }
                    }
                );
                console.log('after join');
            },
            error: function(res) {
                console.log(res);
            }
        });
    })();


</script>
</body>
</html>
