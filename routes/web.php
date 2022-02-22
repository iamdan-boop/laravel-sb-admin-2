<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientBillsContoller;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\PushNotificationController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserAvatarController;
use App\Models\Client;
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

Route::redirect('/', 'login');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}/edit', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}/update', [ClientsController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');

    Route::get('/bills', [ClientBillsContoller::class, 'index'])->name('clients.bills');
    Route::get('/calculate-bill/{client}', [ClientBillsContoller::class, 'create'])->name('clients.bills.create');
    Route::post('/calculate-bills/{client}/calculate', [ClientBillsContoller::class, 'store'])->name('clients.bills.store');
    Route::get('/bills/{client}', [ClientBillsContoller::class, 'show'])->name('clients.bills.show');
    Route::put('/bills/{bill}/update', [ClientBillsContoller::class, 'update'])->name('clients.bills.update');
    Route::get('/bill/{bill}/print', [ClientBillsContoller::class, 'print'])->name('clients.bills.print');
    Route::delete('/bill/{bill}/delete', [ClientBillsContoller::class, 'destroy'])->name('clients.bill.destroy');


    Route::get('/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('/admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    Route::get('/admins/{user}/edit', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('/admin/{user}/update', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('/admin/{user}', [AdminController::class, 'destroy'])->name('admins.destroy');


    Route::get('/push-notification', [PushNotificationController::class, 'index'])->name('push-notification.index');
    Route::post('/push-notification', [PushNotificationController::class, 'store'])->name('push-notication.store');

    Route::post('/upload', [UploadController::class, 'store'])->name('upload');
    Route::post('/upload-avatar', [UserAvatarController::class, 'store'])->name('user.avatar.store');


    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
});
