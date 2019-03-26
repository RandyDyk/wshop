<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/','IndexController@index');
Route::prefix('IndexController')->group(function () {
    //所有商品
    route::any('allshops/{id?}','IndexController@allshops');
    //购物车
    route::any('buycar','IndexController@buycar');
    //我的
    route::any('userpage','IndexController@userpage');
    //商品详情页
    route::any('shopcontent/{id}','IndexController@shopcontent');
    //登陆
    route::any('login','IndexController@login');
    //登陆执行
    route::any('logindo','IndexController@logindo');
    //注册
    route::any('register','IndexController@register');
    //注册执行
    route::any('registerdo','IndexController@registerdo');
    route::any('code','IndexController@code');
    //购物车添加
    route::any('addcart','IndexController@addcart');
    //删除购物车
    route::any('delcart','IndexController@delcart');
    //购物车列表点击加减号
    route::any('updatecart','IndexController@updatecart');
    //购物车结算
    route::any('payment','IndexController@payment');
    // 结算视图
    route::any('paymentshow','IndexController@paymentshow');
    //收货地址展示
    route::any('address','IndexController@address');
    //添加收货地址
    route::any('writeaddr','IndexController@writeaddr');
    //添加收货地址执行
    route::any('writeaddrdo','IndexController@writeaddrdo');
    //修改收货地址
    route::any('updateaddr','IndexController@updateaddr');
    //修改收货地址执行
    route::any('updateaddrdo','IndexController@updateaddrdo');
    //删除收货地址
    route::any('deladdr','IndexController@deladdr');



});
route::any('verify/create','CaptchaController@create');