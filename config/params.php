<?php

return [

    /*
    |--------------------------------------------------------------------------
    | params
    |--------------------------------------------------------------------------
    |
    */
    // 每页显示条数
    'pageSize' => 20,

    // 状态
    'status' => [
        1 => '启用',
        0 => '禁用',
    ],

    'userVip' => [
        0 => '普通用户',
        1 => '会员',
    ],

    'userType' => [
        0 => '消费者',
        1 => '理发师',
    ],

    'evaluateStar' => [
        1 => '1星',
        2 => '2星',
        3 => '3星',
        4 => '4星',
        5 => '5星',
    ],

//    'gender' => [
//        0 => '女士',
//        1 => '男士',
//    ],

    'uploadImg' => [
        'size' => 2, //上传图片大小，2M
//        'mimeType' => ['image/jpeg'],
    ],

    'pay_type' => [
        'wxPay' => '微信支付',
        'yearCard' => '年卡支付',
    ],

    // 发型类别
    'hair_type' => [
        1 => '女士',
        2 => '男士',
        3 => '儿童',
    ],

    // 订单状态
    'order_status' => [
        -1 => '未支付',
        1 => '待服务',
        2 => '待评价',
        3 => '已完成',
        4 => '已取消',
    ],

    // 短信
    'sms' => [
        // HTTP 请求的超时时间（秒）
        'timeout' => 5.0,

        // 默认发送配置
        'default' => [
            // 网关调用策略，默认：顺序调用
            'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

            // 默认可用的发送网关
            'gateways' => [
                'yuntongxun',
            ],
        ],
        // 可用的网关配置
        'gateways' => [
            'errorlog' => [
                'file' => '/tmp/easy-sms.log',
            ],
            'yuntongxun' => [
                'app_id' => env('YTX_APPID'),
                'account_sid' => env('YTX_SID'),
                'account_token' => env('YTX_TOKEN'),
                'is_sub_account' => false,
            ],
        ],
        'vcode_template_id' => '234639',
        // 短信验证码有效期
        'cache_vcode_exp' => 10, // 10分钟
    ],

];
