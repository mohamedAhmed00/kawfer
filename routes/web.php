<?php

Route::get('/login', 'App\Modules\Credential\Controller\Credential@getFormLogin')->middleware('RedirectIfAuth')->name('login');
Route::post('/auth/login', 'App\Modules\Credential\Controller\Credential@login')->middleware('RedirectIfAuth')->name('auth.login');
Route::get('/auth/home', 'App\Modules\Credential\Controller\Credential@home')->middleware('auth')->name('auth.home');
Route::get('/auth/logout', 'App\Modules\Credential\Controller\Credential@logout')->middleware('auth')->name('auth.logout');

Route::group(['namespace' => 'App\Modules\Category\Controller', 'middleware' => 'auth','prefix' => '/auth/category'], function () {
    Route::get('', 'Category@index')->name('auth.category.index');
    Route::get('create', 'Category@create')->name('auth.category.create');
    Route::post('store', 'Category@store')->name('auth.category.store');
    Route::get('{id}/edit', 'Category@edit')->name('auth.category.edit');
    Route::post('update/{id}', 'Category@update')->name('auth.category.update');
    Route::get('delete/{id}', 'Category@delete')->name('auth.category.delete');
});

Route::group(['namespace' => 'App\Modules\Product\Controller', 'middleware' => 'auth','prefix' => '/auth/product'], function () {
    Route::get('', 'Product@index')->name('auth.product.index');
    Route::get('create', 'Product@create')->name('auth.product.create');
    Route::post('store', 'Product@store')->name('auth.product.store');
    Route::get('{id}/edit', 'Product@edit')->name('auth.product.edit');
    Route::post('update/{id}', 'Product@update')->name('auth.product.update');
    Route::get('delete/{id}', 'Product@delete')->name('auth.product.delete');
});

Route::group(['namespace' => 'App\Modules\User\Controller', 'middleware' => 'auth','prefix' => '/auth/user'], function () {
    Route::get('', 'User@index')->name('auth.user.index');
    Route::get('create', 'User@create')->name('auth.user.create');
    Route::post('store', 'User@store')->name('auth.user.store');
    Route::get('{id}/edit', 'User@edit')->name('auth.user.edit');
    Route::post('update/{id}', 'User@update')->name('auth.user.update');
    Route::get('delete/{id}', 'User@delete')->name('auth.user.delete');
});

Route::group(['namespace' => 'App\Modules\Worker\Controller', 'middleware' => 'auth','prefix' => '/auth/worker'], function () {
    Route::get('', 'Worker@index')->name('auth.worker.index');
    Route::get('create', 'Worker@create')->name('auth.worker.create');
    Route::post('store', 'Worker@store')->name('auth.worker.store');
    Route::get('{id}/edit', 'Worker@edit')->name('auth.worker.edit');
    Route::post('update/{id}', 'Worker@update')->name('auth.worker.update');
    Route::get('delete/{id}', 'Worker@delete')->name('auth.worker.delete');
});

Route::group(['namespace' => 'App\Modules\Operation\Controller', 'middleware' => 'auth','prefix' => '/auth/operation'], function () {
    Route::get('', 'Operation@index')->name('auth.operation.index');
    Route::get('create', 'Operation@create')->name('auth.operation.create');
    Route::post('store', 'Operation@store')->name('auth.operation.store');
    Route::get('{id}/edit', 'Operation@edit')->name('auth.operation.edit');
    Route::post('update/{id}', 'Operation@update')->name('auth.operation.update');
    Route::get('delete/{id}', 'Operation@delete')->name('auth.operation.delete');
});

Route::group(['namespace' => 'App\Modules\Setting\Controller', 'middleware' => 'auth','prefix' => '/auth/setting'], function () {
    Route::get('', 'Setting@index')->name('auth.setting.index');
    Route::get('create', 'Setting@create')->name('auth.setting.create');
    Route::post('store', 'Setting@store')->name('auth.setting.store');
    Route::get('{id}/edit', 'Setting@edit')->name('auth.setting.edit');
    Route::post('update/{id}', 'Setting@update')->name('auth.setting.update');
    Route::get('delete/{id}', 'Setting@delete')->name('auth.setting.delete');
});

Route::group(['namespace' => 'App\Modules\Role\Controller', 'middleware' => 'auth','prefix' => '/auth/role'], function () {
    Route::get('', 'Role@index')->name('auth.role.index');
    Route::get('create', 'Role@create')->name('auth.role.create');
    Route::post('store', 'Role@store')->name('auth.role.store');
    Route::get('{id}/edit', 'Role@edit')->name('auth.role.edit');
    Route::post('update/{id}', 'Role@update')->name('auth.role.update');
    Route::get('delete/{id}', 'Role@delete')->name('auth.role.delete');
});

Route::group(['namespace' => 'App\Modules\Permission\Controller', 'middleware' => 'auth','prefix' => '/auth/permission'], function () {
    Route::get('', 'Permission@index')->name('auth.permission.index');
    Route::get('create', 'Permission@create')->name('auth.permission.create');
    Route::post('store', 'Permission@store')->name('auth.permission.store');
    Route::get('{id}/edit', 'Permission@edit')->name('auth.permission.edit');
    Route::post('update/{id}', 'Permission@update')->name('auth.permission.update');
    Route::get('delete/{id}', 'Permission@delete')->name('auth.permission.delete');
});
