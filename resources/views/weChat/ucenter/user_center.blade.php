@extends('weChat.layout.app')
@section('title', $title_name)
@section('body')
    <div class="page__bd page__bd_footer">
        <div class="weui-panel weui-panel_access">
            <div class="weui-panel__bd">
                <div class="weui-media-box weui-media-box_appmsg user_info">
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">{{$list->wx_name}}</h4>
                        <p class="weui-media-box__desc">欢迎使用合理屋理发店</p>
                        <p class="weui-media-box__desc card">@if($list->vip)<i class="fa fa-id-card"></i>年卡VIP <small>到期时间 {{$list->vip_exp_at}}</small>@endif</p>
                    </div>
                    <div class="weui-media-box__hd avatar">
                        <img class="weui-media-box__thumb" src="{{$list->wx_avatar}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="weui-cells">
            <a class="weui-cell weui-cell_access" href="{{url('wechat/hairstyle')}}">
                <div class="weui-cell__bd">发型精选</div>
                <div class="weui-cell__ft">
                    <span class="user_span-ft">立即查看更多发型</span>
                </div>
            </a>
        </div>

        <div class="weui-cells">
            <a class="weui-cell weui-cell_access" href="{{url('wechat/user/vipCard')}}/">
                <div class="weui-cell__bd">办理365畅理卡</div>
                <div class="weui-cell__ft">
                    <span class="user_span-ft"> 每天1元，全年不限次</span>
                </div>
            </a>
        </div>

        <div class="weui-cells">
            <a class="weui-cell weui-cell_access" href="{{url('wechat/user/evaluate_list')}}">
                <div class="weui-cell__bd">历史评价</div>
                <div class="weui-cell__ft"></div>
            </a>
        </div>


        <div class="weui-cells">
            <a class="weui-cell weui-cell_access" href="tel:13607166059">
                <div class="weui-cell__bd">投诉建议</div>
                <div class="weui-cell__ft"></div>
            </a>
            <a class="weui-cell weui-cell_access" href="{{url('wechat/user/edit_phone')}}">
                <div class="weui-cell__bd">手机号</div>
                <div class="weui-cell__ft">@if($list->phone){{$list->phone}}@endif</div>
            </a>
        </div>

        @include('weChat.layout.copyright')
        @include('weChat.layout.tabbar',['on' => 'center'])
    </div>
@endsection
