<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Admin\PaymentController;
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
    return redirect()->route('login');
});

Route::middleware(['auth', 'verified'])
->name('admin.')
->prefix('admin')
->group(function() {
    // Le varie rotte di amministrazione
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/apartments', ApartmentController::class);
    Route::resource('apartments', ApartmentController::class)->parameters([
        'apartments' => 'apartment:slug'
    ]);   
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::delete('admin/apartments/{image}/delete', [ImageController::class, 'destroy'])->name('admin.apartments.delete_image');

Route::middleware(['auth'])
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/message', [MessageController::class, 'index'])->name('message.index');
    Route::get('/payment/{apartment:slug}', [PaymentController::class, 'index'])->name('payment.index');
    Route::delete('/message/{id}', [MessageController::class, 'destroy'])->name('message.destroy');
    Route::get('/message/trashed', [MessageController::class, 'trashed'])->name('message.trashed');
    Route::patch('/message/{id}/restore', [MessageController::class, 'restore'])->name('message.restore');
    Route::post('/payment/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');

});

require __DIR__.'/auth.php';
