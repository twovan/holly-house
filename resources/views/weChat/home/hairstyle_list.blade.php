@extends('weChat.layout.app')
@section('title', $title_name)
@section('body')
    <div class="page__bd">
        <div class="weui-cells order_title">
            <div class="weui-flex">
                <div class="weui-flex__item">
                    <a class="weui-cell weui-cell_access @if($type == 0) active @endif" href="{{url('wechat/hairstyle')}}?type=0">全部</a>
                </div>
                <div class="weui-flex__item">
                    <a class="weui-cell weui-cell_access @if($type == 1) active @endif" href="{{url('wechat/hairstyle')}}?type=1">女士</a>
                </div>
                <div class="weui-flex__item">
                    <a class="weui-cell weui-cell_access @if($type == 2) active @endif" href="{{url('wechat/hairstyle')}}?type=2">男士</a>
                </div>
                <div class="weui-flex__item">
                    <a class="weui-cell weui-cell_access @if($type == 3) active @endif" href="{{url('wechat/hairstyle')}}?type=3">儿童</a>
                </div>
            </div>
        </div>
        <div class="weui-grids">
            @foreach($lists as $list)
            <a href="javascript:;" class="weui-grid">
                <div class="weui-grid__icon box-auto">
                    <img src="{{asset('storage/'.$list->upload_url)}}">
                </div>
                <p class="weui-grid__label">{{$list->name}}</p>
            </a>
            @endforeach
        </div>
        <div class="weui-gallery">
            <span class="weui-gallery__img"></span>
        </div>

        @include('weChat.layout.copyright')

    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $('.weui-grid').click(function () {
                var img = $(this).find('img').attr('src');
                $('.weui-gallery').css('display','block').find('.weui-gallery__img').attr('style','background-image:url('+img+')');
            });
            $('.weui-gallery').click(function () {
                $('.weui-gallery').css('display','none');
            });
        })
    </script>
@endsection
