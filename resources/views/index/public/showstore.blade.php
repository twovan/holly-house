@extends('weChat.layout.app')
@section('title', $title_name)
<link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">
<!-- If you'd like to support IE8 -->
<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js" type="javascript"></script>
<style type="style">
    body {
    / / -webkit-transform: rotate(90 deg);
    }
</style>
@section('body')
    <video muted id="myvideo" width="100%" height="auto" controls="controls" loop="loop">
        你的浏览器不支持HTML5播放此视频
        <span style="white-space:pre">    </span><!-- 支持播放的文件格式 -->
        <source src="{{asset('media/media_6.mp4')}}" type='video/mp4'/>
    </video>

    <iframe src="{{url('index/web_store',['id' =>$id])}}" id="iframe1Id" name="iframe1Name" width="100%" height="1312"
            style="display:block;border:0;"></iframe>

@endsection
@section('js')
    <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            }
        });
    </script>


    <script language="javascript">
        var vList = ["{{asset('media/media_6.mp4')}}", "{{asset('media/media_6.mp4')}}"]; // 初始化播放列表
        var vLen = vList.length;
        var curr = 0;
        var video = document.getElementById("myvideo");

        $(document).ready(function () {
            //video.play();
            // playloop();
        });


        video.addEventListener('ended', function () {
            console.log('第' + curr+1 + '个视屏播放结束');
            // playloop();
        });

        function playloop() {
            video.src = vList[curr];
            video.load();
            video.play();
            curr++;
            console.log('播放视频:第' + curr + "个");
            if (curr >= vLen) {
                curr = 0; //重新循环播放
                console.log('循环播放结束');
            }

        }
    </script>
@endsection
