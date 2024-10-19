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
Route::get("/post-dashboard", [PostController::class, 'index'])->name("post-dashboard");
//Route::get("/category", [CategoryController::class, 'index'])->name("category");
Route::get("/post-create/{catergories?}", [PostController::class, 'create'])->middleware(['auth', 'verified'])->name("post-create");

Route::get("/contact/{name}", function (string $name) {
    return view("contact", [
        "name" => $name
    ]);
});
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

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
Route::resources([
    "home" => HomeController::class,
    "post" => PostController::class,
    "category" => CategoryController::class,
]);
//Route::resource("category", CategoryController::class);
//#endregion

require __DIR__ . '/auth.php';
