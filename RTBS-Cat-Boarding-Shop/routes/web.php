<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminAuthController;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');

Route::get('/bookings', [BookingController::class, 'index'])->middleware('auth');

Route::get('/upload', [PhotoController::class, 'create']);
Route::post('/upload', [PhotoController::class, 'store']);

//Booking Section
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::get('/createBooking', [BookingController::class, 'showBookingForm'])->name('booking.form');
Route::post('/createBooking', [BookingController::class, 'submitBookingForm'])->name('booking.submit');
Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
Route::get('/bookingConfirmation', [BookingController::class, 'confirmation'])->name('booking.confirmation');
Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');

//Subscription Section
Route::get('/subscription', [SubscriptionController::class, 'index'])->middleware('auth');

//Feedback Section
Route::get('/feedback', [FeedbackController::class, 'showForm'])->name('feedback.form');
Route::post('/feedback', [FeedbackController::class, 'submitForm'])->name('feedback.submit');

//Admin

Route::group(['middleware' => 'auth:admin'], function () {

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/user-management', [AdminController::class, 'userManagement'])->name('user.management');
Route::get('/booking-management', [AdminController::class, 'bookingManagement'])->name('booking.management');
Route::get('/feedback-management', [AdminController::class, 'feedbackManagement'])->name('feedback.management');
Route::get('/cat-status-notification', [AdminController::class, 'catStatusNotification'])->name('cat.status.notification');

});

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);


//profile
Route::get('/profile', [UserController::class, 'index'])->name('user')->middleware('auth');