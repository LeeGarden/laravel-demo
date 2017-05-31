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

Route::get('test',function(){
    return view('frontend.mail.emailpay');
});

Route::get('/',['as'=>'frontend.home','uses'=>'HomeController@getIndex']);
Route::get('home',['as'=>'frontend.home','uses'=>'HomeController@getIndex']);
Route::get('about',['as'=>'frontend.about','uses'=>'HomeController@getAboutUs']);
Route::get('booking',['as'=>'frontend.booking','uses'=>'HomeController@getBookingPage']);
Route::post('booking',['as'=>'frontend.booking','uses'=>'HomeController@returnAvaibleRoom']);
Route::get('booking/{dateIn}/{dateOut}/{id_roomtype}',['as'=>'frontend.booking','uses'=>'HomeController@getBookingRoom']);
Route::post('booking/{dateIn}/{dateOut}/{id_roomtype}',['as'=>'frontend.booking','uses'=>'HomeController@postBookingRoom']);
Route::get('rooms',['as'=>'frontend.rooms','uses'=>'HomeController@getRoomsPage']);
Route::get('rooms/{slug}',['as'=>'frontend.rooms','uses'=>'HomeController@getDetailRoom']);

Route::get('donebooking',['as'=>'frontend.donebooking','uses'=>'HomeController@getSuccess']);



Route::get('admin/logout',['as'=>'admin.logout','uses'=>'Auth\LoginController@getLogout']);









Route::group(['prefix'=>'admin','middleware'=>'auth'], function () {
    
    Route::get('dashboard',['as'=>'admin.booking.getList','uses'=>'BillController@getListBooking']);
    
    Route::group(['prefix'=>'staff'], function () {
        Route::get('/',['as'=>'admin.staff.getList','uses'=>'StaffController@getListStaff']);
        Route::get('list',['as'=>'admin.staff.getList','uses'=>'StaffController@getListStaff']);
        Route::get('add',['as'=>'admin.staff.getAdd','uses'=>'StaffController@getAddStaff']);
    	Route::post('add',['as'=>'admin.staff.postAdd','uses'=>'StaffController@postAddStaff']);
        Route::get('edit/{id}',['as'=>'admin.staff.getEdit','uses'=>'StaffController@getEditStaff']);
        Route::post('edit/{id}',['as'=>'admin.staff.postEdit','uses'=>'StaffController@postEditStaff']);
        Route::get('delete/{id}',['as'=>'admin.staff.getDelete','uses'=>'StaffController@getDeleteStaff']);
        
    });
    Route::group(['prefix'=>'customer'], function () {
        Route::get('list',['as'=>'admin.customer.getList','uses'=>'CustomerController@getList']);        
        Route::get('view/{id}',['as'=>'admin.customer.getInfo','uses'=>'CustomerController@getInfo']);
        
    });
    Route::group(['prefix'=>'booking'], function () {
        Route::post('chooseroom/{id}',['as'=>'admin.booking.getEdit','uses'=>'BillController@postChooseRoom']);
        Route::get('list',['as'=>'admin.booking.getList','uses'=>'BillController@getListBooking']);
        Route::get('edit/{id}',['as'=>'admin.booking.getEdit','uses'=>'BillController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.booking.postEdit','uses'=>'BillController@postEdit']);
        Route::get('cancel/{id}',['as'=>'admin.booking.getCancelBill','uses'=>'BillController@getCancelBill']);
        
    });
    Route::group(['prefix'=>'bill'], function () {
        Route::get('list',['as'=>'admin.bill.getList','uses'=>'BillController@getListBill']);
        Route::get('edit/{id}',['as'=>'admin.booking.getEdit','uses'=>'BillController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.booking.postEdit','uses'=>'BillController@postEdit']);
        Route::post('addservice/{idbill}',['as'=>'admin.booking.postAddService','uses'=>'BillController@postAddService']);
        Route::get('del/{id}',['as'=>'admin.bill.delUseService','uses'=>'BillController@delUseService']);
        Route::get('view/{id}',['as'=>'admin.bill.viewDetailBill','uses'=>'BillController@viewDetailBill']);
        Route::get('payment/{id}',['as'=>'admin.bill.paymentBill','uses'=>'BillController@paymentBill']);
        
    });
    Route::group(['prefix'=>'role'], function () {
        Route::get('/',['as'=>'admin.role.getList','uses'=>'StaffController@getListRole']);
        Route::get('list',['as'=>'admin.role.getList','uses'=>'StaffController@getListRole']);
        Route::get('add',['as'=>'admin.role.getAdd','uses'=>'StaffController@getAddRole']);
        Route::post('add',['as'=>'admin.role.postAdd','uses'=>'StaffController@postAddRole']);
        Route::get('edit/{id}',['as'=>'admin.role.getEdit','uses'=>'StaffController@getEditRole']);
        Route::post('edit/{id}',['as'=>'admin.role.postEdit','uses'=>'StaffController@postEditRole']);
        Route::get('delete/{id}',['as'=>'admin.role.getDelete','uses'=>'StaffController@getDeleteRole']);
        
    });
    Route::group(['prefix'=>'room'], function () {
        Route::get('/',['as'=>'admin.room.getList','uses'=>'RoomController@getList']);
        Route::get('list',['as'=>'admin.room.getList','uses'=>'RoomController@getList']);
        Route::get('add',['as'=>'admin.room.getAdd','uses'=>'RoomController@getAdd']);
        Route::post('add',['as'=>'admin.room.postAdd','uses'=>'RoomController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.room.getEdit','uses'=>'RoomController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.room.postEdit','uses'=>'RoomController@postEdit']);
        Route::get('delete/{id}',['as'=>'admin.room.getDelete','uses'=>'RoomController@getDelete']);
        
    });
    Route::group(['prefix'=>'roomtype'], function () {
        Route::get('/',['as'=>'admin.roomtype.getList','uses'=>'RoomTypeController@getList']);
        Route::get('list',['as'=>'admin.roomtype.getList','uses'=>'RoomTypeController@getList']);
        Route::get('add',['as'=>'admin.roomtype.getAdd','uses'=>'RoomTypeController@getAdd']);
        Route::post('add',['as'=>'admin.roomtype.postAdd','uses'=>'RoomTypeController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.roomtype.getEdit','uses'=>'RoomTypeController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.roomtype.postEdit','uses'=>'RoomTypeController@postEdit']);
        Route::get('delete/{id}',['as'=>'admin.roomtype.getDelete','uses'=>'RoomTypeController@getDelete']);
        
    });
    Route::group(['prefix'=>'service'], function () {
        Route::get('/',['as'=>'admin.service.getList','uses'=>'ServiceController@getList']);
        Route::get('list',['as'=>'admin.service.getList','uses'=>'ServiceController@getList']);
        Route::get('add',['as'=>'admin.service.getAdd','uses'=>'ServiceController@getAdd']);
    	Route::post('add',['as'=>'admin.service.postAdd','uses'=>'ServiceController@postAdd']);
        Route::get('edit/{id}',['as'=>'admin.service.getEdit','uses'=>'ServiceController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.service.postEdit','uses'=>'ServiceController@postEdit']);
        Route::get('delete/{id}',['as'=>'admin.service.getDelete','uses'=>'ServiceController@getDelete']);
        
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index');
