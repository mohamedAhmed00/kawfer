<?php

Route::get('/', 'App\Modules\Credential\Controller\Credential@getFormLogin')->name('public');
Route::get('/login', 'App\Modules\Credential\Controller\Credential@getFormLogin')->name('login');

Route::post('/auth/login', 'App\Modules\Credential\Controller\Credential@login')->name('auth.login');
Route::get('/auth/home', 'App\Modules\Credential\Controller\Credential@home')->middleware('auth')->name('auth.home');
Route::get('/auth/logout', 'App\Modules\Credential\Controller\Credential@logout')->middleware('auth')->name('auth.logout');

Route::group(['namespace' => 'App\Modules\Category\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/category'], function () {
    Route::get('', 'Category@index')->name('auth.category.index')->middleware('can:view,App\Modules\Category\Model\Category');
    Route::get('create', 'Category@create')->name('auth.category.create')->middleware('can:create,App\Modules\Category\Model\Category');
    Route::post('store', 'Category@store')->name('auth.category.store')->middleware('can:create,App\Modules\Category\Model\Category');
    Route::get('{id}/edit', 'Category@edit')->name('auth.category.edit')->middleware('can:update,App\Modules\Category\Model\Category');
    Route::post('update/{id}', 'Category@update')->name('auth.category.update')->middleware('can:update,App\Modules\Category\Model\Category');
    Route::get('delete/{id}', 'Category@delete')->name('auth.category.delete')->middleware('can:delete,App\Modules\Category\Model\Category');
});

Route::group(['namespace' => 'App\Modules\Product\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/product'], function () {
    Route::get('', 'Product@index')->name('auth.product.index')->middleware('can:view,App\Modules\Product\Model\Product');
    Route::get('create', 'Product@create')->name('auth.product.create')->middleware('can:create,App\Modules\Product\Model\Product');
    Route::post('store', 'Product@store')->name('auth.product.store')->middleware('can:create,App\Modules\Product\Model\Product');
    Route::get('{id}/edit', 'Product@edit')->name('auth.product.edit')->middleware('can:update,App\Modules\Product\Model\Product');
    Route::post('update/{id}', 'Product@update')->name('auth.product.update')->middleware('can:update,App\Modules\Product\Model\Product');
    Route::get('delete/{id}', 'Product@delete')->name('auth.product.delete')->middleware('can:delete,App\Modules\Product\Model\Product');
    Route::post('get/', 'Product@getProductByQrcode')->name('auth.product.get')->middleware('can:view,App\Modules\Product\Model\Product');
});

Route::group(['namespace' => 'App\Modules\User\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/user'], function () {
    Route::get('', 'User@index')->name('auth.user.index')->middleware('can:view,App\Modules\User\Model\User');
    Route::get('/profile', 'User@profile')->name('auth.user.profile');
    Route::get('create', 'User@create')->name('auth.user.create')->middleware('can:create,App\Modules\User\Model\User');
    Route::post('store', 'User@store')->name('auth.user.store')->middleware('can:create,App\Modules\User\Model\User');
    Route::get('{id}/edit', 'User@edit')->name('auth.user.edit')->middleware('can:update,App\Modules\User\Model\User');
    Route::post('update/{id}', 'User@update')->name('auth.user.update')->middleware('can:update,App\Modules\User\Model\User');
    Route::post('profile', 'User@updateProfile')->name('auth.user.profile')->middleware('can:update,App\Modules\User\Model\User');
    Route::get('delete/{id}', 'User@delete')->name('auth.user.delete')->middleware('can:delete,App\Modules\User\Model\User');
});
Route::group(['namespace' => 'App\Modules\Client\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/client'], function () {
    Route::get('', 'Client@index')->name('auth.client.index')->middleware('can:view,App\Modules\Client\Model\Client');
    Route::get('create', 'Client@create')->name('auth.client.create')->middleware('can:create,App\Modules\Client\Model\Client');
    Route::post('store', 'Client@store')->name('auth.client.store')->middleware('can:create,App\Modules\Client\Model\Client');
    Route::get('{id}/edit', 'Client@edit')->name('auth.client.edit')->middleware('can:update,App\Modules\Client\Model\Client');
    Route::post('update/{id}', 'Client@update')->name('auth.client.update')->middleware('can:update,App\Modules\Client\Model\Client');
    Route::get('delete/{id}', 'Client@delete')->name('auth.client.delete')->middleware('can:delete,App\Modules\Client\Model\Client');

    Route::get('/{id}', 'Client@profile')->name('auth.client.profile.edit')->middleware('can:view,App\Modules\Client\Model\Profile');
    Route::post('create/{id}', 'Client@createProfile')->name('auth.client.profile.store')->middleware('can:create,App\Modules\Client\Model\Profile');
    Route::post('update/{id}/{profile_id}', 'Client@updateProfile')->name('auth.client.profile.update')->middleware('can:update,App\Modules\Client\Model\Profile');
});

