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
// */
//     Route::get('',function(){
//         session(['uid'=>'88']);
//         return view('index',['name'=>'iPhone 4']);
//     });

  // 前台
Route::get('/','Index\IndexController@index');

  Route::get('index/register','Index\IndexController@register');
  Route::get('index/register_do','Index\IndexController@register_do');
  Route::get('index/login','Index\LoginController@Login');
  Route::any('index/login_do','Index\LoginController@Login_do');
  Route::get('index/shop','Index\IndexController@shop');
  Route::any('index/shop_do','Index\IndexController@shop_do');
  Route::get('index/setting','Index\IndexController@setting');

  // 购物车
  Route::get('index/cart','Index\CartController@cart');
  Route::get('index/checkout/{cart_id}','Index\CartController@checkout');


  Route::get('index/cartDel','Index\CartController@cartDel');
  Route::get('pays','Index\AliPayController@pay');//支付成功页面


// 后台登录
  Route::get('admin/login','Admin\LoginController@login');
  Route::post('admin/login_do','Admin\LoginController@login_do');
// 后台用户增删改查
  Route::get('admin/index','Admin\IndexController@index');
  Route::get('admin/add','Admin\IndexController@add');
  Route::post('admin/add_do','Admin\IndexController@add_do');
  Route::any('admin/add_index','Admin\IndexController@add_index');
  Route::get('/admin/del/','Admin\IndexController@del');
  Route::get('/admin/edit/{id}','Admin\IndexController@edit');
  Route::any('/admin/update','Admin\IndexController@update');

// 后台商品增删改查
  Route::get('admin/goods/add','Admin\GoodsController@add');
  Route::any('admin/goods/add_do','Admin\GoodsController@add_do');
  Route::get('admin/goods/index','Admin\GoodsController@index');
  Route::get('/admin/goods/del/','Admin\GoodsController@del');
  Route::get('/admin/goods/edit/{id}','Admin\GoodsController@edit');
  Route::any('/admin/goods/update','Admin\GoodsController@update');

  // 后台商品库存增删改查
  Route::prefix('/admin/goodskc')->middleware('checklogin')->group(function(){
  Route::get('add','Admin\Goodskc@add');
  Route::any('add_do','Admin\Goodskc@add_do');
  Route::get('index','Admin\Goodskc@index');
  Route::get('del/','Admin\Goodskc@del');
  Route::get('edit/{id}','Admin\Goodskc@edit');
  Route::any('update','Admin\Goodskc@update');
});

// 后台学生增删改查
  Route::get('admin/student/add','Admin\Student@add');
  Route::any('admin/student/add_do','Admin\Student@add_do');
  Route::get('admin/student/index','Admin\Student@index');
  Route::get('admin/student/del','Admin\Student@del');
  Route::get('admin/student/edit/{id}','Admin\Student@edit');
  Route::any('admin/student/update','Admin\Student@update');

// 后台足球竞猜
  Route::get('admin/moom/add','Admin\moom@add');
  Route::any('admin/moom/add_do','Admin\moom@add_do');
  Route::get('admin/moom/index','Admin\moom@index');
  Route::get('admin/moom/edit/{id}','Admin\moom@edit');
  Route::any('admin/moom/update','Admin\moom@update');
  Route::get('admin/moom/qwer/{id}','Admin\moom@qwer');
  Route::any('admin/moom/qwer_update','Admin\moom@qwer_update');
  Route::any('admin/moom/qwerr','Admin\moom@qwerr');

Route::middleware('stu')->group(function(){
     // 用户增删改查
  Route::get('/student/index','StudentController@index');
  Route::get('/student/create','StudentController@create');
  Route::any('/student/save','StudentController@save');
  Route::get('/student/delete/','StudentController@delete');
  Route::get('/student/edit/{id}','StudentController@edit');
  Route::post('/student/update/','StudentController@update');

    // 微商城增删改查
  Route::get('/good/create','Good@create');
  Route::post('/good/save','Good@save');
  Route::get('/good/index','Good@index');
  Route::get('/good/del','Good@del');
  Route::get('/good/edit/{id}','Good@edit');
  Route::post('/good/update','Good@update');

   // 商品增删改查
  Route::get('goods/create','Goods@create');
  Route::post('goods/save','Goods@save');
  Route::get('goods/index','Goods@index');
  Route::get('goods/del/','Goods@del');
  Route::get('goods/edit/{id}','Goods@edit');
  Route::post('goods/update/','Goods@update');
});


    // 用户注册登录
  Route::get('login/create','LoginController@create');
  Route::any('/login/save','LoginController@save');
  Route::get('login/login','LoginController@login');
  Route::any('/login/login_do','LoginController@login_do');
  Route::get('login/index','LoginController@index');




?>