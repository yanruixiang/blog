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
    Route::get('',function(){
        return view('welcome',['name'=>'小辣椒']);
    });




  Route::get('/student/index','StudentController@index');
  Route::get('/student/create','StudentController@create');
  Route::any('/student/save','StudentController@save');
  Route::get('/student/delete/','StudentController@delete');
  Route::get('/student/edit/{id}','StudentController@edit');
  Route::post('/student/update/','StudentController@update');





?>