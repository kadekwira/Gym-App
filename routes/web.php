<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\TrialController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\QrCodeController;

use App\Http\Controllers\TrainerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FreeTrialController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\BookingClassController;
use App\Http\Controllers\KategoriClassController;
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

Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/qrcode/{user}', [QrCodeController::class, 'generate'])->name('qrcode.generate');
Route::get('/profile', [MemberController::class, 'showProfile'])->name('member.profile');

Route::get('/class', [ClassController::class, 'index'])->name('class.index');
Route::post('/class/booking/{id}', [ClassController::class, 'booking'])->name('class.booking');


Route::get('/freetrial', [FreeTrialController::class, 'index'])->name('freetrial.index');
Route::post('/freetrial/store', [FreeTrialController::class, 'store'])->name('freetrial.store');



// Admin  with prefix
Route::prefix('admin')->group(function () {
  Route::get('/check_membership', [MemberController::class, 'checkMembership'])->name('checkMembership');
  Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin']);
  Route::resource('/data-admin', AdminController::class);
  Route::resource('/tipe-membership', TipeMembershipController::class);
  Route::resource('/data-member', MemberController::class);
  Route::resource('/data-trial', TrialController::class);
  Route::resource('/data-trainer',TrainerController::class);
  Route::resource('/data-class',KelasController::class);
  Route::resource('/tipe-class',KategoriClassController::class);
  
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



  // Booking Class
  Route::get('/booking', [BookingClassController::class, 'index'])->name('booking.index');
  Route::get('/booking/class/{id}', [BookingClassController::class, 'showMemberClass'])->name('booking.showMemberClass');
  Route::get('/booking/class/create/{id}', [BookingClassController::class, 'createMemberClass'])->name('booking.createMemberClass');
  Route::post('/booking/class/store', [BookingClassController::class, 'store'])->name('booking.store');
});



