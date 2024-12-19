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
    return view('auth.login', [
        'title' => 'Login'
    ]);
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::group(['middleware' => ['admin']], function () {
    Route::get('/cost/edit', [ReportController::class, 'cost_edit']);
    Route::post('/cost/edit', [ReportController::class, 'cost_update']);

    Route::get('/capacity/edit', [WasteController::class, 'capacity_edit']);
    Route::post('/capacity/edit', [WasteController::class, 'capacity_update']);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');

    Route::get('/users/roles', [UserController::class, 'roles'])->name('roles');
    Route::post('/users/roles/update', [UserController::class, 'rolesUpdate'])->name('roles.update');

    Route::prefix('schedules')->group(function () {
        Route::get('/detail/{id}', [ScheduleController::class, 'detail'])->name('schedule.detail');
        Route::post('/detail/{id}', [ScheduleController::class, 'update'])->name('schedule.detail');
        Route::get('/set/{id}', [ScheduleController::class, 'show'])->name('schedule.set');
        Route::post('/set/{id}', [ScheduleController::class, 'set'])->name('schedule.set');
        Route::get('/complete/{id}', [ScheduleController::class, 'confirm'])->name('schedule.complete');;
        Route::post('/complete/{id}', [ScheduleController::class, 'complete'])->name('schedule.complete');;
        Route::get('/add/checkWaste', [ScheduleController::class, 'check']);
        Route::get('/{id}', [ScheduleController::class, 'detail'])->name('schedule.resubmit');
        Route::post('/{id}', [ScheduleController::class, 'resubmit'])->name('schedule.resubmit');
        Route::get('/request/detail', [ScheduleController::class, 'request_detail']);
        Route::post('/request/detail', [ScheduleController::class, 'request_update']);
    });

    Route::resource('users', UserController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('wastes', WasteController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('providers', ProviderController::class);
    Route::resource('sources', SourceController::class);
    Route::resource('departments', DepartmentController::class);
});



Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/send-request', [MailController::class, 'request']);
Route::get('/send-schedule', [MailController::class, 'schedule']);
Route::get('/mail', function () {
    return view('ehwunioleo.mail.index', [
        'title' => 'Mail',
    ]);
});
