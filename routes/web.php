<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use \App\Http\Controllers\CategoryController;


//#region Route::view
Route::view('/', 'dashboard');

//#endregion

//#region Route::get
Route::get("/rules", [HomeController::class, 'rules'])->name("rules");
//->middleware(['auth', 'verified'])

//Route::get("/contact/{name}", function (string $name) {
//    return view("contact", [
//        "name" => $name
//    ]);
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//#endregion

//#region middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//#endregion

//#region Route::resource
Route::resource("posts", PostController::class);
Route::resource("category", CategoryController::class);
//Route::resource("category", CategoryController::class);
//#endregion

require __DIR__ . '/auth.php';