Route::group(['namespace' => 'App\Modules\Discount\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/discount'], function () {
    Route::get('', 'Discount@index')->name('auth.discount.index')->middleware('can:view,App\Modules\Discount\Model\Discount');
    Route::get('create', 'Discount@create')->name('auth.discount.create')->middleware('can:create,App\Modules\Discount\Model\Discount');
    Route::post('store', 'Discount@store')->name('auth.discount.store')->middleware('can:create,App\Modules\Discount\Model\Discount');
    Route::get('{id}/edit', 'Discount@edit')->name('auth.discount.edit')->middleware('can:update,App\Modules\Discount\Model\Discount');
    Route::post('update/{id}', 'Discount@update')->name('auth.discount.update')->middleware('can:update,App\Modules\Discount\Model\Discount');
    Route::get('delete/{id}', 'Discount@delete')->name('auth.discount.delete')->middleware('can:delete,App\Modules\Discount\Model\Discount');
});

Route::group(['namespace' => 'App\Modules\Worker\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/worker'], function () {
    Route::get('', 'Worker@index')->name('auth.worker.index')->middleware('can:view,App\Modules\Worker\Model\Worker');
    Route::get('create', 'Worker@create')->name('auth.worker.create')->middleware('can:create,App\Modules\Worker\Model\Worker');
    Route::post('store', 'Worker@store')->name('auth.worker.store')->middleware('can:create,App\Modules\Worker\Model\Worker');
    Route::get('{id}/edit', 'Worker@edit')->name('auth.worker.edit')->middleware('can:update,App\Modules\Worker\Model\Worker');
    Route::post('update/{id}', 'Worker@update')->name('auth.worker.update')->middleware('can:update,App\Modules\Worker\Model\Worker');
    Route::get('delete/{id}', 'Worker@delete')->name('auth.worker.delete')->middleware('can:delete,App\Modules\Worker\Model\Worker');
});

Route::group(['namespace' => 'App\Modules\Operation\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/operation'], function () {
    Route::get('', 'Operation@index')->name('auth.operation.index')->middleware('can:view,App\Modules\Operation\Model\Operation');
    Route::get('create', 'Operation@create')->name('auth.operation.create')->middleware('can:create,App\Modules\Operation\Model\Operation');
    Route::post('store', 'Operation@store')->name('auth.operation.store')->middleware('can:create,App\Modules\Operation\Model\Operation');
    Route::get('{id}/edit', 'Operation@edit')->name('auth.operation.edit')->middleware('can:update,App\Modules\Operation\Model\Operation');
    Route::post('update/{id}', 'Operation@update')->name('auth.operation.update')->middleware('can:update,App\Modules\Operation\Model\Operation');
    Route::get('delete/{id}', 'Operation@delete')->name('auth.operation.delete')->middleware('can:delete,App\Modules\Operation\Model\Operation');
});

Route::group(['namespace' => 'App\Modules\Operation\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/operationType'], function () {
    Route::get('{operation_id}', 'OperationType@index')->name('auth.operation.type.index')->middleware('can:view,App\Modules\Operation\Model\OperationType');
    Route::get('create/{operation_id}', 'OperationType@create')->name('auth.operation.type.create')->middleware('can:create,App\Modules\Operation\Model\OperationType');
    Route::post('store/{operation_id}', 'OperationType@store')->name('auth.operation.type.store')->middleware('can:create,App\Modules\Operation\Model\OperationType');
    Route::get('{id}/edit/{operation_id}', 'OperationType@edit')->name('auth.operation.type.edit')->middleware('can:update,App\Modules\Operation\Model\OperationType');
    Route::post('update/{id}/{operation_id}', 'OperationType@update')->name('auth.operation.type.update')->middleware('can:update,App\Modules\Operation\Model\OperationType');
    Route::get('delete/{id}/{operation_id}', 'OperationType@delete')->name('auth.operation.type.delete')->middleware('can:delete,App\Modules\Operation\Model\OperationType');
});

