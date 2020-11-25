<?php
Route::get('hi',function(){
    echo "hello";
});
Route::get('lala',"Boss\Test\Controllers\TestController@index");
Route::get('haha',"Boss\Test\Controllers\TestController@haha");
