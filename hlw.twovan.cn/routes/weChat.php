<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix'        => 'wechat',
    'namespace'     => 'WeChat',
    'middleware'    => ['api'],
], function (Router $router) {
    $router->any('/', 'PublicController@serve');
    $router->get('test', 'PublicController@test');
    $router->any('payment/vipCardNotify', 'PublicController@vipCardNotify');
    $router->any('payment/orderNotify', 'PublicController@orderNotify');

});

Route::group([
    'prefix'        => 'wechat',
    'namespace'     => 'WeChat',
    'middleware'    => ['web', 'wechat.oauth'],
//    'middleware'    => ['web'],
], function (Router $router) {
    $router->get('index', 'StoreController@index');
    $router->get('store/{id}', 'StoreController@info');
    $router->get('store/evaluate_list/{id}', 'StoreController@evaluate_list');

    $router->get('service/{id}', 'ServiceController@index');

    $router->get('hairstyle', 'HairStyleController@index');

    $router->post('getVCode', 'UserController@getVCode');
    $router->get('user', 'UserController@index');
    $router->get('user/edit_phone', 'UserController@edit_phone');
    $router->post('user/update_phone', 'UserController@update_phone');
    $router->get('user/vipCard', 'UserController@vipCard');
    $router->post('user/postVipCard', 'UserController@postVipCard');
    $router->get('user/evaluate_list', 'UserController@evaluate_list');
    $router->post('user/barberWork', 'UserController@barberWork');

    $router->get('order', 'OrderController@index');
    $router->get('order/{id}', 'OrderController@info');
    $router->post('order/add', 'OrderController@add');
    $router->post('order/serviceOk', 'OrderController@serviceOk');

    $router->get('evaluate/add/{id}', 'EvaluateController@create');
    $router->post('evaluate/add', 'EvaluateController@store');


});

