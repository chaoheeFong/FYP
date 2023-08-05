<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');

Route::get('/bookings', [BookingController::class, 'index']);

Route::get('/upload', [PhotoController::class, 'create']);
Route::post('/upload', [PhotoController::class, 'store']);

//Booking Section
Route::get('/booking', [BookingController::class, 'index']);
Route::get('/booking/form', [BookingController::class, 'showForm'])->name('booking.form');
Route::get('/booking/submit', [BookingController::class, 'submitForm'])->name('booking.submit');
// Show the edit form
Route::get('/booking/edit/{id}', [BookingController::class, 'editForm'])->name('booking.edit');

// Handle the update form submission
Route::put('/booking/update/{id}', [BookingController::class, 'updateForm'])->name('booking.update');



//Subscription Section
Route::get('/subscription', [SubscriptionController::class, 'index']);

//Feedback Section
Route::get('/feedback', [FeedbackController::class, 'index']);
Route::post('/feedback', [FeedbackController::class, 'submitForm'])->name('feedback.submit');


//Admin
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/user-management', [AdminController::class, 'userManagement'])->name('user.management');
Route::get('/booking-management', [AdminController::class, 'bookingManagement'])->name('booking.management');
Route::get('/feedback-management', [AdminController::class, 'feedbackManagement'])->name('feedback.management');
Route::get('/cat-status-notification', [AdminController::class, 'catStatusNotification'])->name('cat.status.notification');


