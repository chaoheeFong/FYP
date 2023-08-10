<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
Route::get('/booking', [BookingController::class, 'index'])->middleware('auth');
Route::get('/booking/form', [BookingController::class, 'showForm'])->name('booking.form')->middleware('auth');
Route::get('/booking/submit', [BookingController::class, 'submitForm'])->name('booking.submit')->middleware('auth');
// Show the edit form
Route::get('/booking/edit/{id}', [BookingController::class, 'editForm'])->name('booking.edit')->middleware('auth');

// Handle the update form submission
Route::put('/booking/update/{id}', [BookingController::class, 'updateForm'])->name('booking.update')->middleware('auth');



//Subscription Section
Route::get('/subscription', [SubscriptionController::class, 'index'])->middleware('auth');

//Feedback Section
Route::get('/feedback', [FeedbackController::class, 'index'])->middleware('auth');
Route::post('/feedback', [FeedbackController::class, 'submitForm'])->name('feedback.submit')->middleware('auth');


//Admin
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/user-management', [AdminController::class, 'userManagement'])->name('user.management');
Route::get('/booking-management', [AdminController::class, 'bookingManagement'])->name('booking.management');
Route::get('/feedback-management', [AdminController::class, 'feedbackManagement'])->name('feedback.management');
Route::get('/cat-status-notification', [AdminController::class, 'catStatusNotification'])->name('cat.status.notification');

//profile
Route::get('/profile', [UserController::class, 'index'])->name('user')->middleware('auth');