@extends('backend.layout.app')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox widget-box float-e-margins">
                <div class="ibox-title">
                    <form role="form" class="form-inline">
                        <div class="form-group form-group-sm">
                            <label>手机号</label>
                            <input type="text" name="phone" value="{{$request_params->phone}}" class="form-control input-sm">
                        </div>
                        <button class="btn btn-sm btn-primary" type="submit">查询</button>
                    </form>
                </div>

                <div class="ibox-title clearfix">
                    <h5>{{$list_title_name}}
                        <small>列表</small>
                    </h5>
                    {{--<div class="pull-right">--}}
                        {{--<button class="btn btn-info btn-xs" data-form="add-model" data-toggle="modal" data-target="#formModal">添加</button>--}}
                    {{--</div>--}}
                </div>
                <div class="ibox-content">

                    <table class="table table-stripped toggle-arrow-tiny" data-sort="false">
                        <thead>
                            <tr>
                                <th>昵称</th>
                                <th>手机号</th>
                                <th>身份</th>
                                <th>VIP到期时间</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($lists as $list)
                            <tr>
                                <td>{{$list->wx_name}}</td>
                                <td>{{$list->phone}}</td>
                                <td>{{config('params')['userVip'][$list->vip]}}</td>
                                <td>@if($list->vip > 0){{$list->vip_exp_at}}@endif</td>
                                <td>{{config('params')['status'][$list->status]}}</td>
                                <td><button class="btn btn-white btn-xs" data-form="edit-model" data-toggle="modal" data-target="#formModal"
                                            data-id="{{$list->id}}"
                                            data-phone="{{$list->phone}}"
                                            data-type="{{$list->type}}"
                                            data-vip="{{$list->vip}}"
                                            data-vip_exp_at="{{$list->vip_exp_at}}"
                                            data-status="{{$list->status}}"
                                    >修改</button></td></tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{$lists->appends($request_params->all())->render()}}

                </div>

            </div>
        </div>
    </div>
    <div class="modal inmodal fade" id="formModal" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">{{$list_title_name}}编辑</h4>
                </div>
                <form method="post" id="form-validate-submit" class="form-horizontal m-t">
                    <div class="modal-body">
                        @include('backend.customer.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary btn-sm">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
        <!--    js    -->
@section('js_code')
    <script>
        $(function () {
            var form_url = '{{route('backend.user.save')}}';
            var index_url = window.location.href;
            var rules = [];
            subActionAjaxValidateForMime('#form-validate-submit', rules, form_url, index_url);


            /**
             * 点击添加按钮触发的操作
             */
            $('[data-form="add-model"]').click(function () {
                var n = '';
                $('#form-id').val(n);
                $('#form-phone').val(n);
                $('#form-vip').val(0);
                $('#form-vip_exp_at').val(n);
                $('#form-status').val(1).trigger('chosen:updated');
            });
            /**
             * 点击修改按钮触发的操作
             */
            $('[data-form="edit-model"]').click(function () {
                var id = $(this).attr('data-id');
                var phone = $(this).attr('data-phone');
                var type = $(this).attr('data-type');
                var vip = $(this).attr('data-vip');
                var vip_exp_at = $(this).attr('data-vip_exp_at');
                if(vip == 0){
                    vip_exp_at = '';
                }
                var status = $(this).attr('data-status');
                $('#form-id').val(id);
                $('#form-phone').val(phone);
                $('#form-type').val(type);
                $('#form-vip').val(vip);
                $('#form-vip_exp_at').val(vip_exp_at);
                $('#form-status').val(status).trigger('chosen:updated');
            });
            var vip_at = {
                elem: "#form-vip_exp_at",
                format: "YYYY/MM/DD",
                min: "2010-01-01",
                max: "2037-12-31",
                istime: true,
                istoday: false,
                choose: function (datas) {}
            };
            laydate(vip_at);
        });

    </script>
@endsection