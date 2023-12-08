<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // MyRouter

    Route::prefix("developers")->group(function () {
        Route::get("/", [DeveloperController::class, 'index'])->name("developer.index");
        Route::get("/create", [DeveloperController::class, 'create'])->name("developer.create");
        Route::post("/store", [DeveloperController::class, 'store'])->name("developer.store");
        Route::get("/edit/{id}", [DeveloperController::class, 'edit'])->name("developer.edit");
        Route::post("/update/{id}", [DeveloperController::class, 'update'])->name("developer.update");
        Route::get("/destroy/{id}", [DeveloperController::class, 'destroy'])->name("developer.destroy");
    });
    Route::prefix("sellers")->group(function () {
        Route::get("/", [SellerController::class, 'index'])->name("seller.index");
        Route::get("/create", [SellerController::class, 'create'])->name("seller.create");
        Route::post("/store", [SellerController::class, 'store'])->name("seller.store");
        Route::get("/edit/{id}", [SellerController::class, 'edit'])->name("seller.edit");
        Route::post("/update/{id}", [SellerController::class, 'update'])->name("seller.update");
        Route::get("/destroy/{id}", [SellerController::class, 'destroy'])->name("seller.destroy");
    });
    Route::prefix("profit")->group(function () {
        Route::get("/", [ProfitController::class, 'index'])->name("profit.index");
        Route::get("/create", [ProfitController::class, 'create'])->name("profit.create");
        Route::post("/store", [ProfitController::class, 'store'])->name("profit.store");
        Route::get("/show/{id}", [ProfitController::class, 'show'])->name("profit.show");

        Route::get("/edit/{id}", [ProfitController::class, 'edit'])->name("profit.edit");
        Route::post("/update/{id}", [ProfitController::class, 'update'])->name("profit.update");
        Route::get("/destroy/{id}", [ProfitController::class, 'destroy'])->name("profit.destroy");

        Route::get('/print/{id}', [ProfitController::class, 'printPage'])->name("profit.print");
    });
});

require __DIR__ . '/auth.php';
