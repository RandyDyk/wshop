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
    route::any('delcart','IndexController@delcart');

});
route::any('verify/create','CaptchaController@create');