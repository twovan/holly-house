@extends('weChat.layout.app')
@section('title', $title_name)
@section('body')
    <style type="text/css">
        body {
            /*background-color: #342c2a;*/
            background-image: url("{{asset('weui/images/store_bg.png')}}");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        h4 {
            color: #fff;
        }
    </style>
    <div class="page__bd" style="text-align: center">
        <div class="weui-panel__bd">
            <a href="javascript:;" class="weui-media-box weui-media-box_appmsg evaluate-web"
               style="margin: 332px 0 0 32px;">
                <div class="weui-media-box__hd" style="width: 420px;height: auto; margin-right: 26px">
                </div>
                <div class="weui-media-box__bd evaluate-add" style="width: auto;height: auto;">

                    <p class="weui-media-box__desc" style="font-size: 20px;color: #fcd70d;text-align: left;">发型师：</p>
                    <ul class="weui-media-box__info web-user-list">
                        @foreach($get_work_lists as $get_work_list)
                            <li>
                                <img src="{{$get_work_list->barber->wx_avatar}}"><span>{{$get_work_list->barber->wx_name}}</span>
                            </li>
                        @endforeach
                    </ul>
                    @if($order_count == 0)
                        <p class="weui-media-box__desc" style="font-size: 20px;color: #fcd70d;text-align: left;">
                            当前可直接服务哦</p>
                    @else
                        <p class="weui-media-box__desc" style="font-size: 20px;color: #fcd70d;text-align: left;">
                            当前排队人数 {{$order_count}} 人
                            {{-- ，预计等候时间 {{($order_count - 1) * 20}} ~ {{$order_count * 20}} 分钟--}}
                            ，预计等候时间 10-20 分钟
                        </p>
                        <ul class="weui-media-box__info web-user-list">
                            @foreach($order_lists as $order_list)
                                <li>
                                    <img src="{{$order_list->customer->wx_avatar}}"><span>{{$order_list->queue_no}}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>

            </a>
        </div>
        <p class="weui-media-box__desc" style="font-size: 60px;font-weight:bolder;color: #fcd70d;position:fixed
        ;bottom:250px;left:300px">{{$list->name}}欢迎您</p>
    </div>
    <!-- @include('index.public.copyright') -->
    <div style="width: 120px;position: fixed;bottom: 16px;right: 20px;z-index: 10;color:#FCEF35;text-align: center;font-size: 20px;">
        <img class="full-img"
             src="data:image/png;base64,{!! base64_encode(QrCode::format('png')->errorCorrection('Q')->size('220')->margin(0)->generate($qrCode)) !!}">
        工作人员专用
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            var url = window.location.href;
            setTimeout(function () {
                window.location.href = url;
            }, 20000);
        });
    </script>

@endsection
