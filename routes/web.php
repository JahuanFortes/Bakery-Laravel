<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RulesController;

Route::view('/', 'home');

Route::get("/rules", [RulesController::class, 'index'])->name("rules");
//Route::get("/rules", function () {
//    return view("rules");
//});
Route::get("/contact/{name}", function (string $name) {
    return view("contact", [
        "name" => $name
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
