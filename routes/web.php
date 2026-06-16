<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShortUrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/companies/create', [CompanyController::class, 'create']);
    Route::post('/companies', [CompanyController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/invitations/create', [InvitationController::class, 'create']);
    Route::post('/invitations', [InvitationController::class, 'store']);
});
Route::get('/accept_invitation/{token}', [InvitationController::class, 'showAcceptForm']);
Route::post('/accept_invitation/{token}', [InvitationController::class, 'accept']);

Route::middleware('auth')->group(function () {
    Route::get('/short-urls/create', [ShortUrlController::class, 'create']);
    Route::post('/short-urls', [ShortUrlController::class, 'store']);
    Route::get('/short-urls', [ShortUrlController::class, 'index']);
});

// Route::get('/{short_code}', [ShortUrlController::class, 'redirect']);

Route::get('/r/{short_code}', [ShortUrlController::class, 'redirect']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