Route::group(['namespace' => 'App\Modules\Operation\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/operationMeasure'], function () {
    Route::get('{operation_type_id}', 'OperationMeasure@index')->name('auth.operation.measure.index')->middleware('can:view,App\Modules\Operation\Model\OperationMeasure');
    Route::get('create/{operation_type_id}', 'OperationMeasure@create')->name('auth.operation.measure.create')->middleware('can:create,App\Modules\Operation\Model\OperationMeasure');
    Route::post('store/{operation_type_id}', 'OperationMeasure@store')->name('auth.operation.measure.store')->middleware('can:create,App\Modules\Operation\Model\OperationMeasure');
    Route::get('{id}/edit/{operation_type_id}', 'OperationMeasure@edit')->name('auth.operation.measure.edit')->middleware('can:update,App\Modules\Operation\Model\OperationMeasure');
    Route::post('update/{id}/{operation_type_id}', 'OperationMeasure@update')->name('auth.operation.measure.update')->middleware('can:update,App\Modules\Operation\Model\OperationMeasure');
    Route::get('delete/{id}/{operation_type_id}', 'OperationMeasure@delete')->name('auth.operation.measure.delete')->middleware('can:delete,App\Modules\Operation\Model\OperationMeasure');
});

Route::group(['namespace' => 'App\Modules\Operation\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/reservation'], function () {
    Route::get('', 'Reservation@index')->name('auth.reservation.index')->middleware('can:view,App\Modules\Operation\Model\Reservation');
    Route::get('create', 'Reservation@create')->name('auth.reservation.create')->middleware('can:create,App\Modules\Operation\Model\Reservation');
    Route::post('store', 'Reservation@store')->name('auth.reservation.store')->middleware('can:create,App\Modules\Operation\Model\Reservation');
    Route::get('{id}/edit', 'Reservation@edit')->name('auth.reservation.edit')->middleware('can:update,App\Modules\Operation\Model\Reservation');
    Route::post('update/{id}', 'Reservation@update')->name('auth.reservation.update')->middleware('can:update,App\Modules\Operation\Model\Reservation');
    Route::get('delete/{id}', 'Reservation@delete')->name('auth.reservation.delete')->middleware('can:delete,App\Modules\Operation\Model\Reservation');
});

Route::group(['namespace' => 'App\Modules\Setting\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/setting'], function () {
    Route::get('', 'Setting@index')->name('auth.setting.index')->middleware('can:view,App\Modules\Setting\Model\Setting');
//    Route::get('create', 'Setting@create')->name('auth.setting.create')->middleware('can:create,App\Modules\Setting\Model\Setting');
//    Route::post('store', 'Setting@store')->name('auth.setting.store')->middleware('can:create,App\Modules\Setting\Model\Setting');
    Route::get('{id}/edit', 'Setting@edit')->name('auth.setting.edit')->middleware('can:update,App\Modules\Setting\Model\Setting');
    Route::post('update/{id}', 'Setting@update')->name('auth.setting.update')->middleware('can:update,App\Modules\Setting\Model\Setting');
//    Route::get('delete/{id}', 'Setting@delete')->name('auth.setting.delete')->middleware('can:delete,App\Modules\Setting\Model\Setting');
});

Route::group(['namespace' => 'App\Modules\Role\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/role'], function () {
    Route::get('', 'Role@index')->name('auth.role.index')->middleware('can:view,App\Modules\Role\Model\Role');
    Route::get('create', 'Role@create')->name('auth.role.create')->middleware('can:view,App\Modules\Role\Model\Role');
    Route::post('store', 'Role@store')->name('auth.role.store')->middleware('can:view,App\Modules\Role\Model\Role');
    Route::get('{id}/edit', 'Role@edit')->name('auth.role.edit')->middleware('can:view,App\Modules\Role\Model\Role');
    Route::post('update/{id}', 'Role@update')->name('auth.role.update')->middleware('can:view,App\Modules\Role\Model\Role');
    Route::get('delete/{id}', 'Role@delete')->name('auth.role.delete')->middleware('can:view,App\Modules\Role\Model\Role');
});

//Route::group(['namespace' => 'App\Modules\Permission\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/permission'], function () {
//    Route::get('', 'Permission@index')->name('auth.permission.index');
//    Route::get('create', 'Permission@create')->name('auth.permission.create');
//    Route::post('store', 'Permission@store')->name('auth.permission.store');
//    Route::get('{id}/edit', 'Permission@edit')->name('auth.permission.edit');
//    Route::post('update/{id}', 'Permission@update')->name('auth.permission.update');
//    Route::get('delete/{id}', 'Permission@delete')->name('auth.permission.delete');
//});

