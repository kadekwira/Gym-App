<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrialController;
use App\Http\Controllers\DashboardController;

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
});






// Admin  with prefix
Route::prefix('admin')->group(function(){
  Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin']);
  Route::get('/data-admin',function(){
    return view('admin.dataAdmin.index');
  });
  Route::get('/data-member',function(){
    return view('admin.dataMember.index');
  });
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

