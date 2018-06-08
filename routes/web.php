<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/dashboard');
});

Auth::routes();

Route::get('activate/{token}', 'ActivateUserController');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $data = [
            'pageTitle' => __('Dashboard'),
            'pageHeader' => __('Dashboard'),
            'pageSubHeader' => __('All stats summary in one page')
        ];
        return view('dashboard.index', $data);
    })->name('dashboard');

    Route::resource('/rooms', 'RoomController');
    Route::post('/bookings/search', 'BookingController@search')->name('bookings.search');
    Route::post('/bookings/cancel', 'BookingController@cancel')->name('bookings.cancel');
    Route::resource('/bookings', 'BookingController');
    Route::resource('/users', 'UserController');

    Route::resource('/security', 'SecurityController');
    Route::resource('/options','OptionalController');

    Route::get('change-password', 'ChangePasswordController@show')->name('change-password.show');
    Route::put('change-password', 'ChangePasswordController@update')->name('change-password.update');
});

Route::prefix('datatables')->group(function () {
    Route::get('rooms', 'DatatableController@getRooms')->name('datatables.rooms');
    Route::get('bookings', 'DatatableController@getBookings')->name('datatables.bookings');
    Route::get('users', 'DatatableController@getUsers')->name('datatables.users');
    Route::get('roles', 'DatatableController@getRoles')->name('datatables.roles');
});

Route::prefix('fullcalendar')->group(function () {
    Route::get('room/{id}', 'FullcalendarController@getBookingByRoomId')->name('fullcalendar.room');
});

Route::get('mybookings','MyBookingController@show')->name('mybookings')->middleware('auth');


Route::post('test','OptionalController@addColumn');