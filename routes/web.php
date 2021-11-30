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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('change_password', 'ChangePasswordController@forgot')->name('forgot_password');
Auth::routes();

// Route Admin
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/home',				'admin\HomeController@index')->name('admin.home');
    // FPB
    Route::get('fpb', 'admin\FpbController@index')->name('admin.fpb_index');
    Route::get('fpb/detail/{id}', 'admin\FpbController@show')->name('admin.fpb_show');
    Route::post('fpb/create', 'admin\FpbController@create')->name('admin.fpb_store');
    Route::get('fpb/edit/{id}', 'admin\FpbController@edit')->name('admin.fpb_edit');
    Route::post('fpb/update/{id}', 'admin\FpbController@update')->name('admin.fpb_update');
    Route::get('fpb/delete/{id}', 'admin\FpbController@delete')->name('admin.fpb_delete');

    // record FPB /proses permintaan
    Route::get('record_fpb', 'admin\RecordController@index')->name('admin.fpb_record');
    Route::post('record_fpb/info','admin\Order_request@create')->name('admin.create_info_fpb');
    Route::get('record_fpb/detail/{id}', 'admin\RecordController@detail')->name('admin.detail_record');
    // approve record
    Route::get('approve/manager/{id}', 'admin\RecordController@men_approve')->name('admin.men_approve');
    Route::get('approve/manager kantor/{id}', 'admin\RecordController@approve')->name('admin.approve');
    Route::get('decline/manager/{id}', 'admin\RecordController@men_decline')->name('admin.declinementer');
    Route::get('decline/manager_kantor/{id}', 'admin\RecordController@decline')->name('admin.declinemenkan');
    Route::post('decline/notice/post/{id}', 'admin\RecordController@post_declinementer')->name('admin.declinementer_post');
    Route::post('decline/manager_kantor/post/{id}', 'admin\RecordController@post_declinemenkan')->name('admin.declinemenkan_post');
    
    // approve by menu 
    Route::get('approve', 'admin\ApproveController@index')->name('admin.menu.approve');
    Route::get('approve_manager/{id}', 'admin\ApproveController@approve_menter')->name('admin.approve_menter');
    Route::get('approve_manager_kantor/{id}', 'admin\ApproveController@approve_menkan')->name('admin.approve_menkan');
    Route::get('decline_manager/{id}', 'admin\ApproveController@decline_menter')->name('admin.decline_menter');
    Route::get('decline_manager_kantor/{id}', 'admin\ApproveController@decline_menkan')->name('admin.decline_menkan');
    Route::post('decline/post/{id}', 'admin\ApproveController@decline_post')->name('admin.decline_post');
    
    // View PDF FPB
    Route::get('fpb_pdf/view/', 'admin\RecordController@fpb')->name('admin.fpb_pdf');

    // Category
    Route::get('category', 'admin\CategoryController@index')->name('admin.category');
    Route::post('category/create', 'admin\CategoryController@create')->name('admin.create_category');
    Route::get('category/edit/{id}', 'admin\CategoryController@edit')->name('admin.edit_category');
    Route::post('category/update/{id}', 'admin\CategoryController@update')->name('admin.update_category');
    Route::get('category/delete/{id}', 'admin\CategoryController@delete')->name('admin.delete_category');
    
    // Department
    Route::get('department', 'admin\DepartmentController@index')->name('admin.department');
    Route::get('department/edit/{id}' , 'admin\DepartmentController@edit')->name('admin.edit_department');
    Route::post('department/update/{id}', 'admin\DepartmentController@update')->name('admin.update_department');
    Route::get('department/delete/{id}' , 'admin\DepartmentController@destroy')->name('admin.delete_department');
    Route::post('department/create/', 'admin\DepartmentController@create')->name('admin.create_department');

    Route::get('division', 'admin\DivisionController@index')->name('admin.division');
    Route::post('division/create', 'admin\DivisionController@create')->name('admin.create_division');
    Route::get('division/edit/{id}', 'admin\DivisionController@edit')->name('admin.edit_division');
    Route::post('division/update/{id}', 'admin\DivisionController@update')->name('admin.update_division');

    // upload data PR dan PO
    Route::get('upload_data_pr_po', 'admin\UploadPRPOController@index')->name('admin.upload.prpo');


    // all users
    Route::get('users', 'admin\ManagementUserController@index')->name('admin.users');
    Route::post('users/create', 'admin\ManagementUserController@create')->name('admin.create_users');
    Route::get('users/edit/{id}', 'admin\ManagementUserController@edit')->name('admin.edit_users');
    Route::post('users/update/{id}', 'admin\ManagementUserController@update')->name('admin.update_user');
    Route::get('users/delete/{id}', 'admin\ManagementUserController@delete')->name('admin.delete_users');

    // detail users
    Route::get('users/detail/all', 'admin\ManagementUserController@detail')->name('admin.detail_users');
    
    // role user
    Route::get('roles', 'admin\RolesController@index')->name('admin.roles');
    Route::get('roles/edit/{id}', 'admin\RolesController@edit')->name('admin.edit_roles');
    Route::post('roles/update/{id}', 'admin\RolesController@update')->name('admin.update_roles');
    Route::post('roles/create', 'admin\RolesController@create')->name('admin.create_roles');
    Route::get('roles/delete/{id}', 'admin\RolesController@destroy')->name('admin.delete_roles');


});

// Route
Route::group(['middleware' => 'staff', 'prefix' => 'staff'], function () {

    Route::get('/home','staff\HomeController@index')->name('staff.home');

    // route Permintaan
    Route::get('permintaan/','staff\PermintaanController@index')->name('staff.permintaan');
    Route::get('permintaan/detail/{id}','staff\PermintaanController@show')->name('staff.fpb_show');

    // proses permintaan
    Route::get('process', 'staff\ProcessController@index')->name('staff.process');
    Route::get('process/fpb/{id}', 'staff\ProcessController@Process')->name('staff.process_fpb');
    Route::post('process/fpb/post', 'staff\ProcessController@post_process')->name('staff.post_process');


});

Route::group(['middleware' => 'wherehouse', 'prefix' => 'manager'], function () {

    Route::get('/home','wherehouse\HomeController@index')->name('wh.home');

    
    


});
