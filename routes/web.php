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

Auth::routes(['verify' => true]);

Route::resource('/','HomeController');

// Discord Login
Route::get('/login/discord', 'Auth\DiscordController@redirect')->name('login.discord');
Route::get('/login/discord/callback', 'Auth\DiscordController@handle');

Auth::routes();

Route::name('contact.')->group(function () {

    Route::resource('contact', 'ContactController');
    Route::post('contact/comments', 'ContactController@comment')->middleware(['auth'])->name('contact.comment');

});

Route::name('admin.')->group( function(){

    Route::resource('contact-tickets', 'Admin\ContactFormsController')->middleware(['auth']);
    Route::resource('contact-statuses', 'Admin\ContactStatusesController')->middleware(['auth']);
    Route::resource('contact-messages', 'Admin\ContactMessagesController')->middleware(['auth']);
    Route::post('contact-tickets/comment', 'Admin\ContactFormsController@comment')->middleware(['auth'])->name('contact-ticket.comment');

    Route::resource('staff', 'Admin\StaffController')->middleware(['auth']);

    Route::resource('permissions', 'Admin\PermissionController')->middleware(['auth']);

    Route::resource('roles', 'Admin\RoleController')->middleware(['auth']);

    Route::resource('users', 'Admin\UsersController')->middleware(['auth']);
});
