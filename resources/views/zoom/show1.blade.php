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
<!--<button class="speakers" data-toggle="modal" data-target="#myModal">-->
<!--    <svg viewBox="0 0 497 497.048" width="497pt" xmlns="http://www.w3.org/2000/svg"><path d="m359.015625 375.574219-102.992187-28.605469v-24.769531l21.703124 6.511719 11.464844.335937c25.824219 0 46.832032-21.007813 46.832032-46.832031 0-4.765625 1.128906-9.527344 3.257812-13.789063l9.695312-19.402343c10.589844-.496094 19.046876-9.269532 19.046876-19.976563 0-4.292969-1.414063-8.550781-4-12l-2.984376-3.976563c-10.976562-14.628906-17.015624-32.757812-17.015624-51.054687 0-8.390625-2.121094-16.449219-6.0625-23.589844l2.648437-2.648437c17.679687-17.679688 27.414063-41.183594 27.414063-66.191406 0-20.121094-6.648438-40.074219-18.71875-56.171876l-10.089844-13.414062-5.152344 1.289062c-41.816406 10.453126-85.191406 15.757813-128.925781 15.757813h-4.394531c-70.972657 0-128.71875 57.746094-128.71875 128.722656 0 21.824219 5.601562 43.4375 16.550781 63.085938l27.929687 41.511719c8.144532 12.089843 14.609375 25.25 19.222656 39.097656 5.503907 16.511718 8.296876 33.703125 8.296876 51.101562v6.402344l-102.992188 28.605469c-24.144531 6.714843-41.0078125 28.898437-41.0078125 53.960937v67.511719h400.0000005v-67.511719c0-25.0625-16.863282-47.246094-41.007813-53.960937zm-109.609375-13.839844 5.792969 1.609375-11.847657 47.398438-29.984374-24.980469zm98.832031-139.0625 2.976563 3.96875c.527344.703125.808594 1.535156.808594 2.40625 0 2.210937-1.792969 4-4 4h-8.945313l-14.101563 28.21875c-3.242187 6.460937-4.953124 13.710937-4.953124 20.949219 0 17-13.832032 30.832031-30.832032 30.832031h-7.992187l-78.878907-23.664063-4.59375 15.328126 42.296876 12.6875v31.371093l-40 26.664063-40-26.664063v-8.203125c0-7.589844-.625-15.132812-1.582032-22.621094l2.949219-2.953124c19.753906-19.753907 30.632813-46.015626 30.632813-73.945313v-8h-16c-8.824219 0-16-7.175781-16-16s7.175781-16 16-16h16v-18.382813c0-12.128906 4.167968-24.023437 11.746093-33.496093 10.238281-12.785157 25.496094-20.121094 41.871094-20.121094h49.414063c8.808593 0 17.089843 3.433594 23.3125 9.65625 6.226562 6.226563 9.65625 14.511719 9.65625 23.3125 0 21.738281 7.175781 43.273437 20.214843 60.65625zm-197.597656 139.0625 36.039063 24.027344-29.984376 24.980469-11.847656-47.398438zm-20.863281-120.292969-27.570313-40.9375c-9.277343-16.695312-14.183593-35.625-14.183593-54.734375 0-62.152343 50.570312-112.722656 112.71875-112.722656h4.394531c43.359375 0 86.382812-5.0625 127.664062-14.976563l3.703125 4.945313c10.007813 13.351563 15.519532 29.886719 15.519532 46.570313 0 20.726562-8.070313 40.214843-22.726563 54.878906l-1.351563 1.351562c-9.035156-8.222656-20.601562-12.769531-32.890624-12.769531h-49.414063c-21.265625 0-41.074219 9.519531-54.359375 26.128906-9.839844 12.296875-15.257812 27.734375-15.257812 43.488281v2.382813c-17.648438 0-32 14.351563-32 32 0 17.527344 14.167968 31.808594 31.648437 32-1.625 18.265625-8.824219 35.359375-20.734375 49.335937-1.152344-4.703124-2.488281-9.367187-4.027344-13.976562-5.070312-15.222656-12.191406-29.679688-21.132812-42.964844zm254.246094 239.605469h-368v-51.511719c0-17.894531 12.046874-33.75 29.296874-38.542968l84.105469-23.359376 17.933594 71.71875 52.664063-43.886718 52.664062 43.894531 17.9375-71.71875 84.101562 23.359375c17.25 4.785156 29.296876 20.632812 29.296876 38.535156zm0 0"/><path d="m463.214844 169.855469-11.3125 11.3125c18.136718 18.128906 28.121094 42.238281 28.121094 67.878906s-9.984376 49.753906-28.121094 67.882813l11.3125 11.308593c21.160156-21.148437 32.808594-49.269531 32.808594-79.191406 0-29.917969-11.648438-58.039063-32.808594-79.191406zm0 0"/><path d="m440.59375 192.480469-11.3125 11.3125c12.085938 12.085937 18.742188 28.160156 18.742188 45.253906 0 17.097656-6.65625 33.167969-18.742188 45.257813l11.3125 11.3125c15.101562-15.105469 23.429688-35.203126 23.429688-56.570313s-8.328126-41.460937-23.429688-56.566406zm0 0"/><path d="m417.96875 215.105469-11.3125 11.308593c6.039062 6.050782 9.367188 14.089844 9.367188 22.632813 0 8.546875-3.328126 16.585937-9.367188 22.632813l11.3125 11.3125c9.0625-9.070313 14.054688-21.121094 14.054688-33.945313s-4.992188-24.871094-14.054688-33.941406zm0 0"/></svg>-->
<!--    <span>Speakers</span>-->
<!--    </button>-->
<script>
    (function(){

        ZoomMtg.preLoadWasm();

        ZoomMtg.prepareJssdk();

        ZoomMtg.init({
            leaveUrl: 'https://event-on.cat-sw.com',
            isSupportAV: true,
            audioPanelAlwaysOpen: true,
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
                        passWord: null,
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
{{--<style>--}}
{{--    .modal-backdrop {--}}
{{--        background-color: rgba(0, 0, 0, 0); !important;--}}
{{--    }--}}
{{--    /*button[aria-label="invite"] , button[aria-label="open the chat pane"] , button[aria-label="Record"] , button[aria-label="Share permission setting"] , button[aria-label="open the participants list pane"] {*/--}}
{{--    /*    display: none !important;*/--}}
{{--    /*}*/--}}
{{--    /*button[aria-label="open invite dialog"] , button[aria-label="start sending my video"] ,  button[aria-label="open the manage participants list pane"], button[aria-label="Share Screen"] , .more-button, .footer__leave-btn{*/--}}
{{--    /*    display: none !important;*/--}}
{{--    /*}*/--}}

{{--    .footer {--}}
{{--        background-image: linear-gradient(to bottom, #000000, #000000) !important;--}}
{{--        padding: 10px;--}}
{{--        height: auto;--}}
{{--    }--}}
{{--    .footer button.footer__leave-btn {--}}
{{--        background-color:#7bc4f6;--}}
{{--        color: #02303e;--}}
{{--        font-size: 16px;--}}
{{--    }--}}
{{--    .more-button__button:hover, .footer-button__button:hover, .speakers:hover {--}}
{{--        background-color: #e42344 !important;--}}
{{--    }--}}
{{--    .speakers {--}}
{{--        padding: 0;--}}
{{--        border: 0;--}}
{{--        background: transparent;--}}
{{--        outline: 0;--}}
{{--        z-index: 999999;--}}
{{--        color: #fff;--}}
{{--        display: block;--}}
{{--        height: 50px;--}}
{{--        position: absolute;--}}
{{--        bottom: 0;--}}
{{--        left: 16%;--}}
{{--        font-size: 11px;--}}
{{--        padding-left: 28px;--}}
{{--        padding-right: 20px;--}}
{{--        display: none;--}}
{{--    }--}}
{{--    .speakers svg {--}}
{{--        width: 56px;--}}
{{--        height: 30px;--}}
{{--        fill: #fff;--}}
{{--        display: block;--}}
{{--    }--}}
{{--    .active-user-name {--}}
{{--        position: absolute;--}}
{{--        max-width: 40%;--}}
{{--        left: 5px;--}}
{{--        bottom: 94px !important;--}}
{{--        height: auto;--}}
{{--        white-space: nowrap;--}}
{{--        color: #fff;--}}
{{--        background: rgba(0, 0, 0, 0.7);--}}
{{--        font-size: 12px;--}}
{{--        padding: 3px 8px;--}}
{{--        text-align: left;--}}
{{--        -o-text-overflow: ellipsis;--}}
{{--        text-overflow: ellipsis;--}}
{{--        overflow: hidden;--}}
{{--        padding: 23px;--}}
{{--        background-color: #3d3d3d;--}}
{{--        margin-left: -5px;--}}
{{--        -webkit-border-top-right-radius: 50px;--}}
{{--        -webkit-border-bottom-right-radius: 50px;--}}
{{--        -moz-border-radius-topright: 50px;--}}
{{--        -moz-border-radius-bottomright: 50px;--}}
{{--        border-top-right-radius: 50px;--}}
{{--        border-bottom-right-radius: 50px;--}}
{{--    }--}}

{{--</style>--}}
</body>
</html>
