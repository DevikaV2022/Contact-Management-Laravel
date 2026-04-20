<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\AdminModel;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController; 

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name(name:'register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

//=======================    ADMIN   =================================

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/contact-list', [ContactController::class, 'contactList'])->name('contact');

    Route::get('/manage-contact', [ContactController::class, 'manageContact'])->name('manage');

});

Route::get('/accept/{id}', [AdminController::class, 'accept']);
Route::get('/reject/{id}', [AdminController::class, 'reject']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/delete/{id}', [AdminController::class, 'delete']);

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');