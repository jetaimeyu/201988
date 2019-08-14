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

Route::get('/', function () {
    return view('welcome');
});

Route::get('form', 'RequestController@formPage');
Route::post('form', 'RequestController@form')->name('form.submit');
Route::post('/form/file_upload', 'RequestController@fileUpload');

Route::get('home', function(){
    return view('home');
})->name('home');
Route::resource('post', 'PostController');
Route::middleware('throttle:10,1')->group(function(){
    Route::get('/limit', function(){
        return  "访问频率限制" . date('Y-m-d H:i:s');
    });
});

//兜底路由
Route::fallback(function(){
    return "天王盖地虎 宝塔镇河妖";
});


Route::get('task/{id}/delete', function($id){
    return '<form method="post" action="' .  route('task.delete', [$id]) . '">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="' . csrf_token() . '">
                <button type="submit">删除任务</button>
            </form>';
});
Route::delete('task/{id}', function($id){
    return 'DELETE TASK ' . $id;
})->name('task.delete');
