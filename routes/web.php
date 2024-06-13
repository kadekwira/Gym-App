<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrialController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TipeMembershipController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QrCodeController;


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

// User With Not Prefix
Route::get('/', function () {
  return view('user.index');
})->name('dashboard.user');

Route::get('/login', function () {
  return view('user.login');
 } )->name("login");

Route::post('/login',[AuthController::class,'login']);

Route::get('/qrcode/{user}', [QrCodeController::class, 'generate'])->name('qrcode.generate');


Route::get('/profile', [MemberController::class, 'showProfile'])->name('member.profile');




// Admin  with prefix
Route::prefix('admin')->group(function(){
  Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin']);
  Route::resource('/data-admin',AdminController::class);
  Route::resource('/tipe-membership',TipeMembershipController::class);
  Route::resource('/data-member',MemberController::class);
  Route::get('/data-trainer',function(){
    return view('admin.dataTrainer.index');
  });
  Route::resource('/data-trial',TrialController::class);
  Route::get('/data-class',function(){
    return view('admin.dataClass.index');
  });
  Route::get('/data-tips-trick',function(){
    return view('admin.dataTips.index');
  });
  Route::get('/data-review',function(){
    return view('admin.dataReview.index');
  });
  Route::get('/data-notif',function(){
    return view('admin.dataNotif.index');
  });
});



