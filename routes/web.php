<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Event\Detail as EventDetail;
use App\Http\Livewire\Home;
use App\Http\Livewire\Status\Status;
use App\Http\Livewire\Society\Index as Society;
use App\Models\User;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/status/{id}', Status::class)->middleware('auth');

Route::get('/users', Society::class)->middleware('auth');

Route::get('/event', function () {
    return view('event');
});

Route::get('/event/{slug}', EventDetail::class);

Route::get('/finance', function () {
    return view('finance');
});

Route::get('/community-guidelines', function(){
    return view('community-guidelines');
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'
])->group(function () {
    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('dashboard');
});

Route::middleware(['auth', 'role:admin,super-admin', 'verified'])->group(function(){
    Route::get('/admin', [DashboardController::class, 'index']);
    
    
    Route::resource('/admin/event', EventController::class)->except('show');
    Route::resource('/admin/finance', FinanceController::class)->except('show');
    Route::resource('/admin/member', UserController::class)->except(['show', 'edit', 'update']);
    
});

Route::middleware(['auth', 'role:super-admin', 'verified'])->group(function(){
    Route::get('/admin/member/export', [UserController::class, 'export_user']);
    Route::post('/admin/member/import-excel', [UserController::class, 'import_excel']);
    
    Route::get('/admin/member/{id}/edit', [UserController::class, 'edit'])->name('member.edit');
    Route::put('/admin/member/{id}', [UserController::class, 'update'])->name('member.update');
    Route::post('/activate/{user}', [UserController::class, 'activate'])->name('member.activate');
    Route::put('/admin/role-update/{user}', [UserController::class, 'changeRole'])->name('role.update');
});


