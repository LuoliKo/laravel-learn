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

Route::view('welcome', 'welcome', ['name' => 'laravel learn']);

Route::get('hello', function () {
    return 'hello laravel routing!';
});

Route::get('test', 'TestController@index');

Route::match(['get', 'post'], '/foo', function () {
    return 'match routes';
});

Route::any('/bar', function () {
    return 'any route';
});

Route::redirect('test', 'hello', 301);

Route::get('user/{id}', function ($id) {
    return 'user' . $id;
});

Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return $postId . '-' . $commentId;
});

Route::get('user/{name?}', function ($name = null) {
    return $name;
});

Route::get('user2/{name?}', function ($name = 'Jone') {
    return $name;
});

Route::get('user3/{name}', function ($name) {
    return $name;
})->where('name', '[A-Za-z]+');

Route::get('user4/{id}', function ($id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('user5/{id}/{name}', function ($id, $name) {
    return $id . $name;
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('device/{pid}', function ($pid) {
    return $pid;
});

Route::get('userprofile', function () {
    return redirect()->route('profile');
});

Route::get('route/profile', function () {
    return 'my url:' . route('profile');
})->name('profile');

Route::get('route/{id}/profile', function () {
    $url = route('profile2', ['id' => 1]);
    return $url;
})->name('profile2');

Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        return 'prefix route';
    });
});

Route::get('middleware', function () {
    return 'success';
})->middleware('token', \App\Http\Middleware\AfterHandler::class);

Route::group(['middleware' => ['blog']], function () {
    Route::get('/welcome2', function () {
        return view('welcome', ['name' => 'LuoliKo']);
    });

    Route::view('/view', 'welcome', ['name' => 'LuoliKo & Ashida Mana']);
});

Route::get('info', 'InfoController@index');

Route::post('csrf-post', function () {
    return view('welcome', ['name' => 'Hello LuoliKo']);
});

Route::get('form-without-csrf-token', function () {
    return '<form method="POST" action="/csrf-post"><button type="submit">提交</button></form>';
});

Route::get('form-with-csrf-token', function () {
    return '<form method="POST" action="/csrf-post">' . csrf_field() . '<button type="submit">提交</button></form>';
});

Route::get('show', 'UserController@show');

Route::get('profilebycontroller/{id}', 'ShowProfile');

Route::resource('article', 'ArticleController');


Route::prefix('request')->group(function () {
    Route::get('test1', 'RequestController@test1');
    Route::get('test2/{name}', 'RequestController@test2');
    Route::get('test3', 'RequestController@test3');
    Route::any('test4', 'RequestController@test4');
    Route::any('test5', 'RequestController@test5');
});