Route::group(['namespace' => 'App\Modules\Order\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/order'], function () {
    Route::get('', 'Order@index')->name('auth.order.index')->middleware('can:view,App\Modules\Order\Model\Order');
    Route::get('select/product', 'Order@selectProduct')->name('auth.order.select.product')->middleware('can:select,App\Modules\Order\Model\Order');
    Route::get('create', 'Order@create')->name('auth.order.create')->middleware('can:create,App\Modules\Order\Model\Order');
    Route::post('store', 'Order@store')->name('auth.order.store')->middleware('can:create,App\Modules\Order\Model\Order');
    Route::get('show/{id}', 'Order@show')->name('auth.order.show')->middleware('can:show,App\Modules\Order\Model\Order');
    Route::get('delete/{id}', 'Order@delete')->name('auth.order.delete')->middleware('can:delete,App\Modules\Order\Model\Order');
});


Route::group(['namespace' => 'App\Modules\Order\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/order'], function () {
    Route::post('cart/add', 'CartController@store')->name('auth.cart.store')->middleware('can:addCart,App\Modules\Order\Model\Order');
    Route::post('cart/delete', 'CartController@delete')->name('auth.cart.delete')->middleware('can:deleteCart,App\Modules\Order\Model\Order');
    Route::get('cart/empty/', 'CartController@empty')->name('auth.cart.empty')->middleware('can:emptyCart,App\Modules\Order\Model\Order');
});

Route::group(['namespace' => 'App\Modules\RolePermission\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/role_permission'], function () {
    Route::get('', 'RolePermission@index')->name('auth.rolePermission.index')->middleware('can:view,App\Modules\RolePermission\Model\RolePermission');
    Route::get('{id}/edit', 'RolePermission@edit')->name('auth.rolePermission.edit')->middleware('can:update,App\Modules\RolePermission\Model\RolePermission');
    Route::post('update/{id}', 'RolePermission@update')->name('auth.rolePermission.update')->middleware('can:update,App\Modules\RolePermission\Model\RolePermission');
});

Route::group(['namespace' => 'App\Modules\Report\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/report/'], function () {

    Route::get('/', 'Report@selectDate')->name('auth.report.select_date')->middleware('can:view,App\Modules\Report\Model\Report');
    Route::get('/get', 'Report@getSelectDate')->name('auth.report.get_select_date')->middleware('can:view,App\Modules\Report\Model\Report');
    Route::get('daily', 'Report@dailyIndex')->name('auth.report.index')->middleware('can:view,App\Modules\Report\Model\Report');
//    Route::get('monthly', 'Report@monthlyIndex')->name('auth.report.index')->middleware('can:viewMonthly,App\Modules\Report\Model\Report');
//    Route::get('annually', 'Report@annuallyIndex')->name('auth.report.index')->middleware('can:viewAnnually,App\Modules\Report\Model\Report');
});

Route::group(['namespace' => 'App\Modules\Schedule\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/schedule'], function () {
    Route::get('/{date}', 'Schedule@index')->name('auth.schedule.index')->middleware('can:view,App\Modules\Schedule\Model\Schedule');
    Route::get('/', 'Schedule@indexGetForm')->name('auth.schedule.form.index')->middleware('can:view,App\Modules\Schedule\Model\Schedule');
    Route::get('edit/{id}/{date}', 'Schedule@edit')->name('auth.schedule.edit')->middleware('can:update,App\Modules\Schedule\Model\Schedule');
    Route::post('update/{id}/{date}', 'Schedule@update')->name('auth.schedule.update')->middleware('can:update,App\Modules\Schedule\Model\Schedule');
    Route::get('delete/{id}/{date}', 'Schedule@delete')->name('auth.schedule.delete')->middleware('can:delete,App\Modules\Schedule\Model\Schedule');
});

Route::group(['namespace' => 'App\Modules\Schedule\Controller', 'middleware' => ['auth','DashboardCheck'],'prefix' => '/auth/reservation'], function () {
    Route::get('today/', 'Reservation@indexForToday')->name('auth.reservation.today.index')->middleware('can:create,App\Modules\Schedule\Model\Schedule');
    Route::post('today/store', 'Reservation@storeForToday')->name('auth.reservation.today.store')->middleware('can:create,App\Modules\Schedule\Model\Schedule');
    Route::get('operation/{id}', 'Reservation@getOperationDataById')->middleware('can:create,App\Modules\Schedule\Model\Schedule');

    Route::get('later/', 'Reservation@indexForLater')->name('auth.reservation.later.index')->middleware('can:create,App\Modules\Schedule\Model\Schedule');
    Route::post('later/store', 'Reservation@storeForLater')->name('auth.reservation.later.store')->middleware('can:create,App\Modules\Schedule\Model\Schedule');
});


Route::get('print',function (){
    $connector = new Mike42\Escpos\PrintConnectors\FilePrintConnector("php://stdout");
    $printer = new Mike42\Escpos\Printer($connector);
    $printer -> text("Hello World!\n");
    $printer -> cut();
    $printer -> close();
});
