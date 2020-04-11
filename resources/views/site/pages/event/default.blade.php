<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$event->name}}</title>
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
            leaveUrl: '{{route('site.events.show',$event->id)}}',
            @if($role==1 or $auth_user->type == 1)
                isSupportAV: true,
                audioPanelAlwaysOpen: true,
                screenShare: true,
            @endif
            // isSupportChat: true,
            success: function () {
                ZoomMtg.join(
                    {
                        meetingNumber: '{{$event->meeting_id}}',
                        userName: '{{$auth_user->name}}',
                        signature: '{{$signature}}',
                        apiKey: '{{$api_key}}',
                        userEmail: '{{$auth_user->email}}',
                        passWord: '{{$event->zoom_password}}',
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
            },
            error: function(res) {
                console.log(res);
            }
        });
    })();


</script>
</body>
</html>
