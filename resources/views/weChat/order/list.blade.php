@extends('weChat.layout.app')
@section('title', $title_name)
@section('body')
    <style type="text/css">
        .order_title a{font-size: 14px !important}
    </style>
    <div class="page__bd page__bd_footer">
        <div class="weui-cells order_title">
            <div class="weui-flex">
                <div class="weui-flex__item">
                    <a class="weui-cell weui-cell_access @if($request_status == 0) active @endif" href="{{url('wechat/order')}}?status=0">全部</a>
                </div>
                <div class="weui-flex__item">
                    <a class="weui-cell weui-cell_access @if($request_status == 1) active @endif" href="{{url('wechat/order')}}?status=1">待服务</a>
                </div>
                <div class="weui-flex__item">
                    <a class="weui-cell weui-cell_access @if($request_status == 2) active @endif" href="{{url('wechat/order')}}?status=2">待评价</a>
                </div>
                <div class="weui-flex__item">
                    <a class="weui-cell weui-cell_access @if($request_status == 3) active @endif" href="{{url('wechat/order')}}?status=3">已完成</a>
                </div>
                  <div class="weui-flex__item">
                    <a class="weui-cell weui-cell_access @if($request_status == 4) active @endif" href="{{url('wechat/order')}}?status=4">已取消</a>
                </div>
            </div>
        </div>
        @foreach($lists as $list)
        <div class="weui-panel weui-panel_access order_list">
            <div class="weui-panel__hd">
                <h4 class="weui-media-box__title store_title">{{$list->store->name}}
                    <small>{{config('params')['order_status'][$list->status]}}</small>
                </h4>
            </div>
            <div class="weui-panel__hd weui-panel__bd">
                <a href="{{url('wechat/order',['id' => $list->id])}}" class="weui-media-box weui-media-box_appmsg evaluate-web">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="{{asset('storage/'.$list->service->upload_url)}}" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">{{$list->service->name}}</h4>
                        <p class="weui-media-box__desc">订单时间：{{$list->created_at}}</p>
                        <p class="weui-media-box__desc">门店地址：{{$list->store->address}}</p>
                    </div>
                </a>
            </div>
            <div class="weui-panel__hd">
                <h4 class="weui-media-box__title btn_title">
                    @if($list->pay_type == 'yearCard')
                        年卡支付
                    @else
                        合计 ￥{{$list->pay_fee}}
                    @endif
                    @if($list->status == 1)
                        <a href="javascript:;" class="weui-btn weui-btn_mini weui-btn_primary weui-btn_disabled">等待服务</a>
                    @elseif($list->status == 2)
                        <a href="{{url('wechat/evaluate/add', ['id' => $list->id])}}" class="weui-btn weui-btn_mini weui-btn_primary">评价</a>
                    @elseif($list->status == 3)
                        <a href="{{url('wechat/store', ['id' => $list->store->id])}}" class="weui-btn weui-btn_mini weui-btn_primary">再来一单</a>
                    @endif
                </h4>
            </div>
        </div>
        @endforeach

        @include('weChat.layout.copyright')
        @include('weChat.layout.tabbar',['on' => 'order'])
    </div>
@endsection
