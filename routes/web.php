<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostDashboardController;


Route::view('/', 'home');

Route::get("/rules", [HomeController::class, 'rules'])->name("rules");

Route::get("/post-dashboard", [PostDashboardController::class, 'index'])->name("post-dashboard");
Route::get("/post-create", [PostDashboardController::class, 'create'])->middleware(['auth', 'verified'])->name("post-create");

Route::get("/contact/{name}", function (string $name) {
    return view("contact", [
        "name" => $name
    ]);
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
