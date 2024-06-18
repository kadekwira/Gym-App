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

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FreeTrialController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BookingClassController;
use App\Http\Controllers\KategoriClassController;
use App\Http\Controllers\TipeMembershipController;
use App\Http\Controllers\ActivityMemberController;




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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/qrcode', [QrCodeController::class, 'generate'])->name('qrcode.generate');
Route::get('/profile', [MemberController::class, 'showProfile'])->name('member.profile');
Route::get('/class', [ClassController::class, 'index'])->name('class.index');
Route::post('/class/booking/{id}', [ClassController::class, 'booking'])->name('class.booking');

Route::get('/trainer', [TrainerController::class, 'getTrainer'])->name('trainer.index');
Route::get('/freetrial', [FreeTrialController::class, 'index'])->name('freetrial.index');
Route::post('/freetrial/store', [FreeTrialController::class, 'store'])->name('freetrial.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register.member');
Route::post('/save-step1', [RegisterController::class, 'saveStep1'])->name('saveStep1');
Route::post('/midtrans/callback', [RegisterController::class, 'midtransCallback'])->name('midtransCallback');


// Admin  with prefix
Route::prefix('admin')->group(function () {
  Route::get('/check_membership', [MemberController::class, 'checkMembership'])->name('checkMembership');
  Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');
  Route::resource('/data-admin', AdminController::class);
  Route::resource('/tipe-membership', TipeMembershipController::class);
  Route::resource('/data-member', MemberController::class);
  Route::resource('/data-trial', TrialController::class);
  Route::resource('/data-trainer',TrainerController::class);
  Route::resource('/data-class',KelasController::class);
  Route::resource('/tipe-class',KategoriClassController::class);
  Route::get('/data-review', function () {
    return view('admin.dataReview.index');
  });

  // Information Gym
  Route::get('/information-gym', [InformationController::class, 'index'])->name('informationGym');
  Route::get('/information-gym/create', [InformationController::class, 'create'])->name('createInformation');
  Route::post('/information-gym/create', [InformationController::class, 'store'])->name('saveInformation');
  Route::get('/information-gym/edit/{informationgym}', [InformationController::class, 'edit'])->name('editInformation');
  Route::put('/information-gym/edit/{informationgym}', [InformationController::class, 'update'])->name('updateInformation');
  Route::get('/information-gym/destroy/{infomationgym}', [InformationController::class, 'destroy'])->name('deleteInformation');

  // Activity Member
  Route::get('/activity-member', [ActivityMemberController::class, 'index'])->name('activityMember');
  Route::get('/activity-member/create', [ActivityMemberController::class, 'create'])->name('createActivity');
  Route::post('/activity-member/create', [ActivityMemberController::class, 'store'])->name('saveActivity');
  Route::get('/activity-member/edit', [ActivityMemberController::class, 'edit'])->name('editActivity');


  // Booking Class
  Route::get('/booking', [BookingClassController::class, 'index'])->name('booking.index');
  Route::get('/booking/class/{id}', [BookingClassController::class, 'showMemberClass'])->name('booking.showMemberClass');
  Route::get('/booking/class/create/{id}', [BookingClassController::class, 'createMemberClass'])->name('booking.createMemberClass');
  Route::post('/booking/class/store', [BookingClassController::class, 'store'])->name('booking.store');


  // Transaction
  Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
});



