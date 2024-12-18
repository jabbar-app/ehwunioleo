<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WasteController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/check', function () {
    return view('check');
});

Route::get('/', function () {
    return view('ehwunioleo.auth.login', [
        'title' => 'Login'
    ]);
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index']);


Route::group(['middleware' => ['admin']], function () {
    Route::get('/reports', [ReportController::class, 'index']);
    Route::get('/cost/edit', [ReportController::class, 'cost_edit']);
    Route::post('/cost/edit', [ReportController::class, 'cost_update']);

    Route::get('/source', [SourceController::class, 'create'])->name('source.add');
    Route::post('/source', [SourceController::class, 'store'])->name('source.add');
    Route::get('/source/{id}', [SourceController::class, 'edit'])->name('source.update');
    Route::post('/source/{id}', [SourceController::class, 'update'])->name('source.update');
    Route::delete('/source/{id}', [SourceController::class, 'destroy'])->name('source.delete');

    Route::get('/waste', [WasteController::class, 'index'])->name('waste');
    Route::get('/waste', [WasteController::class, 'create'])->name('waste.add');
    Route::post('/waste', [WasteController::class, 'store'])->name('waste.add');
    Route::get('/waste/edit/{$id}', [WasteController::class, 'edit']);
    Route::post('/waste/edit', [WasteController::class, 'update']);
    Route::get('/capacity/edit', [WasteController::class, 'capacity_edit']);
    Route::post('/capacity/edit', [WasteController::class, 'capacity_update']);
    Route::delete('/waste/{id}', [WasteController::class, 'destroy'])->name('waste.delete');

    Route::get('/provider', [ProviderController::class, 'index'])->name('provider');
    Route::get('/provider/add', [ProviderController::class, 'create'])->name('provider.add');
    Route::post('/provider/add', [ProviderController::class, 'store'])->name('provider.add');
    Route::get('/provider/{id}', [ProviderController::class, 'edit'])->name('provider.update');
    Route::post('/provider/{id}', [ProviderController::class, 'update'])->name('provider.update');
    Route::delete('/provider/{id}', [ProviderController::class, 'destroy'])->name('provider.delete');
    
    Route::get('/department', [DepartmentController::class, 'create'])->name('department.add');
    Route::post('/department', [DepartmentController::class, 'store'])->name('department.add');
    Route::get('/department/{id}', [DepartmentController::class, 'edit'])->name('department.update');
    Route::post('/department/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::delete('/department/{id}', [DepartmentController::class, 'destroy'])->name('department.delete');
    
    Route::get('/settings', [SettingController::class, 'index']);

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/add', [UserController::class, 'add']);
    Route::post('/users/add', [UserController::class, 'store']);
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);
    Route::post('/users/edit', [UserController::class, 'update']);
    Route::get('/users/delete/{id}', [UserController::class, 'delete']);
    Route::post('/users/delete', [UserController::class, 'destroy']);
});

Route::get('/schedule', [ScheduleController::class, 'index']);
Route::get('/schedule/detail/{id}', [ScheduleController::class, 'detail'])->name('schedule.detail');
Route::post('/schedule/detail/{id}', [ScheduleController::class, 'update'])->name('schedule.detail');
Route::get('/schedule/set/{id}', [ScheduleController::class, 'show'])->name('schedule.set');
Route::post('/schedule/set/{id}', [ScheduleController::class, 'set'])->name('schedule.set');
Route::get('/schedule/complete/{id}', [ScheduleController::class, 'confirm'])->name('schedule.complete');;
Route::post('/schedule/complete/{id}', [ScheduleController::class, 'complete'])->name('schedule.complete');;
Route::get('/schedule/create', [ScheduleController::class, 'create']);
Route::post('/schedule/create', [ScheduleController::class, 'store']);
Route::get('/schedule/add/checkWaste', [ScheduleController::class, 'check']);
Route::get('/schedule/{id}', [ScheduleController::class, 'detail'])->name('schedule.resubmit');
Route::post('/schedule/{id}', [ScheduleController::class, 'resubmit'])->name('schedule.resubmit');
Route::get('/request/detail', [ScheduleController::class, 'request_detail']);
Route::post('/request/detail', [ScheduleController::class, 'request_update']);
Route::post('/request/delete/{id}', [ScheduleController::class, 'delete'])->name('schedule.delete');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/send-request', [MailController::class, 'request']);
Route::get('/send-schedule', [MailController::class, 'schedule']);
Route::get('/mail', function () {
    return view('ehwunioleo.mail.index', [
        'title' => 'Mail',
    ]);
});
