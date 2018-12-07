<div class="footer-weui-tab">
    <div class="weui-tab">
        <div class="weui-tabbar">
            <a href="@if($on == 'index') javascript:; @else {{url('wechat/index')}}  @endif" class="weui-tabbar__item @if($on == 'index') weui-bar__item_on @endif">
                <div  class="weui-tabbar__icon"><i class="fa fa-cut"></i></div>
                <p class="weui-tabbar__label">剪发</p>
            </a>
            <a href="@if($on == 'order') javascript:; @else {{url('wechat/order')}}  @endif" class="weui-tabbar__item @if($on == 'order') weui-bar__item_on @endif">
                <div  class="weui-tabbar__icon"><i class="fa fa-list-alt"></i></div>
                <p class="weui-tabbar__label">订单</p>
            </a>
            <a href="@if($on == 'center') javascript:; @else {{url('wechat/user')}}  @endif" class="weui-tabbar__item @if($on == 'center') weui-bar__item_on @endif">
                <div  class="weui-tabbar__icon"><i class="fa fa-user"></i></div>
                <p class="weui-tabbar__label">个人</p>
            </a>
        </div>
    </div>
</div>