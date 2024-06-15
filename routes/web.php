<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrialController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TipeMembershipController;

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


Route::post('/login', [AuthController::class, 'login']);





// Admin  with prefix
Route::prefix('admin')->group(function () {
  Route::get('/check_membership', [MemberController::class, 'checkMembership'])->name('checkMembership');
  Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin']);
  Route::resource('/data-admin', AdminController::class);
  Route::resource('/tipe-membership', TipeMembershipController::class);
  Route::resource('/data-member', MemberController::class);
  Route::resource('/data-trial', TrialController::class);
  Route::resource('/data-trainer',TrainerController::class);
  
  Route::get('/data-class', function () {
    return view('admin.dataClass.index');
  });
  Route::get('/data-tips-trick', function () {
    return view('admin.dataTips.index');
  });
  Route::get('/data-review', function () {
    return view('admin.dataReview.index');
  });
  Route::get('/data-notif', function () {
    return view('admin.dataNotif.index');
  });

  // Information Gym
  Route::get('/information-gym', [InformationController::class, 'index'])->name('informationGym');
  Route::get('/information-gym/create', [InformationController::class, 'create'])->name('createInformation');
  Route::post('/information-gym/create', [InformationController::class, 'store'])->name('saveInformation');
  Route::get('/information-gym/edit/{informationgym}', [InformationController::class, 'edit'])->name('editInformation');
  Route::put('/information-gym/edit/{informationgym}', [InformationController::class, 'update'])->name('updateInformation');
  Route::get('/information-gym/destroy/{infomationgym}', [InformationController::class, 'destroy'])->name('deleteInformation');
});

